<?php
namespace backend\controllers;
use app\models\Admin;
use common\models\Member;
use common\models\OrderSuc;
use common\models\OrderTaking;
use common\models\User;
use common\models\UserCer;
use Yii;
use yii\data\Pagination;
use yii\web\Controller;


/**
 * Site controller
 */
class OrderController extends CommonController
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
     * 订单列表
     */
    public function actionOrderList()
    {

        $pagination = new Pagination([
            'defaultPageSize' =>5,
            'totalCount' => OrderSuc::find()->count(),
        ]);

        $OrderList=OrderSuc::find()->OrderBy('add_time desc ')->offset($pagination->offset)->
        limit($pagination->limit)->asArray()->all();
        $count=OrderSuc::find()->count();
        //var_dump($OrderList);die;

        $data=[
            'OrderList'=>$OrderList,
            'count'=>$count,


        ];

        return $this->render('order-list',['data'=>$data,'pagination'=>$pagination]);


    }


    /**
     * 订单详情页
     */
    public function actionOrderInfo()
    {   $id=$this->request->get('id');
        $mem=new OrderTaking();
        $OrderInfo=$mem-> Getdetail($id);
        //var_dump($OrderInfo);die;
        return $this->render('order-detail',['OrderInfo'=>$OrderInfo]);


    }



    /**
     *
     * 订单删除
     */

    public function actionOrderDel()
    {
        $id=$this->request->get('id');
        /**
         * 若是该会员认证过则不能删除需提示先删除认证信息
         */
        $OrderInfo=OrderSuc::find()->where(['order_id'=>$id])->One();
        $res=$OrderInfo->delete();
        if($res)
        {
            return 1;die;

        }
        else{

            return "删除失败";
        }


    }





}