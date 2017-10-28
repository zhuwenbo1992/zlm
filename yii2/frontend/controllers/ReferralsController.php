<?php
/**
 * Created by PhpStorm.
 * User: zk
 * Date: 19/7/17
 * Time: PM3:29
 */

namespace frontend\controllers;




use common\models\Job;
use common\models\OrderTaking;
use common\models\Region;
use frontend\models\UserReferrals;

class ReferralsController extends CommonController
{
    /**用户id*/
    public $userid;

    function init()
    {
        parent::init();
//
        if (!\Yii::$app->user->isLogin()) {
            echo "登录已失效";
            exit();
        } else {
            $this->userid=\Yii::$app->session->get('user_id');
        }

    }

    public function actionIndex()
    {
        $user_id=$this->userid;
        $personList=UserReferrals::find()
            ->where([
                'user_id'=>$this->userid,
            ])
            ->orderBy('id desc')
            ->limit(20)
            ->asArray()
            ->all();
        /**
         * 查询我接的单中推荐的人的ID 并且确定其是否被录用 若被录用则显示录用标签并且不能被删除了
         */
        $ta=new OrderTaking();
       $ids=$ta->GetMyOffer($user_id);
        /**获取省市区名称 获取职位名称*/
        foreach ($personList as &$value) {
            if(in_array($value['id'],$ids)){

                $value['is_offer']='luyong';
            }else{
                $value['is_offer']='';
            }
            if ($value['province']!=0) {
                $value['local_name']=Region::getName($value['province']);
            }
            if ($value['city']!=0) {
                $value['local_name'].=' | '.Region::getName($value['city']);
            }
            if ($value['district']!=0) {
                $value['local_name'].=' | '.Region::getName($value['district']);
            }
            if ($value['job_id1']!=0) {
                $value['job1_name']=Job::getName($value['job_id1']);
            }
            if ($value['job_id2']!=0) {
                $value['job2_name']=Job::getName($value['job_id2']);
            }
            if ($value['job_id3']!=0) {
                $value['job3_name']=Job::getName($value['job_id3']);
            }

        }
      //var_dump($personList);die;
        return $this->render('index',[
            'personList'=>$personList,
        ]);
    }
    /**
     * 录入人才
     * */
    public function actionPersonsAdd()
    {
        if(\yii::$app->request->get('act')){

            $act=\yii::$app->request->get('act');


        };

        $CityList=Region::find()->where(['parentid'=>0])->asArray()->all();
        $jobList=Job::find()->select('job_id,job_name')->asArray()->all();
//        print_r($jobList);
        return $this->render('persons-add',[
            'citylist'=>$CityList,
            'jobList'=>$jobList,
            'act'=>isset($act)?$act:'',
        ]);
    }
    /**
     * 录入人才 提交
     * */
    public function actionPersonsAddSubmit()
    {
        /**保存数据 并跳转*/
        $post=\Yii::$app->request->post();

        $post['user_id']=$this->userid;
     //var_dump($post);die;
        /**查询当前idno的记录*/
        $temp=UserReferrals::find()
            ->where([
                'user_id'=>$this->userid,
                'idno'=>$post['idno'],
            ])
            ->one();
        /**$temp=null表示身份证id不存在，则添加，否则不添加*/
        if (is_null($temp)) {
            /** 身份证不存在*/
            $person=new UserReferrals();
            //var_dump($person->load($post));
            if (!$person->load($post,'')) {
                /**验证失败*/
                return $this->error('数据格式错误。');


            }
            /** 装载rule里没有的属性*/
            foreach ($post as $key=>$value) {
                if ($key!='_csrf-frontend')
                {
                    $person->$key = $value;
                }
            }
            if ($person->save()){
                /**添加成功*/

                //var_dump($post);die;
                if($post['act']==''){
                    return $this->success('/referrals/index');

                }else{
                   return $this->redirect('/takeing/order-persons?id='.$post['act']);


                }

            } else {
                /**添加失败*/
                return $this->error('网络错误。');
//                var_dump($person);
            }


        } else {
            /**身份证存在*/
            return $this->error('身份证已经存在');
        }



    }
    /**删除人才*/
    public function actionPersonsDel()
    {
        $id=\Yii::$app->request->get('id');
        if (empty($id) or is_null($id)) {
            return $this->error('网络错误');
        }
        $person=UserReferrals::find()->where(['id'=>$id])->One();

        /** TODO:人才已经报名等情况下，不允许删除 */


        if ($person->delete()) {
            return $this->success('/referrals');
        } else {
            return $this->error('删除失败');
        }
    }
    /**
    *查询
     */
    public function actionSearch()
    {
        $value=\Yii::$app->request->get();
        //var_dump($value);die;
        /**直接访问该方法*/
        if (empty($value)) {
            return $this->error('您想搜索什么？');
        }

        $personList=UserReferrals::find()
            ->where([
                'and',[
                    'user_id'=>$this->userid,
                ],[
                    'or',[
                        'like','name',$value
                    ],[
                        'like','mobile_phone',$value
                    ]
                ]
            ])
            ->asArray()
            ->all();

        /**获取省市区名称 获取职位名称*/
        foreach ($personList as &$value) {
            if ($value['province']!=0) {
                $value['local_name']=Region::getName($value['province']);
            }
            if ($value['city']!=0) {
                $value['local_name'].=' | '.Region::getName($value['city']);
            }
            if ($value['district']!=0) {
                $value['local_name'].=' | '.Region::getName($value['district']);
            }
            if ($value['job_id1']!=0) {
                $value['job1_name']=Job::getName($value['job_id1']);
            }
            if ($value['job_id2']!=0) {
                $value['job2_name']=Job::getName($value['job_id2']);
            }
            if ($value['job_id3']!=0) {
                $value['job3_name']=Job::getName($value['job_id3']);
            }

        }
        //var_dump($personList);die;
        /**没有搜索到结果*/
        if (empty($personList)) {
//            return $this->error('没有搜索到结果');
        }
        /**在人才库首页显示搜索结果*/
        return $this->render('index',[
            'personList'=>$personList,
        ]);

    }
    public function actionQrcode()
    {
        return $this->render('qrcode',[
           'userid'=>$this->userid,
        ]);
    }
    /**人才详情*/
    public function actionPersonsDetail()
    {
        if(\yii::$app->request->get('act')){

            $act=\yii::$app->request->get('act')?\yii::$app->request->get('act'):'';
        }

        $id=\Yii::$app->request->get('id');
        if (empty($id) or is_null($id)) {
            return $this->error('网络错误');
        }
        $person=UserReferrals::find()->where(['id'=>$id])->asArray()->One();
        if ($person['province']!=0) {
            $person['local_name']=Region::getName($person['province']);
        }
        if ($person['city']!=0) {
            $person['local_name'].=' | '.Region::getName($person['city']);
        }
        if ($person['district']!=0) {
            $person['local_name'].=' | '.Region::getName($person['district']);
        }
        if ($person['job_id1']!=0) {
            $person['job1_name']=Job::getName($person['job_id1']);
        }
        if ($person['job_id2']!=0) {
            $person['job2_name']=Job::getName($person['job_id2']);
        }
        if ($person['job_id3']!=0) {
            $person['job3_name']=Job::getName($person['job_id3']);
        }
        return $this->render('persons-detail',[
            'person'=>$person,
            'act'=>isset($act)?$act:'',
        ]);
    }
}