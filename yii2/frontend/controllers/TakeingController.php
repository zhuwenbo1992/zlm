<?php
/**
 * Created by PhpStorm.
 * User: zk
 * Date: 17/5/13
 * Time: 上午10:51
 */

namespace frontend\controllers;
use common\models\Benefit;
use common\models\Order;
use common\models\OrderPost;
use common\models\OrderPostTime;
use common\models\OrderSuc;
use common\models\OrderTaking;
use common\models\Region;
use common\models\Job;
use common\models\TakingReferral;
use frontend\models\UserCer;
use frontend\models\UserReferrals;
use yii;
use yii\web\Controller;

class TakeingController extends CommonController
{
    /**用户id*/
    public $userid;
    protected $request;

    function init()
    {
        parent::init();
        if (!\Yii::$app->user->isLogin()) {
            echo "登录已失效";
            exit();
        } else {
            $this->userid = \Yii::$app->session->get('user_id');
            $this->request = \yii::$app->request;
        }

    }


    public  function actionIndex()
    {
        /**
         *去接单页面
         *
         */

        $region=new Region();
        $ta=new OrderTaking();
        if($this->request->get())
        {
            $city_id=$this->request->get('city_id');
            $where['city_id']=$city_id;
            $GroundList=$region->GetGroundSon($city_id);
            $OrderList=$ta->GetOrder($where);
            //var_dump($OrderList);die;


        }

        /**
         * 查询出city_id下的子类
         *
         */

        /**
         * 查询出所有的福利待遇
         */
        $BenList=Benefit::find()->asArray()->all();

        if($this->request->post()){
            $where=$this->request->post();
            $where['city_id']=\yii::$app->session->get('city_id');
            $GroundList=$region->GetGroundSon($where['city_id']);
            $OrderList=$ta->GetOrder($where);



        }



       return $this->render('order-taking',[
           'OrderList'=>isset($OrderList)&&!empty($OrderList)?$OrderList:[],
           'GroundList'=>isset($GroundList)&&!empty($GroundList)?$GroundList:[],
           'BenList'=>$BenList]);

    }

    /*
     * 详情
     * 获取详情页数据
     *
     *
     */
    public function actionOrderDetail()
    {   $ta=new OrderTaking();
       if($this->request->get('id'))
       {
        $Detail=$ta->Getdetail($this->request->get('id'));
        //var_dump($Detail);die;


           return $this->render('order-detail',['Detail'=>$Detail]);
       }
       else{


           $this->redirect(['site/index']);

       }



    }

    /**
     *
     * 去接单
     *
     *
     */
    public function actionOrderPersons()
    {
        /**
         * $id 对应的订单ID；
         */
        $id=$this->request->get('id');
             //选择接点人
         $ta=new OrderTaking();
         $user_id=\yii::$app->session->get('user_id');
        //接单前确定是否实名认证过，如果没有认证则去认证
        $user_id=\Yii::$app->session->get('user_id');

        $CerInfo=UserCer::find()->where(['user_id'=>$user_id,'cer_person'=>1])->one();
        if($CerInfo==null)
        {

            $this->redirect('/site/certification-personal?id='.$id);



        }

         $UserList=$ta->GetUserList($user_id);
        //var_dump($UserList);die;

         if($UserList)
         {
             //var_dump($UserList);die;
             return $this->render('order-persons',['UserList'=>$UserList,'user_id'=>$user_id,'id'=>$id]);

         }else{

             return $this->render('order-persons',['id'=>$id,'user_id'=>$user_id]);

         }


    }



    /**
     *
     * 搜索
     */
    public function actionSearch()
    {
        $value=\Yii::$app->request->get('value');
        $id=$this->request->get('id');
        $user_id=\yii::$app->session->get('user_id');
        //var_dump($id);die;
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
                $value['job1']=Job::getName($value['job_id1']);
            }
            if ($value['job_id2']!=0) {
                $value['job2']=Job::getName($value['job_id2']);
            }
            if ($value['job_id3']!=0) {
                $value['job3']=Job::getName($value['job_id3']);
            }

        }
        $UserList=$personList;
        //var_dump($UserList);die;
        /**没有搜索到结果*/
        if (empty($UserList)) {
//            return $this->error('没有搜索到结果');
        }
        /**在人才库首页显示搜索结果*/
        return $this->render('order-persons',[
            'UserList'=>$UserList,
            'id'=>$id,
            'user_id'=>$user_id,
        ]);


    }



    /**
     * @return string
     *
     * 选择接单并且数据入库
     *
     *
     */
    public function actionSubmit()
    {
        /**
         * 未选择接单人提交
         * 选则接单人提交时候为了避免一个单子被一个用户user 重复接 进行判断
         */
        $user_id=\yii::$app->session->get('user_id');
        $post=$this->request->post();
        $order_id=$post['order_id'];
        $count=OrderTaking::find()->where(['order_id'=>$order_id,'user_id'=>$user_id])->asArray()->count();
        if($count>=1){
            return $this->error('你已经申请过该工作，不能重复提交');


        }

        $takeing=new OrderTaking();

        if(!(array_key_exists('user_name',$post)||array_key_exists('person_name',$post))){

            return $this->error("你未选择任何人,请重新提交");

        }

        /**
         * 只选择自己一个人提交
         */
        if(array_key_exists('user_name',$post)&&(!array_key_exists('person_name',$post))){

            $takeing->user_id=$post['user_name'];
            $takeing->order_id=$post['order_id'];
            $takeing->taking_people=1;
            $takeing->is_myself=1;
            $takeing->take_time=time();
            $res=$takeing->save();
            if($res){
                /**
                 * 接单OK后状态变为待处理
                 */
                $ordersuc=OrderSuc::findOne($post['order_id']);
                $ordersuc->order_status=2;
                $ordersuc->save();
                return $this->success('manage/my-take');
            }else{

                return $this->error('提交失败');

            }

        }

        /**
         * 不选择自己只选择其他人才接单,将数据往接单人才表中提交
         */

        if(array_key_exists('person_name',$post)&&(!array_key_exists('user_name',$post))){

            $takeing->user_id=\yii::$app->session->get('user_id');
            $takeing->order_id=$post['order_id'];
            $takeing->taking_people=count($post['person_name']);
            $takeing->is_myself=0;
            $takeing->take_time=time();
            $res=$takeing->save();
            if($res)
            {
                /**
                 * 接单OK后状态变为待处理
                 */
                $ordersuc=OrderSuc::findOne($post['order_id']);
                $ordersuc->order_status=2;
                $ordersuc->save();
                //获得自增ID
                $id=$takeing->attributes['order_take_id'];

                foreach ($post['person_name'] as $k =>$v){
                    $tar=new TakingReferral();
                    $tar->taking_id=$id;
                    $tar->user_referral_id=$v;
                    $res=$tar->save();

                }

                if($res){

                    return $this->success('/manage/my-take');
                }else{


                    return $this->error('提交失败');

                }




            }else{


                return $this->error('提交失败');
            }


        }

        /**
         * 选择自己和其他人一起接单
         *
         */

        if(array_key_exists('user_name',$post)&&array_key_exists('person_name',$post))
        {
            $takeing->user_id=$post['user_name'];
            $takeing->order_id=$post['order_id'];
            $takeing->taking_people=1+count($post['person_name']);
            $takeing->is_myself=1;
            $takeing->take_time=time();
            $res=$takeing->save();

            if($res)
            {
                /**
                 * 接单OK后状态变为待处理
                 */
                $ordersuc=OrderSuc::findOne($post['order_id']);
                $ordersuc->order_status=2;
                $ordersuc->save();
                //获得自增ID
                $id=$takeing->attributes['order_take_id'];

                foreach ($post['person_name'] as $k =>$v){
                    $tar=new TakingReferral();
                    $tar->taking_id=$id;
                    $tar->user_referral_id=$v;
                    $res=$tar->save();

                }

                if($res){

                    return $this->success('/manage/my-take');
                }else{


                    return $this->error('提交失败');

                }


            }else{


                return $this->error('提交失败');


            }



        }

    }







}