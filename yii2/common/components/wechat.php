<?php
/**
 * Created by PhpStorm.
 * User: zk
 * Date: 7/7/17
 * Time: AM9:49
 */

namespace common\components;


use yii\base\Component;

class wechat extends Component
{
    protected $appId = "wx270be8a2c4a8bf78";
    protected $appSecret = "9a6658591447e98940b9340905bcb535";
    protected $openID;
    protected $test = false;
    protected $domain = 'http://test.zhaolemo.com/';
    /**跳转地址*/
    public $url = 'http://test.zhaolemo.com/';

    /**
     * 获取code
     *
     * */
    public function getCode()
    {
        $url = urlencode($this->url);
        echo "<script>location.href='https://open.weixin.qq.com/connect/oauth2/authorize?appid=" . $this->appId . "&redirect_uri=" . $url . "&response_type=code&scope=snsapi_userinfo&state=0#wechat_redirect'</script>";
        exit();
    }
    /**
     * 获取 access_token
     *
     * */
    public function getAccessToken()
    {
        if (is_null(\Yii::$app->request->get('code'))) {
            return false;
        }
        \Yii::$app->con->url = 'https://api.weixin.qq.com/sns/oauth2/access_token?appid=' . $this->appId . '&secret=' . $this->appSecret . '&code=' . \Yii::$app->request->get('code') . '&grant_type=authorization_code';
        $userinfo = \Yii::$app->con->get();
        return $userinfo;
        /**
         * access_token 用来获取用户信息
         * expires_in 过期时间，一般为7200秒
         * refresh_token 用来刷新access_token，有效期30天，需要保存到user表
         * openid 用户id
         *
         * */
    }

    /**
     * 刷新access_token 用来获取userinfo
     *
     * */
    public function refreshToken()
    {

    }

    /**
     * 获取用户信息
     *
     * */
    public function getUserinfo($accessToken,$openid)
    {
        \Yii::$app->con->url='https://api.weixin.qq.com/sns/userinfo?access_token='.$accessToken.'&openid='.$openid.'&lang=zh_CN ';
        return \Yii::$app->con->get();
    }


}