<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "order_suc".
 *
 * @property int $order_id
 * @property int $job_id 需要职位名称id
 * @property string $work_name 发布职位名称
 * @property int $people_num 需要人数
 * @property string $people_edu 学历
 * @property string $people_exc 工作年限
 * @property string $people_age 所需要年龄段
 * @property string $area_detail 详细地址
 * @property int $order_post_id 临时订单ID
 * @property string $duty_desc 职责描述
 * @property int $city 城市ID
 * @property int $district 区ID
 * @property int $area 商业区ID
 * @property int $user_id 用户ID
 * @property int $order_status 订单状态 0 表示取消 1 表示发了人单还未有人接单(可取消） 2表示待处理中(已有人接单）、 3 已有人被录用进行中 4表示已完成
 * @property string $company_service_img 公司用户资料协议
 * @property string $hour_money 薪资
 * @property int $add_time 下单时间
 * @property int $is_mandate 是否薪资托管 1 是已经托管0 是未托管
 * @property string $payments 结算方式
 * @property string $money_code 薪资单位
 * @property string $post_phone 发单人联系方式
 * @property string $post_name 发单人
 * @property int $offer_people 已被录用人数
 */
class OrderSuc extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'order_suc';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['job_id', 'people_num', 'order_post_id', 'city', 'district', 'area', 'user_id', 'order_status', 'add_time', 'is_mandate', 'offer_people'], 'integer'],
            [['duty_desc'], 'string'],
            [['hour_money'], 'number'],
            [['order_post_id'],'unique'],
            [['work_name', 'people_edu', 'area_detail', 'money_code'], 'string', 'max' => 50],
            [['people_exc'], 'string', 'max' => 35],
            [['people_age', 'payments','post_name'], 'string', 'max' => 30],
            [['company_service_img'], 'string', 'max' => 150],
            [['post_phone'], 'string', 'max' => 11],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'order_id' => 'Order ID',
            'job_id' => 'Job ID',
            'work_name' => 'Work Name',
            'people_num' => 'People Num',
            'people_edu' => 'People Edu',
            'people_exc' => 'People Exc',
            'people_age' => 'People Age',
            'area_detail' => 'Area Detail',
            'order_post_id' => 'Order Post ID',
            'duty_desc' => 'Duty Desc',
            'city' => 'City',
            'district' => 'District',
            'area' => 'Area',
            'user_id' => 'User ID',
            'order_status' => 'Order Status',
            'company_service_img' => 'Company Service Img',
            'hour_money' => 'Hour Money',
            'add_time' => 'Add Time',
            'is_mandate' => 'Is Mandate',
            'payments' => 'Payments',
            'money_code' => 'Money Code',
            'post_phone' => 'Post Phone',
            'offer_people' => 'Offer People',
            'post_name'=>'Post Name'
        ];
    }


    public function AddOrder($data,$id)
    {
        $this->user_id=\yii::$app->session->get('user_id');
        //$this->work_name=$data->post_work;
        $this->people_num=$data->order_post_num;
        $this->people_edu=$data->order_post_edu;
        $this->people_exc=$data->order_post_exc;
        $this->people_age=$data->order_post_age;
        $this->area_detail=$data->order_post_area;
        $this->order_post_id=$id;
        $this->job_id=$data->job_id;
        $this->city=$data->provance_id;
        $this->district=$data->city_id;
        $this->area=$data->area_id;
        $this->duty_desc=$data->order_post_duty;
        $this->order_status=1;
        $this->add_time=time();
        $this->hour_money=$data->order_post_money;
        $this->money_code=$data->money_code;
        $this->payments=$data->payments;
        $this->post_phone=$data->post_phone;
        $this->work_name=$data->post_work;
        $this->post_name=$data->post_name;
        $res=$this->save();
        if($res)
        {


            return $this->attributes['order_id'];

        }else{

            return  false;
        }



    }

   /**
    *
    * 生成订单号，用于支付时候使用
    *
    *
    */


   public function CreateOrderNo()
   {





   }






}
