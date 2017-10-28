<?php
namespace backend\controllers;

use common\models\LoginForm;
use common\models\User;
use common\widgets\Alert;
use Yii;
use yii\web\Controller;
class LoginController extends Controller
{
    public $layout = false;
    public function actionLogin()
    {
        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post())&&$model->login())
        {
            $adminid=$model->login();
            $adminname=User::findOne($adminid)->username;
            \yii::$app->session->set('adminid',$adminid);
            \yii::$app->session->set('adminname',$adminname);
             return $this->redirect(['/index/index']);
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }


    }

/**
 * 退出登录
 *
 */

    public function actionLoginOut()
    {

        $session=Yii::$app->session;
        $session->remove('adminid');
        $session->remove('adminname');
        $session->destroy();
        $this->redirect(['index/index']);

    }

}