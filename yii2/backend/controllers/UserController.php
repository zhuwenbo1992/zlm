<?php
namespace backend\controllers;
use app\models\Admin;
use common\models\Member;
use common\models\OrderSuc;
use common\models\User;
use common\models\UserCer;
use Yii;
use yii\data\Pagination;
use yii\web\Controller;


/**
 * Site controller
 */
class UserController extends CommonController
{
    /**用户id*/
    public $adminid;
    protected $request;

    function init()
    {

        $this->adminid = \Yii::$app->session->get('adminid');
        $this->request = \yii::$app->request;
    }


    public $layout='common';

    /**
     * @return string
     * 用户列表
     */
    public function actionUserList()
    {
        $pagination = new Pagination([
            'defaultPageSize' =>4,
            'totalCount' => Member::find()->count(),
        ]);

        $UserList=Member::find()->asArray()->OrderBy('register_time desc ')->offset($pagination->offset)->
        limit($pagination->limit)->asArray()->all();
        $count=Member::find()->count();

        $data=[
            'UserList'=>$UserList,
            'count'=>$count,


        ];

        return $this->render('member-list',['data'=>$data,'pagination'=>$pagination]);


    }
    /**
     * 已认证的会员列表
     *
     */
    public function actionUserCerList()
    {
        $pagination = new Pagination([
            'defaultPageSize' =>1,
            'totalCount' => UserCer::find()->count(),
        ]);
        $UserList=UserCer::find()->asArray()->OrderBy('cer_id desc')->offset($pagination->offset)->
        limit($pagination->limit)->asArray()->all();
        $count=UserCer::find()->count();
        $data=[
            'UserList'=>isset($UserList)?$UserList:'',
            'count'=>$count,


        ];
        return $this->render('member-cer-list',['data'=>$data,'pagination'=>$pagination]);
    }

    /**
     * 用户详情页
     */
 public function actionUserInfo()
 {  $id=$this->request->get('id');
    $mem=new Member();
    $UserInfo=$mem->GetUserInfo($id);

    return $this->render('member-show',['UserInfo'=>$UserInfo]);


 }



    /**
     *
     * 用户删除
     */

    public function actionUserDel()
    {
        $id=$this->request->get('id');
        /**
         * 若是该会员认证过则不能删除需提示先删除认证信息
         */
        $Cerinfo=UserCer::find()->where(['user_id'=>$id])->One();
        //var_dump($Cerinfo);die;
        if($Cerinfo!=null)
        {
            echo "该会员已认证你无法直接删除";die;

        }

        $user=Member::findOne($id);
        $res=$user->delete();
        if($res)
        {
            return 1;die;

        }
        else{

            return "删除失败";
        }


    }



    /**
     *
     * 认证用户删除
     */

    public function actionUserCerDel()
    {
        $id=$this->request->get('id');
        /**
         * 如果用户有单未完成也不能删除
         */
        $Cer=UserCer::find()->where(['user_id'=>$id])->One();
        $user_id=$Cer->user_id;
        $Order=OrderSuc::find()->where(['user_id'=>$user_id])->One();
        if($Order!=null)
        {
          return "此用户为活跃用户，不建议删除";

        }
        $res=$Cer->delete();
        if($res)
        {
            return 1;die;

        }
        else{

            return "删除失败";
        }


    }
 /**
  * 用户认证（通过或者不通过）审核通过则把状态从1改为2 拒绝则是把状态从1改为3
  */

    public function actionPass()
    {   $id=$this->request->get('id');
        $cer_company=1;
        $cer=new UserCer();
        $ceruser=$cer->find()->where(['user_id'=>$id])->One();
        $ceruser->cer_company=$cer_company=2;
        $res=$ceruser->save();
        if($res){

            return $this->redirect(['user/user-cer-list']);
        }else{
            return $this->redirect(['user/user-cer-list']);
        }







    }

}