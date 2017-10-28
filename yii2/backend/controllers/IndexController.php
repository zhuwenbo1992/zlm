<?php
namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;

/**
 * Site controller
 */
class IndexController extends CommonController
{
    public $layout='common';


    public function actionIndex()
    {
        $serveinfo=$this->GetHostInfo();
        $ip=$this->getClientIP();
        $data=[
             'ip'=>$ip,
            'serveinfo'=>$serveinfo,

        ];

       return $this->render('index',['data'=>$data]);


    }

   /**
    *
    */






}