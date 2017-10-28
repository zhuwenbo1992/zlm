<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "order_post_time".
 *
 * @property int $tim_id
 * @property int $time_start 开始时间
 * @property int $time_end 结束时间
 * @property string $work_day 选择周一到周日 工作时间
 * @property int $order_post_id 单的ID
 * @property string $start_date 开始日期
 * @property string $end_date 结束日期
 */







class OrderPostTime extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'order_post_time';
    }

    /**
     * @inheritdoc
     */



    const w1=1;//周一
    const w2=2;//周二
    const w3=3;//周三
    const w4=4;//周四
    const w5=5;//周五
    const w6=6;//周六
    const w7=7;//周日


    public static $workday=[
        self::w1  =>'周一',
        self::w2  =>'周二',
        self::w3 =>'周三',
        self::w4 =>'周四',
        self::w5 =>'周五',
        self::w6=>"周六",
        self::w7=>'周日',



    ];
    public function rules()
    {
        return [
            [['order_post_id'], 'integer'],
            [['time_start', 'time_end'], 'safe'],
            [['work_day'], 'string', 'max' => 255],
            [['start_date', 'end_date'], 'string', 'max' => 30],
            ['start_date','required','message'=>'开始日期不能为空'],
            ['end_date','required','message'=>'结束日期不能为空'],
            ['time_start','required','message'=>'开始时间不能为空'],
            ['time_end','required','message'=>'结束时间不能为空'],
            ['order_post_id','required','message'=>'订单不能为空'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'tim_id' => 'Tim ID',
            'time_start' => 'Tim Start',
            'time_end' => 'Time End',
            'work_day' => 'Work Day',
            'order_post_id' => 'Order Post ID',
            'start_date' => 'Start Date',
            'end_date' => 'End Date',
        ];
    }


    /**

     * 添加时段信息
     *
     *
     */


    public function AddOrderTime($data)
    {
        $this->order_post_id=$data['order_post_id'];
        $this->start_date=$data['start_date'];
        $this->end_date=$data['end_date'];
        $this->time_start=$data['time_start'];
        $this->time_end=$data['time_end'];

        $arr='';
        if($data['all']==1){

           $arr.='全部'.",";


        }if($data['w1']==1){

           $arr.='周一'."," ;

        }if($data['w2']==1){

            $arr.='周三'.",";
        }if($data['w3']==1){

            $arr.="周四".",";
        }if($data['w5']==1){

            $arr.="周五".",";
        }if($data['w6']==1){

            $arr.="周六".",";
        }if($data['w7']==1){

            $arr.='周日'.", ";
        }

        $this->work_day=$arr;

        return $res=$this->save();









    }
}
