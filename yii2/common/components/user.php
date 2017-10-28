<?php
/**
 * Created by PhpStorm.
 * User: zk
 * Date: 2017/7/8
 * Time: 上午9:44
 */

namespace common\components;


use app\models\Member;
use yii\base\Component;

class user extends Component
{
    public $user='';
    /** dev=1 为开发模式*/
    public $dev=0;

    public function isLogin()
    {

        if ($this->dev==1) {
            /**开发模式默认userid=2*/
            \Yii::$app->session->set('user_id',16);
            return true;
        } else if (\Yii::$app->session->get('user_id')) {
           /** 已登录*/
            return true;
        } else {
            /**session中的userid为空则去微信验证*/
            return $this->login();
        }
    }
    public function login()
    {
        if (\Yii::$app->request->get('code')) {
            $info=\Yii::$app->wechat->getAccessToken();
            if ($info and isset($info['openid'])) {
                /**
                 * TODO: 如果openid不存在，则保存以下数据 并调用getUserinfo()获取用户信息
                 *
                 * $info['openid']  openid
                 * $info['refresh_token'] refresh_token (30天过期)
                 * */
                $user=Member::find()
                    ->where(['openid'=>$info['openid']])
                    ->one();
                if ($user) {
                    \Yii::$app->session->set('user_id',$user['user_id']);
                    return true;
                } else {
                    $info2=\Yii::$app->wechat->getUserinfo($info['access_token'],$info['openid']);
                    $newuser=new Member();
                    $userid=$newuser->saveUserData($info2);
                    if ($userid) {
                        \Yii::$app->session->set('user_id',$userid);
                        return true;
                    }
                }

//                $info2=\Yii::$app->wechat->getUserinfo($info['access_token'],$info['openid']);
                /**
                 * TODO:保存
                 * $info2['nickname'] nickname
                 * $info2['sex']
                 * $info2['city']
                 * $info2['province']
                 * $info2['headimgurl']
                 * */

                /**
                 * TODO:如果openid 存在.根据openid读取user信息，并且将user_id写入session
                 * */

            }
        } else {
            \Yii::$app->wechat->getCode();
        }
    }

}