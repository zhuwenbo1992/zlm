<?php
/**
 * Created by PhpStorm.
 * User: zk
 * Date: 25/7/17
 * Time: PM3:12
 */

namespace frontend\controllers;


class ServiceController extends CommonController
{
    public function actionIndex()
    {
        return $this->render('index');
    }
}