<?php
/**
 * Created by PhpStorm.
 * User: zk
 * Date: 24/7/17
 * Time: PM5:22
 */

namespace frontend\controllers;

use common\models\Job;
use common\models\Region;
use frontend\models\UserReferrals;

class QrcodeController extends CommonController
{
    public function actionIndex()
    {
        $this->layout='qrcode';
        $CityList=Region::find()->where(['parentid'=>0])->asArray()->all();
        $jobList=Job::find()->select('job_id,job_name')->asArray()->all();
//        var_dump(\Yii::$app->request->get('i'));
//        print_r($jobList);
        /** 参数i为空则报错*/
        if (is_null(\Yii::$app->request->get('i'))) {
            return $this->error('网络错误');
        }
//        var_dump(\Yii::$app->request->get('i'));
        return $this->render('persons-add',[
            'citylist'=>$CityList,
            'jobList'=>$jobList,
            'i'=>\Yii::$app->request->get('i'),
        ]);
    }
    public function actionPersonsAddSubmit()
    {
        /**保存数据 并跳转*/
        $post=\Yii::$app->request->post();
//        var_dump($post);
        /**C端直接输入信息，则userid从post中获取*/
//        $post['user_id']=$this->userid;
//        var_dump($post);
        /**查询当前idno的记录*/
        $temp=UserReferrals::find()
            ->where([
                'user_id'=>$post['user_id'],
                'idno'=>$post['idno'],
            ])
            ->one();
//        var_dump($temp);
        /**$temp=null表示身份证id不存在，则添加，否则不添加*/
        if (is_null($temp)) {
            /** 身份证不存在*/
            $person=new UserReferrals();
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
            if ($person->save()) {
                /**添加成功*/
                return $this->success('/qrcode/persons-add');
            } else {
                /**添加失败*/
//                var_dump($person);
                return $this->error('网络错误');
            }


        } else {
            /**身份证存在*/
            return $this->error('身份证已经存在');
        }



    }

}