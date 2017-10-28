<?php
namespace backend\controllers;

use app\models\Admin;
use common\models\User;
use Yii;
use yii\web\Controller;
use common\models\LoginForm;

/**
 * Site controller
 */
class AdminController extends CommonController
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
     * 管理员列表
     */
    public function actionAdminList()
    {
       $AdminList=User::find()->asArray()->all();
       $count=Admin::find()->count();

        $data=[
          'AdminList'=>$AdminList,
          'count'=>$count,

        ];

        return $this->render('admin-list',['data'=>$data]);


    }

    /**
     *管理员添加
     */

    public function actionAdminAdd()
    {
        $admin=new Admin();
        if($this->request->post()&&$admin->validate())
        { $post=$this->request->post();
            $admin->username=$post['adminName'];
            $admin->password=md5($post['password']);
            $admin->desc=$post['desc'];
            $admin->status=1;
            $admin->addtime=time();
            $res=$admin->save();
            if($res)
            {
                return true;

            }else{

               return false;
            }


        }

    return $this->render('admin-add');

    }

    /**
     *管理员修改
     *
     */
    public  function actionUpdate()
    {$id=$this->request->get('id');
    if($this->request->post())
    {


    }else{

        $info=Admin::findOne($id);
        return $this->render('admin-update',['id'=>$id,'info'=>$info]);
    }



    }


/**
 *
 * 管理删除,非超级管理无法删除
 */

    public function actionAdmDel()
    {
       $data=$this->request->get();
       $id=$data['id'];

       if($this->adminid!=1){
           echo "你没有这个权限删除";die;
       }

       $admin=Admin::findOne($id);
       $res=$admin->delete();
       if($res)
       {
        return 1;die;

       }
       else{

         return "删除失败";
       }


    }

}