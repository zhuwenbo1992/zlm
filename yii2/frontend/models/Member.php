<?php

namespace app\models;

use common\models\OrderSuc;
use common\models\OrderTaking;
use common\models\Region;
use Yii;

/**
 * This is the model class for table "user".
 *
 * @property integer $user_id
 * @property string $user_name
 * @property string $user_pwd
 * @property integer $register_time
 * @property string $phone
 * @property string $openid
 * @property string $nickname
 * @property string $headimgurl
 * @property string $refresh_token
 */
class Member extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [

            [['register_time'], 'integer'],
            [[ 'openid'], 'string', 'max' => 32],
            [['phone'], 'string', 'max' => 11],
            [['province','city'],'string','max'=>30],
            [['openid'],'unique'],
            [['nickname','refresh_token'], 'string', 'max' => 50],
            [['headimgurl'],'string','max'=>150],
            [['QQ_card'],'string','max'=>11],
            [['wechat_card'],'string','max'=>20],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'user_id' => '用户ID',
            'user_name' => '用户名称',
            'user_pwd' => '用户密码',
            'register_time' => '注册时间',
            'phone' => '手机号',
            'openid' => 'OpenID',
            'nickname' => '昵称',
            'headimgurl' => '头像url地址',
            'refresh_token' => '用户刷新token',
        ];
    }

    /**
     * GetOrderList 获取个人发的单
     * @$id  用户ID
     * $status 是状态
     *
     */

    public function GetOrderList($id,$status)
    {

            $myorder=OrderSuc::find()
                ->select(['order_id','user_id','work_name','people_num','city','district','area','add_time','hour_money','company_service_img','is_mandate','order_status','offer_people']);

              if(isset($id)&&empty(!$id))
              {
                 $myorder->where(['user_id'=>$id]);
              }
               if(isset($status)&&empty(!$status))
                {
                 $myorder->where(['order_status'=>$status]);

                }

                if(isset($id)&&empty(!$id)&&isset($status)&&empty(!$status))
                {
                    $myorder->where(['order_status'=>$status,'user_id'=>$id]);


                }
              $List= $myorder->asArray()->OrderBy('add_time desc')->all();


        //$sql=$myorder->createCommand()->getRawSql();
        //echo $sql;die;
               // var_dump($List);die;

        if(is_array($List)&&empty(!$List))
        {

            foreach ($List as $key=>$v)
            {
                $List[$key]['city_name']=Region::findOne($v['city'])->regionname;
                $List[$key]['dis_name']=Region::findOne($v['district'])->regionname;
                $List[$key]['area_name']=Region::findOne($v['area'])->regionname;
                $take=OrderTaking::find()->where(['order_id'=>$v['order_id']])->asArray()->all();
                //var_dump($take);die;
                if(is_array($take)&&!empty($take)){

                    $List[$key]['take_num']=$take;
                }else{

                    $List[$key]['take_num']='';
                }

            }

            //var_dump($List);die;

            return $List;

        }

    }



    public  function GetTakeList($id,$take_status)
    {
        $mytake=OrderTaking::find()
            ->select('order_taking.* ,order_suc.*')
            ->innerJoin('order_suc','order_taking.order_id=order_suc.order_id');
        if(isset($id)&&empty(!$id)){

            $mytake ->where(['order_taking.user_id'=>$id]);

        }
        if(isset($take_status)&&empty(!$take_status)){

            $mytake ->where(['order_taking.take_status'=>$take_status]);
        }

        if(isset($take_status)&&empty(!$take_status)&&isset($id)&&empty(!$id)){
            $mytake->where(['order_taking.user_id'=>$id,'order_taking.take_status'=>$take_status]);


        }


        $takeList= $mytake ->OrderBy('order_taking.take_time desc')->asArray()->all();

        //$sql=$mytake->createCommand()->getRawSql();
        //echo $sql;die;

        if(is_array($takeList)&&empty(!$takeList))
        {
            /**
             *
             */

            foreach ($takeList as $key=>$v)
            {

                $takeList[$key]['city_name']=Region::findOne($v['city'])->regionname;
                $takeList[$key]['dis_name']=Region::findOne($v['district'])->regionname;
                $takeList[$key]['area_name']=Region::findOne($v['area'])->regionname;



            }

            return $takeList;

        }




    }

    /**
     * 由用户ID 得到用户的全部信息
     * @$user_id 是注册用户的的id
     */
    public function GetUserInfo($user_id)
    {
      $us=Member::find()
          ->select('user.province,user.city,user_certification.real_name,user_certification.cer_idcard,user_certification.cer_phone');
      $us ->leftJoin('user_certification','user.user_id=user_certification.user_id');
         //$sql=$us->createCommand()->getRawSql();
        //echo $sql;die;
       $userList=$us->where(['user.user_id'=>$user_id])->asArray()->One();
       return $userList;


    }






    /**
     * 筛选出我发的单中出待处理的单、进行中的单、已解决的单

    /**
     * GetTakeList 或的个人接单的集合
     * $id  用户ID
     *
     */






    /**
     *
     * 呆子凯  11:47:07
    saveUserData($array)
    呆子凯  11:47:27
     * $info2['nickname'] nickname
     * $info2['sex']
     * $info2['city']
     * $info2['province']
     * $info2['headimgurl']
     */

    public function SaveUserData($array)
    {
        $member=new Member();
        $member->nickname=$array['nickname'];
        $member->openid=$array['openid'];
        $member->headimgurl=$array['headimgurl'];
        $member->register_time=time();
        $member->province=$array['province'];
        $member->city=$array['city'];
        $res=$member->save();

        if($res){


            return $this->attributes['user_id'];
        }else{


            return false;
        }







    }





}
