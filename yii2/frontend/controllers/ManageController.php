<?php
/**
 * Created by PhpStorm.
 * User: zk
 * Date: 17/5/13
 * Time: 上午10:51
 */

namespace frontend\controllers;
use app\models\Member;
use common\models\Order;
use common\models\OrderPost;
use common\models\OrderPostTime;
use common\models\OrderSuc;
use common\models\OrderTaking;
use common\models\Region;
use common\models\TakingReferral;
use common\models\UploadImg;
use frontend\models\UserCer;
use yii\web\UploadedFile;
use frontend\models\UserReferrals;
use yii;
use yii\web\Controller;

class ManageController extends CommonController
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
            $this->userid=\Yii::$app->session->get('user_id');
            $this->request=\yii::$app->request;
        }

    }





    /**
     *首页进入
     * 个人中心订单管理
     * 我发的单／我接的单
     *
     */
    public  function actionIndex()
    {
        $id=$this->userid;
        $member=new Member();
        $MypostList=$member->GetOrderList($id,$status='');

        $MytakeList=$member->GetTakeList($id,$take_status='');
        //var_dump($MypostList);die;
        /*
         * 如果未发过单并且者未结果单则跳转到无数据页面
         */
        if($MypostList==null&&$MytakeList==null)
        {
            return $this->error('您还没有订单');

        }
        elseif ($MypostList==null)
        {


            return $this->render('take-manage',['MyTakeList'=>$MytakeList]);

        }
        else{


            return $this->render('post-manage',['MyPostList'=>$MypostList]);

        }



    }

    /**
     * 发单完成后是跳转到我发的单中心 默认是显示全部的单
     * 我发的单：全部、还没人接单,已接单待处理、已录用进行中 、招工完成已结束
     *
     */
    public function actionMyPost()
    {

        $member=new Member();
        $id=$this->userid;
        $status='';
        $MyPostList=$member->GetOrderList($id,$status);

        return $this->render('post-manage',['MyPostList'=>$MyPostList]);


    }
    /**
     *
     * 待处理
     */

    public function actionPending()
    {
        $member=new Member();
        $id=$this->userid;
        $MyPostList=$member->GetOrderList($id,$tatus=2);
        /**查询出有人报名的单子
         *
         *
         */
        $arr=array();
        foreach ($MyPostList as $key=>$value)
        {
            if(is_array($value['take_num']))
            {
               $arr[$key] =$value;


            }


        }
        $MyPostList=$arr;

        return  $this->render('pending-post',['MyPostList'=>$MyPostList]);



    }






    /**
     *
     * 进行中没有待处理的单子
     */
    public function actionOnWay()
    {
        $member=new Member();
        $id=$this->userid;
        $MyPostList=$member->GetOrderList($id,$tatus=2);
        /**
         * 取出录用人数>0的单子
         */
        $data=array();
        foreach ($MyPostList as $key=>$value)
        {
            if($value['offer_people']>0)
            {
              $data[$key]=$value;

            }


        }
        $MyPostList=$data;

        return $this->render('on-way-post',['MyPostList'=>isset($MyPostList)?$MyPostList:[]]);

    }


    /**
     * 已结束的单
     */

    public function actionEnding()
    {
        $member=new Member();
        $id=$this->userid;
        $MyPostList=$member->GetOrderList($id,$tatus=4);
       return $this->render('ending-post',['MyPostList'=>$MyPostList]);


    }


    /**
     * 取消订单 把订单状态为1的订单改为0
     *
     */

    public function actionDropOrder()
    {
       $id=$this->request->get('id');
       $order=new OrderSuc();
       $order=$order->find()->where(['order_id'=>$id])->one();
       $order->order_status=0;
       $res=$order->save(false);
       if($res){

           return $this->success('manage/my-post');
       }else{

           return $this->error('取消订单失败');
       }


    }








    /**
     * 接单成后跳转到我接的单中心
     * 默认是显示全部的接单
     * 我发的单：全部、申请中、已录用 、已结束
     *
     */

    public function actionMyTake()
    {
        $member=new Member();
        $id=$this->userid;
        $MyTakeList=$member->GetTakeList($id,$take_status='');
        //var_dump($MyTakeList);die;
        return $this->render('take-manage',['MyTakeList'=>$MyTakeList]);

    }

    /**
     *
     * 申请中的
     */
    public  function actionApplay()
    {

        $member=new Member();
        $id=$this->userid;
        $MyTakeList=$member->GetTakeList($id,$take_status=1);
        //var_dump($MyTakeList);die;
        return $this->render('applay-take',['MyTakeList'=>$MyTakeList]);


    }


    /**
     *
     * 已录用orffer
     */
    public  function actionOffer()
    {
        $member=new Member();
        $id=$this->userid;
        $MyTakeList=$member->GetTakeList($id,$take_status=1);
        //print_r($MyTakeList);die;

        if(isset($MyTakeList)&&empty(!$MyTakeList))
        {
            foreach ($MyTakeList as $k=>$value)
            {
                $MyTakeList[$k]['take_referral']=TakingReferral::find()->where(['taking_id'=>$value['order_take_id']])->asArray()->all();


            }
            //print_r($MyTakeList);die;


        }


        return $this->render('offer-take',
            ['MyTakeList'=>$MyTakeList]);


    }


    /**
     *
     * 已完成的
     */
    public  function actionCancel()
    {

        $member=new Member();
        $id=$this->userid;
        $MyTakeList=$member->GetTakeList($id,$take_status=3);
        //var_dump($MyTakeList);
        return $this->render('cancel-take',['MyTakeList'=>$MyTakeList]);


    }



    /**
     * 我的订单 --取消订单
     *
     *
     *
     */

    public function actionManageQuxiao()
    {
       $user_id=\yii::$app->session->get('user_id');
        $order_id=$this->request->get('order_id');
        $take=OrderTaking::find()->where(['order_id'=>$order_id,'user_id'=>$user_id])->One();
        if(isset($take)&&empty(!$take))
        {
            $take->take_status=3;
            $res=$take->save();
            if($res){

                return $this->success('manage/my-take');
            }else{

                return $this->error('取消订单失败');
            }



        }



    }
    /**
     * 订单--我接的单--添加人才
     */
    public function actionReferralAdd()
    {
        if($this->request->post())
        {
            $post=$this->request->post();
            $user_id=\yii::$app->session->get('user_id');
            if(!(array_key_exists('user_name',$post)||array_key_exists('person_name',$post))){

                return $this->error("你未选择任何人,请重新提交");

            }

            $take=OrderTaking::find()->where(['user_id'=>$user_id,'order_id'=>$post['order_id']])->One();
            if(isset($take)&&empty(!$take))
            {
                $take->taking_people=count($post['person_name'])+$take->taking_people;
                $res=$take->save();
                if($res)
                {
                    $id=$take->order_take_id;
                    foreach ($post['person_name'] as $k =>$v){
                        $tar=new TakingReferral();
                        $tar->taking_id=$id;
                        $tar->user_referral_id=$v;
                        $res=$tar->save();

                    }

                    if($res){

                        return $this->success('/manage/my-take');
                    }else{


                        return $this->error('提交失败');

                    }



                }


            }




        }

        $ta=new OrderTaking();
        $id=$this->request->get('order_id');
        $user_id=\yii::$app->session->get('user_id');
        $list= OrderTaking::find()->where(['order_id'=>$id,'user_id'=>$user_id])->asArray()->one();
        $is_myself=$list['is_myself'];
        //var_dump($list);die;
        if(isset($list)&&empty(!$list))
        {
            $listuser=TakingReferral::find()->where(['taking_id'=>$list['order_take_id']])->asArray()->all();
            $arr=array();
            foreach ($listuser as $key=>$v)
            {
                $arr[]=$v['user_referral_id'];

            }


        }

        $UserList=$ta->GetUserList($user_id);
        //var_dump($UserList);die;
        $data=array();
        if(isset($UserList)&&empty(!$UserList))
        {
            foreach ($UserList as $key=>$v)
            {
                if(!in_array($v['id'],$arr))
                {

                    $data[$key]=$v;

                }


            }


        }

          $UserList=$data;
        return $this->render('manage-referral-add',['UserList'=>$UserList,'id'=>$id,'user_id'=>$user_id,'is_myself'=>$is_myself]);

    }



    /**
     * 查看推荐的人才
     */
        public function actionTakeJian()
        {
            $order_take_id=$this->request->get('id');
            $is_myself=$this->request->get('is_myself');
            //如果is_myself=1 说明自己接了单
            if($is_myself==1){
                $user_id=OrderTaking::findOne($order_take_id)->user_id;
                $user=new Member();
                $userinfo=$user->GetUserInfo($user_id);


            }

            $referrals=TakingReferral::find()->where(['taking_id'=>$order_take_id])->asArray()->all();
            //var_dump($referrals);die;

            if(isset($referrals)&&empty(!$referrals))
            {

                foreach ($referrals as $key =>$val)
                {
                    $ta=new OrderTaking();
                    $referrals[$key]['userList']=$ta->GetUserListOne($val['user_referral_id']);

                }


            }

            //print_r($referrals);die;

            return $this->render('take-jian',
                ['referrals'=>isset($referrals)&&empty(!$referrals)?$referrals:[],'userinfo'=>isset($userinfo)?$userinfo:'']);

        }


    /**
     *
     * 订单的详情
     */

public function actionOrderDetail()
{

    $ta=new OrderTaking();
    if($this->request->get('id'))
    {
        $Detail=$ta->Getdetail($this->request->get('id'));
        //var_dump($Detail);die;


        return $this->render('order-detail',['Detail'=>$Detail]);
    }
    else{


        $this->redirect(['site/index']);

    }




}




/**
 *
 * 薪资托管页面
 *
 */
    public function actionMoneyManage()
    {
        $order_id=$this->request->get('order_id');
        //var_dump($order_id);die;
        $id=\yii::$app->session->get('user_id');
        $cerList=UserCer::find()->where(['user_id'=>$id])->One();
        if($this->request->post())
        {
           $post=$this->request->post();
           //var_dump($cerList);die;
           $cerList->cer_phone=$post['cer_phone'];
           $cerList->cer_people=$post['cer_people'];
           $res=$cerList->save(false);

            if($res){
                //更改薪资托管状态是1 表示已经授权托管
                $ordersuc=OrderSuc::findOne($post['order_id']);
                $ordersuc->is_mandate=1;
                $a=$ordersuc->save();


                return $this->success('manage/index');
            }else{


                return $this->error('薪资托管失败');
            }


        }

        return $this->render('money-manage',['cerList'=>$cerList,'order_id'=>$order_id]);



    }
    /**
     *查看被录用的人才
     *
     */


    public function actionLuyong()
    {

        $order_take_id=$this->request->get('order_id');
        $is_myself=$this->request->get('is_myself');
        if($is_myself==1){
            $user_id=OrderTaking::findOne($order_take_id)->user_id;
            $user=new Member();
            $userinfo=$user->GetUserInfo($user_id);


        }
        if(is_array($userinfo)){

            $userinfo['order_take_id']=$order_take_id;
            $userinfo['is_off']=OrderTaking::findOne($order_take_id)->is_off;
        }


        if($order_take_id)
       {
           $taking=OrderTaking::findOne($order_take_id);
           if(isset($taking)&&!empty($taking))
           {
               $taking_id=$taking->order_take_id;
               $referrals=TakingReferral::find()->where(['taking_id'=>$taking_id])->asArray()->all();
               foreach ($referrals as $key =>$val)
               {
                  if($val['is_offer']==1){

                      $ta=new OrderTaking();
                      $referrals[$key]['userList']=$ta->GetUserListOne($val['user_referral_id']);

                  }



               }
               //print_r($referrals);die;

               return $this->render('manage-luyong',['referrals'=>$referrals,'userinfo'=>$userinfo]);

           }






       }



    }




    /**选择录用或者拒绝申请的人才
     *
     *
     */


    public function actionRenCai()
    {
        $order_take_id=$this->request->get('order_id');
        $is_myself=$this->request->get('is_myself');
        if($is_myself==1){
            $user_id=OrderTaking::findOne($order_take_id)->user_id;
            $user=new Member();
            $userinfo=$user->GetUserInfo($user_id);


        }
        if(is_array($userinfo)){

            $userinfo['order_take_id']=$order_take_id;
            $userinfo['is_off']=OrderTaking::findOne($order_take_id)->is_off;
        }


       $taking=OrderTaking::findOne($order_take_id);

       if(isset($taking)&&!empty($taking))
       {
        $taking_id=$taking->order_take_id;
        $referrals=TakingReferral::find()->where(['taking_id'=>$taking_id])->asArray()->all();
        foreach ($referrals as $key =>$val)
        {
            $ta=new OrderTaking();
            $referrals[$key]['userList']=$ta->GetUserListOne($val['user_referral_id']);

        }
        //print_r($referrals);die;

        return $this->render('manage-referral',[
            'referrals'=>isset($referrals)?$referrals:[],
            'userinfo'=>isset($userinfo)?$userinfo:[],

        ]);

       }



    }

    /**
     * 录用人才对应的订单表中offer_people加1
     */
    public function actionOfferReferral()
    {
     $myself_id=$this->request->get('myself_id')?$this->request->get('myself_id'):'';
     if($myself_id!='')
     {
        $myself_id=$this->request->get('myself_id');
       $order= OrderTaking::findOne($myself_id);
       $order->is_off=1;
       $order_id=$order->order_id;
       if($order->save())
       {   $result=OrderSuc::findOne($order_id);
           $result->offer_people+=1;
           if($result->offer_people>$result->people_num)
           {
               return $this->error('你录用的人超过了需要的人');


           }else{

               $result->save();
               return $this->success('manage/index');


           }


       }


     }
    $data=$this->request->get();
     //var_dump($data);die;
     //录用人才 并且对应的状态更改找到相应的接单ID
        $result=TakingReferral::findOne($data['tar_id']);
        $result->is_offer=1;
        $res=$result->save();
        if($res)
        {
            $taking_id=$result->taking_id;
            $order_id=OrderTaking::findOne($taking_id)->order_id;
            $result=OrderSuc::findOne($order_id);
            $result->offer_people+=1;
            if($result->offer_people>$result->people_num)
            {
               return $this->error('你录用的人超过了需要的人');


            }else{

                $result->save();
                return $this->success('manage/index');


            }

        }else{
            $this->error('出错咯');
        }




    }

    /**
     * 取消人才 对应接单人才状态改为被拒绝
     *
     */

    public  function actionDeleteReferral()
    {
        $myself_id=$this->request->get('myself_id')?$this->request->get('myself_id'):'';
        if($myself_id!='')
        { $myself_id=$this->request->get('myself_id');
            $order= OrderTaking::findOne($myself_id);
            $order->is_off=2;
            $res=$order->save();
            if($res){

                return $this->success('/manage/my-post');
            }else{

                return $this->error('取消失败');
            }

        }


        $data=$this->request->get();
        $result=TakingReferral::findOne($data['tar_id']);
        $result->is_offer=2;
        $res=$result->save();
        if($res)
        {
         return $this->success('/manage/index');


        }else{

            return $this->error('取消失败');
        }


    }



  /**
   * 上传服务协议
   */

    /**
     * @return string
     * 服务协议上传页面
     */

    public function actionServiceAgreement()
    {
        $model=new UploadImg();
        $order=new OrderSuc();
        $id=$this->request->get('id');

        $OrderOne=OrderSuc::find()->where(['order_id'=>$id])->one();
        if($this->request->isPost)
        {

            $model->images=UploadedFile::getInstance($model,'images');
            if($model->images==null){

                return $this->error('你未选文件');

            }
            $newspath=$model->Upload();


            $OrderOne->company_service_img=$newspath;
            $res= $OrderOne->save(false);
            if($res){

                return $this->success($url=['/manage/my-post']);

            }else{

                return $this->error($msg='你的资料上传失败！！');
            }

        }

        else{

            return $this->render('service-agreement',['model'=>$model,'order'=>$order]);


        }

    }

}