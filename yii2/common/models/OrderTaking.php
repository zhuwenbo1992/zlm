<?php

namespace common\models;

use frontend\models\UserCer;
use frontend\models\UserReferrals;
use Yii;

/**
 * This is the model class for table "order_taking".
 *
 * @property int $order_take_id 接单ID
 * @property int $order_id 发单id
 * @property int $user_id 接单用户userid
 * @property int $taking_people 接单人数
 * @property int $take_status接单状态
 * @property int $is_myself 是否自己接单
 * @property int $take_time 是否自己接单
 * @property int $is_off自己是否被录用 0 表示未录用 1 表示录用
 */
class OrderTaking extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'order_taking';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['order_id', 'user_id'], 'required'],
            [['order_id', 'user_id', 'taking_people','take_status','is_myself','take_time','is_off'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'order_take_id' => 'Order Take ID',
            'order_id' => 'Order ID',
            'user_id' => 'User ID',
            'taking_people' => 'Taking People',
            'take_status'=>'Take Status',
            'is_myself'=>'Is Myself',
            'take_time'=>'Take Time',
            'is_off'=>'Is Off',
        ];
    }

    /**
     * 获取发单表数据显示
     *
     *
     */

    public function GetOrderList()
    {
        $OrderListAll=OrderSuc::find()->OrderBy('add_time desc')->asArray()->all();
        //var_dump($OrderListAll);die;

        if(isset($OrderListAll)&&empty(!$OrderListAll))
        {
            foreach ($OrderListAll as $key =>$val)
            {
                $OrderListAll[$key]['date_time'] = OrderPostTime::find()->where(['order_post_id' => $val['order_post_id']])->asArray()->all();
                $OrderListAll[$key]['benfitch'] = OrderPostBen::find()->where(['order_post_id' => $val['order_post_id']])->asArray()->all();
                $OrderListAll[$key]['address'] = $this->ToCity($val['city'], $val['area'], $val['district']);
                $OrderListAll[$key]['nickname'] = Member::findOne($val['user_id'])->nickname;
                //var_dump(Member::findOne($val['user_id'])->nickname);die;
                $OrderListAll[$key]['headimgurl'] = Member::findOne($val['user_id'])->headimgurl;
                $Uer = UserCer::find()->select(['company_name'])->where(['user_id' => $val['user_id']])->One();
                if (isset($Uer) && empty(!$Uer))
                {
                $OrderListAll[$key]['company_name'] = $Uer->company_name;
                }
            }

            return $OrderListAll;



        }
    }

/*
 *
 * 搜索
 */

    public function GetOrder($where)
    {
        $OrderList=OrderSuc::find();
        if(isset($where['city_id']) && !empty($where['city_id']))
        {
            $OrderList->where(['city'=>$where['city_id']]);

        }
        if(isset($where['work'])&&!empty($where['work'])){

          $OrderList->where(['like','work_name',$where["work"]]);

        }
        if(isset($where['dis_name'])&&!empty($where['dis_name'])){

            $OrderList->where(['district'=>$where['dis_name']]);
        }

        if(isset($where['jiesuan'])&&!empty($where['jiesuan'])){

        $OrderList->where(['payments'=>$where['jiesuan']]);

        }



          $OrderListAll=$OrderList->OrderBy('add_time desc')->asArray()->all();



        //var_dump($OrderListAll);die;

        foreach ($OrderListAll as $key =>$val)
        {
            $OrderListAll[$key]['date_time']=OrderPostTime::find()->where(['order_post_id'=>$val['order_post_id']])->asArray()->all();
            $OrderListAll[$key]['benfitch']=OrderPostBen::find()->where(['order_post_id'=>$val['order_post_id']])->asArray()->all();
            $OrderListAll[$key]['address'] =$this->ToCity($val['city'],$val['area'],$val['district']);
            $OrderListAll[$key]['nickname']=Member::findOne($val['user_id'])->nickname;
            //var_dump(Member::findOne($val['user_id'])->nickname);die;
            $OrderListAll[$key]['headimgurl']=Member::findOne($val['user_id'])->headimgurl;
            $Uer=UserCer::find()->select(['company_name'])->where(['user_id'=>$val['user_id']])->One();
            //var_dump($Uer);die;
            if (isset($Uer) && empty(!$Uer))
            {
                $OrderListAll[$key]['company_name'] = $Uer->company_name;
            }


        }

        return $OrderListAll;



    }



    /**
    * 获取单个订单详情
    * @$id 订单ID
    * @$DetailList 单个订单详情页面
    *
    *
    */


    public function Getdetail($id)
    {

        $DetailList=OrderSuc::findOne($id);
        //var_dump($DetailList);die;
        $order_post_id=$DetailList->order_post_id;
        $DetailList=$DetailList->toArray();
        $DetailList['benfitch']=OrderPostBen::find()->where(['order_post_id'=>$order_post_id])->asArray()->all();
        $DetailList['date_time']=OrderPostTime::find()->where(['order_post_id'=>$order_post_id])->asArray()->all();
        isset($DetailList['city'])?$DetailList['city']:'';
        isset($DetailList['district'])?$DetailList['district']:'';
        isset($DetailList['area'])?$DetailList['area']:'';
        $arr=$this->ToCity($DetailList['city'],$DetailList['district'],$DetailList['area']);
        $DetailList['city_name']=$arr['city_id'];
        $DetailList['dis_name']=$arr['dis_id'];
        $DetailList['area_name']=$arr['area_id'];
        $DetailList['address']=$DetailList['city_name'].$DetailList['dis_name'].$DetailList['area_name'];
        $DetailList['job_name']=Job::findOne($DetailList['job_id'])->job_name;
        $user_id=$DetailList['user_id'];
        $user=Member::findOne($user_id);
        $DetailList['user_name']=$user->nickname;
        $DetailList['headimgurl']=$user->headimgurl;
        $Uer=UserCer::find()->select(['company_name'])->where(['user_id'=>$user_id])->One();
        if($Uer)
        {
            $DetailList['company_name']=$Uer->company_name;

        }



        return $DetailList;


    }

    /**
     * 获取城市地区名字
     *
     *

     *
     */

        public function ToCity($city,$dis,$area)
        {


            $CityList=Region::find()->asArray()->all();
            //var_dump($CityList);die;
            foreach ($CityList as $k=>$va)
            {
                if($va['regionid']==$city){

                    $arr['city_id']=$va['regionname'];
                }

                if($va['regionid']==$dis){
                    $arr['dis_id']=$va['regionname'];
                }

                if($va['regionid']==$area){

                    $arr['area_id']=$va['regionname'];

                }

            }


            return $arr;


        }

    /**
     * 从个人人才库获取接单人信息表
     *
     *
     */

    public function GetUserList($user_id)
    {
        $data=array();
        $UserList=UserReferrals::find()
            ->select(['id','user_id','name','sex','age','idno','mobile_phone','province','city','district','area','job_id1','job_id2','job_id3'])
            ->where(['user_id'=>$user_id])
            ->asArray()
            ->all();


        if(is_array($UserList)&&empty(!$UserList))
        {
            foreach ($UserList as $key=>$v)
            {

/*              $UserList[$key]['job1']=Job::findOne($v['job_id1'])->job_name;
                $UserList[$key]['job2']=Job::findOne($v['job_id2'])->job_name;
                $UserList[$key]['job3']=Job::findOne($v['job_id3'])->job_name;
                $UserList[$key]['province_name']=Region::findOne($v['province'])->regionname;
                $UserList[$key]['city_name']=Region::findOne($v['city'])->regionname;
                $UserList[$key]['area_name']=Region::findOne($v['district'])->regionname;

                !! 请直接使用 getName方法，否则数据库查询次数过多。getName方法里有做缓存。
*/

                $UserList[$key]['job1']=Job::getName($v['job_id1']);
                $UserList[$key]['job2']=Job::getName($v['job_id2']);
                $UserList[$key]['job3']=Job::getName($v['job_id3']);
                $UserList[$key]['province_name']=Region::getName($v['province'])?Region::getName($v['province']):'';
                $UserList[$key]['city_name']=Region::getName($v['city'])?Region::getName($v['city']):'';
                $UserList[$key]['area_name']=Region::getName($v['district'])?Region::getName($v['district']):'';
                $UserList[$key]['local_name']=
                $UserList[$key]['province_name'].'||'.$UserList[$key]['city_name'].'||'.$UserList[$key]['area_name'];


            }


            return $UserList;
        }
        else{

           return false;


        }




    }



    /**
     * 获取某个申请人才的信息
     *
     */

    public function GetUserListOne($re_id)
    {
        $data=array();
        $UserList=UserReferrals::find()
            ->select(['id','user_id','name','sex','age','idno','mobile_phone','province','city','district','area','job_id1','job_id2','job_id3'])
            ->where(['id'=>$re_id])
            ->asArray()
            ->all();


        if(is_array($UserList)&&empty(!$UserList))
        {
            foreach ($UserList as $key=>$v)
            {

                $UserList[$key]['job1']=Job::getName($v['job_id1']);
                $UserList[$key]['job2']=Job::getName($v['job_id2']);
                $UserList[$key]['job3']=Job::getName($v['job_id3']);
                $UserList[$key]['province_name']=Region::getName($v['province']);
                $UserList[$key]['city_name']=Region::getName($v['city']);
                $UserList[$key]['area_name']=Region::getName($v['district']);


            }


            return $UserList;
        }
        else{

            return false;


        }




    }



    /**
     * 得到我接的单被录用的的人才
     *
     *
     *
     */

public function GetMyOffer($user_id)

{  $Myorder=OrderTaking::find()->select('order_taking.* ,taking_referral.*')
    ->leftJoin('taking_referral','order_taking.order_take_id=taking_referral.taking_id');
   $Myorder->where(['order_taking.user_id'=>$user_id]);
   $MyOfferList=$Myorder->asArray()->all();
   if(is_array($MyOfferList)&&empty(!$MyOfferList))
       { $ids=array();
        foreach ($MyOfferList as $k =>$v)
        {   if($v['is_offer']==1){
            $ids[]=$v['user_referral_id'];

        }


        }
            return $ids;

       }




}


}
