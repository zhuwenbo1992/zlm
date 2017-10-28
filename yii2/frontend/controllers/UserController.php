<?php
/**
 * Created by PhpStorm.
 * User: zk
 * Date: 17/5/13
 * Time: 上午10:51
 */

namespace frontend\controllers;
use app\models\Member;
use common\models\Order;
use common\models\OrderPost;
use common\models\OrderPostTime;
use common\models\OrderSuc;
use common\models\OrderTaking;
use common\models\Region;
use common\models\TakingReferral;
use frontend\models\UserCer;
use frontend\models\UserReferrals;
use yii;
use yii\web\Controller;


class UserController extends CommonController
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


    /**
     *
     * 用户中心/个人中心
     * 为已实名认证和非实名认证部分
     */

    public function actionIndex()
    {
        $user_id = \Yii::$app->session->get('user_id');
        //var_dump($user_id);die;
        $CerInfo = UserCer::find()->where(['user_id' => $user_id])->asArray()->One();
        //print_r($CerInfo);die;

        $UserList=Member::findOne($user_id);
        /*
         * 判断用户是否已经认证过检测是企业认证还是个人认证若是没认证过则显示去认证
         */
        if (isset($CerInfo) && empty(!$CerInfo))
        {    $CerInfoList=$CerInfo;
            /*判断认证类型 是个人认证还是企业认证还是都已经认证过*/
            return $this->render('user-info',['CerInfoList'=>$CerInfoList,'UserList'=>$UserList]);


        }

        else{

                /**
                 * 未认证过信息则只显示个人中心页面
                 *
                 */
                return $this->render('user-unnotify',['UserList'=>$UserList]);

             }




    }

    /**
     * @return string
     * 个人资料显示
     *
     *
     */
    public function actionList()
    {   $user_id = \Yii::$app->session->get('user_id');
        $UserList=Member::findOne($user_id);
        return $this->render('list',['UserList'=>$UserList]);

    }

    /**
     *
     * 个人认证资料和信息管理
     *
     */
    public  function actionPersonInfo()
    {
        $id=\yii::$app->session->get('user_id');
        $cerList=UserCer::find()->where(['user_id'=>$id])->One();
        $useList=Member::findOne($id);

        return $this->render('person-info',["cerList"=>$cerList,'userList'=>$useList]);

    }
    /**
     *
     *
     * 企业信息资料管理
     */

    public function actionCompanyInfo()
    {

        $user_id = \Yii::$app->session->get('user_id');
        $companyinfo=UserCer::find()->where(['user_id'=>$user_id])->One();
        return  $this->render('company-info',['companyinfo'=>$companyinfo]);


    }

    /**
     * 查看个人信息 并且修改个人信息
     *
     */
    public function actionAddInfo()
    {  $user_id = \Yii::$app->session->get('user_id');
       $info=$this->request->post();
       $userinfo=Member::findOne($user_id);
        if($info['cer_phone']==''){

            return $this->error('手机号不能为空');
        }
        if(strlen($info['cer_phone'])!=11){

            return $this->error('手机号格式有错');
        }
        if($info['QQ']==''){

            return $this->error('QQ号不能为空');
        }
        if($info['wechat']==''){

            return $this->error('微信号不能为空');
        }

       $userinfo->phone=$info['cer_phone'];
       $userinfo->QQ_card=$info['QQ'];
       $userinfo->wechat_card=$info['wechat'];
       $res=$userinfo->save();
       if($res)
       {
           return $this->success('/user/index');


       }
       else{

          return $this->error('信息提交错误');


       }



    }

}



