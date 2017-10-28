<?php

namespace frontend\controllers;


use yii\web\Controller;


class CommonController extends Controller
{

    /**
     *跳转提示！
     *
     *
     * */
    public function success($url = [], $sec = 2)
    {

        $url = empty($url) ? ['admin/main'] : $url;
        $url = \yii\helpers\Url::toRoute($url);
        return $this->render('/common/message-success', ['gotoUrl' => $url, 'sec' => $sec]);
    }


    public function error($msg = '', $sec = 2)
    {

        return $this->render('/common/message-error', ['msg' => $msg, 'sec' => $sec]);
    }

    public function actionTest()
    {
        return $this->error('名称错误',2);
    }

}

?>