<?php

namespace common\models;

use Yii;


/**
 * This is the model class for table "order_post".
 *
 * @property int $order_post_id 接单id
 * @property int $user_id 用户id
 * @property int $job_id 职位名称id
 * @property int $order_post_num 招聘人数
 * @property string $order_post_edu 学历
 * @property string $order_post_exc 经验
 * @property string $order_post_age 年龄
 * @property string $order_post_area 工作地点
 * @property string $order_post_duty 职责描述
 * @property string $order_post_money 时薪/ ¥/h
 * @property string $need_job 所选职位名字
 * @property string $post_work 发送的职位名称
 * @property int $post_status 0 表示还未添加完成 1 表示发布完成
 * @property int $provance_id 城市id
 * @property int $city_id 省id
 * @property int $area_id 商业区id
 * @property string company_name 公司名字
 *  @property string money_code 薪资单位
 *  @property string payments 计算方式
 *  @property string post_phone 发单人电话
 *   @property string post_name 发单人
 */
class OrderPost extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'order_post';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'job_id', 'order_post_num', 'post_status', 'provance_id', 'city_id', 'area_id'], 'integer'],
            [['order_post_money'], 'number'],
            [['order_post_edu'], 'string', 'max' => 30],
            [['order_post_exc', 'need_job', 'post_work'], 'string', 'max' => 50],
            [['order_post_age'], 'string', 'max' => 20],
            [['order_post_area'], 'string', 'max' => 255],
            [['order_post_duty'], 'string', 'max' => 150],
            [['company_name'],'string','max'=>50],
            [['money_code'],'string','max'=>30],
            [['payments','post_name'],'string','max'=>30],
            [['post_phone'],'string','max'=>11],
            ['need_job','required','message'=>'所需要工作不能为空'],
            ['post_work','required','message'=>'职位名称不能为空'],
            ['order_post_num','required','message'=>'需要人数不能为空'],
            ['order_post_edu','required','message'=>'学历要求不能为空'],
            ['order_post_exc','required','message'=>'经验要求不能为空'],
            ['order_post_age','required','message'=>'年龄不能为空'],
            ['order_post_duty','required','message'=>'职责不能为空'],
            ['provance_id','required','message'=>'省不能为空'],
            ['city_id','required','message'=>'城市不能为空'],
            ['area_id','required','message'=>'地区不能为空'],
            ['order_post_money','required','message'=>'薪资必填'],
            ['money_code','required','message'=>'薪资单位必填'],
            ['payments','required','message'=>'结算方式必填'],
            ['post_phone','required','message'=>'电话必填'],
            ['post_name','required','message'=>'发单人必填'],

           ];


    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'order_post_id' => 'Order Post ID',
            'user_id' => 'User ID',
            'job_id' => 'Job ID',
            'order_post_num' => 'Order Post Num',
            'order_post_edu' => 'Order Post Edu',
            'order_post_exc' => 'Order Post Exc',
            'order_post_age' => 'Order Post Age',
            'order_post_area' => 'Order Post Area',
            'order_post_duty' => 'Order Post Duty',
            'order_post_money' => 'Order Post Money',
            'need_job' => 'Need Job',
            'post_work' => 'Post Work',
            'post_status' => 'Post Status',
            'provance_id' => 'Provance ID',
            'city_id' => 'City ID',
            'area_id' => 'Area ID',
            'company_name'=>'Company Name',
            'money_code'=>"Money Code",
            'payments'=>'Pay Ments',
            'post_phone'=>"Post Phone",

        ];
    }




        public function AddOrder($data)
        {
            $this->user_id=\yii::$app->session->get('user_id');
            $this->need_job=$data['need_job'];
            $jobList=Job::find()->where(['job_name'=>$data['need_job']])->one();
            if(isset($jobList)&&empty(!$jobList)){

                $this->job_id=$jobList->job_id;
            }
            $this->post_work=$data['post_work'];
            $this->order_post_age=$data['age'];
            $this->order_post_edu=$data['post_edu'];
            $this->order_post_num=$data['order_num'];
            $this->order_post_exc=$data['post_exec'];
            $this->order_post_duty=$data['duty_desc'];
            $this->order_post_area=$data['area_disct'];
            $this->order_post_money=$data['money'];
            $this->provance_id=$data['province'];
            $this->city_id=$data['city'];
            $this->area_id=$data['district'];
            $this->order_post_money=$data['money'];
            $this->money_code=$data['money_code'];
            $this->payments=$data['payments'];
            $this->post_phone=$data['post_phone'];
            $this->post_name=$data['post_name'];
            //得到福利待遇集合
            $arr=array();
            $n = Benefit::find()->asArray()->all();
            foreach ($n as $k => $value) {
                if ($data[$k + 1] == 1) {
                    $arr[] = $value['b_name'];

                }

            }
            $result= $this->save();
            if($result==false)
            {
                return $error=$this->getFirstErrors();

            }
                $id=$this->attributes['order_post_id'];

                foreach ($arr as $key=>$val){
                    $orderben=new OrderPostBen();
                    $orderben->order_post_id=$id;
                    $orderben->ben_name=$val;
                    $orderben->save(false);

                }

            return $this->attributes['order_post_id'];

        }





}
