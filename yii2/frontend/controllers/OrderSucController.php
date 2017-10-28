<?php
/**
 * Created by PhpStorm.
 * User: zk
 * Date: 17/5/13
 * Time: 上午10:51
 */

namespace frontend\controllers;
use app\models\Member;
use common\models\OrderPost;
use common\models\OrderPostTime;
use common\models\OrderSuc;
use common\models\Region;
use frontend\models\UserCer;

use yii;
use yii\web\Controller;

class OrderSucController extends CommonController
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
     * 信息提交完成页面
     *
     *
     */




    /**
     * @return int
     * 发单订单提交页面
     */

    public function actionSuccess()
    {
        /**
         * 若检测到ID则表明是从发单上一步跳转到该页面，则进行时间段的提交添加 否则返回到首页
         */
        $post=$this->request->post();
        //var_dump($post);die;
        $id=$this->request->post('order_post_id');
        if($post['start_date']=='')
        {
            return $this->error('请选择开始日期');

        }

        if($post['end_date']=='')
        {
            return $this->error('请选择结束日期');

        }
        if($post['end_date']=='')
        {
            return $this->error('请选择结束日期');

        }
        if($post['time_start']=='')
        {
            return $this->error('请选择开始时间');

        }
        if($post['time_end']=='')
        {
            return $this->error('请选择结束时间');

        }
        $add=new OrderPostTime();
        $result=$add->AddOrderTime($post);
        if($result)
        {
            $current_id=\yii::$app->session->get('current_id');
            if(isset($id))
            {
            $data = OrderPost::findOne($current_id);
            $order = new OrderSuc();
            $id = $order->AddOrder($data, $id);
            if ($id)
            {

            return $this->success('/manage/my-post');

            } else{

            return $this->error('出错啦！！');
            }


            }


        }else{
            return $this->error("添加时间失败");

        }






    }










}