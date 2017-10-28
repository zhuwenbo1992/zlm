<?php
/**
 * Created by PhpStorm.
 * User: zk
 * Date: 2017/6/19
 * Time: 下午1:35
 */

namespace frontend\controllers;


use yii\web\Controller;

class NewController extends Controller
{
    public $layout='new';
    public function actionIndex()
    {
        return $this->render('index');
    }
    public function actionJob()
    {
        return $this->render('job');
    }
    public function actionOrderTaking()
    {
        return $this->render('order-taking');
    }
    public function actionUser()
    {
        return $this->render('user');
    }
    public function actionOrderPost()
    {
        return $this->render('order-post');
    }
    public function actionOrderPost2()
    {
        return $this->render('order-post2');
    }
    public function actionOrderUser()
    {
        return $this->render('order-user');
    }
    public function actionUserMoney()
    {
        return $this->render('user-money');
    }
    public function actionUserReferrals()
    {
        return $this->render('user-referrals');
    }
    public function actionUserQrcode()
    {
        return $this->render('user-qrcode');
    }
    public function actionUserNewReferral()
    {
        return $this->render('user-new-referral');
    }
    public function actionUserReferralInfo()
    {
        return $this->render('user-referral-info');
    }
}