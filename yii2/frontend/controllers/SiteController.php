<?php
/**
 * Created by PhpStorm.
 * User: zk
 * Date: 17/5/13
 * Time: 上午10:51
 */

namespace frontend\controllers;


use common\models\Benefit;
use common\models\OrderPostTime;
use app\models\Member;
use common\models\Job;
use common\components\user;
use common\models\OrderPost;
use common\models\OrderTaking;
use common\models\Region;
use frontend\models\UserCer;
use yii\web\UploadedFile;
use frontend\models\UploadForm;
use yii;
use yii\web\Controller;


class SiteController extends CommonController
{
    public $layout;
    public $userType='site';
    protected $request;

    public $userid;

    function init()
    {
        parent::init();
        \Yii::$app->user->dev=1;
          if (!\Yii::$app->user->isLogin()) {
            echo "登录已失效";
            exit();
        } else {
            $this->userid=\Yii::$app->session->get('user_id');
            $this->request=yii::$app->request;
        }

    }



    public function actionIndex()
    {

        $this->layout='index';
        //获取城市列表
        $re=new Region();
        $ta=new OrderTaking();
        $CityList=$re->GetCityList();
        $user_id=\yii::$app->session->get('user_id');

        $OrderList=$ta->GetOrderList();
        if($this->request->get())
        {
            if($this->request->get('city_id'))
            {
                $city_id=$this->request->get('city_id');
               $city_name = Region::findOne($city_id)->regionname;
                \yii::$app->session->set('city_name',$city_name);
                \yii::$app->session->set('city_id',$city_id);

            }



            $where=$this->request->get();
            $OrderList=$ta->GetOrder($where);

        }


        $data[0]= \yii::$app->session->get('city_id');
        $data[1]= \yii::$app->session->get('city_name');
        return $this->render('index',
            [
                'OrderList'=>$OrderList,
                'CityList'=>$CityList,
                'data'=>$data,
                'city_id'=>isset($city_id) && !empty($city_id) ? $city_id : 4,
            ]) ;

    }








       //用户在发单时候进行登录验证若是未登录则微信授权登录获取信息入库
    public function actionOrderPost()
    {

        /**
         * 发单时候去验证用户是否提交企业认证 并且认证状态是通过的才可以发单
         *
         *
         */
        $user_id=\Yii::$app->session->get('user_id');

        $CerInfo=UserCer::find()->where(['user_id'=>$user_id])->one();
        if($CerInfo==null)
        {

            $this->redirect('/site/certification-company');



        }elseif (isset($CerInfo)&&empty(!$CerInfo))
        {
            if($CerInfo->cer_company==1)
            {
               return $this->render('certify-success');

            }

            if($CerInfo->cer_company==0||$CerInfo->cer_company==3)
            {

                $this->redirect('/site/certification-company');

            }

        }



        $CityList=Region::find()->where(['parentid'=>0])->asArray()->all();
        $BenList=Benefit::find()->all();
        $job=new Job();
        $JobList=$job->GetHotList();
        $JobListOne= $job->GetOne("技工");
        $JobListTwo= $job->GetOne('普工');
        $JobListThree= $job->GetOne("家政维修");
        //var_dump($JobListThree);die;
        $JobListFour= $job->GetOne("教育培训");
        $JobListFive= $job->GetOne("学生兼职");
        $JobListSix= $job->GetOne("行政人事");
        //var_dump($JobListSix);die;


        return $this->render('order-post',
            [   'JobList'=>$JobList,
                'JobListOne'=>$JobListOne,
                'JobListTwo'=>$JobListTwo,
                'JobListThree'=>$JobListThree,
                'JobListFour'=>$JobListFour,
                'JobListFive'=>$JobListFive,
                'JobListSix'=>$JobListSix,
                'CityList'=>$CityList,
                'BenList'=>$BenList
            ]);
    }


/**
 *
 *添加前台数据到临时库中
 *
 */
  public function actionAddDate()
  {
      $post=$this->request->post();
      $Order=new OrderPost();
      $res=$Order->AddOrder($post);
       if(is_array($res))
       {
           reset($res);
           $first = current($res);
           echo $first;die;

       }else{

           \yii::$app->session->set('current_id',$res);
           return 1;

       }




  }




    /**

    /**
     * 查询下一级别地区实现三级联动
     *
     *
     * */
    public function actionGetRegion()
    {   $region=new Region();
        $area=$this->request->get('area');

        $GroundList=$region->GetSon($area);
        //var_dump($GroundList);die;
        echo json_encode($GroundList,JSON_UNESCAPED_UNICODE);

    }

    /**

    /**
     * 时间选择
     *
     * */
    public function actionOrderDatetimeSelect()
    {
            $current_id=\yii::$app->session->get('current_id');
            if(!isset($current_id)){

              return $this->redirect('site/index');
            }
            $DateList=OrderPostTime::find()->where(['order_post_id'=>$current_id])->all();
            return $this->render('order-datetime-select',['id'=>$current_id,'DateList'=>$DateList]);



    }

    /**
     *
     * 添加时间段
     *
     *
     * */
    public function actionAddDateTime()
    {


        $data=$this->request->get();
        $add=new OrderPostTime();
        $result=$add->AddOrderTime($data);
        if($result){

            return 1;


        }else{

            $errors=$add->getFirstErrors();
            $first = current($errors);
            echo $first;die;

        }



    }

    /**
     * @return string
     * 删除时间段
     *
     *
     *
     *
     */
    public function actionDelDate(){
        $id=$this->request->get('id');
        $res=OrderPostTime::findOne($id)->delete();
        if($res){

            return 1;


        }else{

            return 0;
        }



    }



     /**
      *
      *
      *
      *
      * 去认证页面*/
    public function actionCertification()
    {
        return $this->render('certification');
    }


    //企业认证


    public function actionCertificationCompany()
    {
        $cer=new UserCer(['scenario'=>'company']);
        $model = new UploadForm();
        if($this->request->isPost)
        {
            /**
             * 先判断该用户是否认认证过若认证过则是修改数据 若没有则是新增数据
             */
            $model->imagefile=UploadedFile::getInstance($model,'imagefile');
            //var_dump($model->imagefile);die;
            $user_id=\yii::$app->session->get('user_id');
            $CerInfo=UserCer::find()->where(['user_id'=>$user_id])->one();
            if(isset($CerInfo)&&empty(!$CerInfo))
            {   $post=$this->request->post();
                $CerInfo->cer_company=1;
                $CerInfo->user_id=$user_id;
                if($post['company_name']==''){
                    return $this->error('公司名称不能为空');
                }
                if($post['company_email']==''){
                    return $this->error('公司邮箱不能为空');
                }

                if($post['cer_people']==''){
                    return $this->error('联系人不能为空');
                }
                if($post['company_name']==''){
                    return $this->error('公司名称不能为空');
                }
                if(strlen($post['cer_phone'])!=11){
                    return $this->error('您的手机号填写有误');
                }

                $CerInfo->cer_people=$post['cer_people'];
                $CerInfo->company_name=$post['company_name'];
                $CerInfo->company_email=$post['company_email'];
                $CerInfo->cer_phone=$post['cer_phone'];
                if($model->imagefile&&$model->validate())
                {
                    $newpath=$model->UploadOneFile();
                    $CerInfo->company_img=$newpath;
                    $res=$CerInfo->save();
                    if($res)
                    {
                        return $this->render('certify-success');
                    }
                    else
                    {   $errors=$cer->getFirstErrors();
                        $first = current($errors);
                        return $this->error($first);

                    }

                }else{

                       return $this->error('你未选择任何文件');
                }

            }

            $post=$this->request->post();
            $cer->cer_company=1;
            $cer->user_id=$user_id;
            $cer->cer_people=$post['cer_people'];
            $cer->company_name=$post['company_name'];
            $cer->company_email=$post['company_email'];
            $cer->cer_phone=$post['cer_phone'];
            if($cer->validate())
            {
                if($model->imagefile)
                {
                    $newpath=$model->UploadOneFile();
                    $cer->company_img=$newpath;
                    $res=$cer->save(false);
                    if($res)
                    {
                    return $this->render('certify-success');


                    }else{

                    echo "认证失败";die;
                    }

                }else{

                    return $this->error('你未选择任何文件');

                }

            }
            else
            {
                $errors=$cer->getFirstErrors();
                $first = current($errors);
                return $this->error($first);
            }


        }

        return $this->render('certification-company',['model'=>$model,'cer'=>$cer]);
    }




    //个人认证
    public function actionCertificationPersonal()
    {
      $id=$this->request->get('id')?$this->request->get('id'):'';

        $cer=new UserCer(['scenario'=>'personal']);
        $model = new UploadForm();

        if ($this->request->isPost)
        {

            $user_id=\Yii::$app->session->get('user_id');
            /*此时检测数据库中认证表中是否认认证过该用户 若没有则新增数据 若有则是修改数据
             *
             */
            $CerInfo=UserCer::find()->where(['user_id'=>$user_id])->one();
            if(isset($CerInfo)&&empty(!$CerInfo)&&$CerInfo->validate())
            {
                $post=$this->request->post();
                $CerInfo->real_name=$post['real_name'];
                $CerInfo->cer_idcard=$post['cer_idcard'];
                $CerInfo->cer_person=1;
                $CerInfo->user_id=$user_id;
                if($post['real_name']==''){
                    return $this->error('姓名不能为空');
                }
                $a=strlen($post['cer_idcard']);
                if($a!=18){
                    return $this->error('身份信息填写有误');
                }

                $model->imagefile=UploadedFile::getInstance( $model, 'imagefile');
                if($model->imagefile==null)
                {
                    return $this->error('你未选择正面照');


                }
                $model->imagefileback=UploadedFile::getInstance( $model, 'imagefileback');
                if($model->imagefileback==null)
                {
                    return $this->error('你未选择身份证背面照');


                }

                    if ($model->imagefile&&$model->validate())
                    {
                        $newspaths=$model->Upload();
                        $CerInfo->people_img_head=$newspaths[0];
                        $CerInfo->people_img_back=$newspaths[1];
                        $res=$CerInfo->save();
                        if($res){
                            if($id=='')
                            {

                                return $this->success($url=['user/index']);

                            }else{


                                return $this->success('/takeing/order-persons?id='.$id);
                            }




                        }else{
                            $errors=$CerInfo->getFirstErrors();
                            $first = current($errors);
                            return $this->error($first);


                        }


                    }else{

                        return $this->error('你未选择文件');
                    }


            }
            /**
             * 新增数据
             */
            $post=$this->request->post();
            $cer->real_name=$post['real_name'];
            $cer->cer_idcard=$post['cer_idcard'];
            $cer->cer_person=1;
            $cer->user_id=$user_id;
            if($cer->validate())
            {

                if ($model->imagefile&&$model->validate())
                {
                    $newspaths=$model->Upload();
                    $cer->people_img_head=$newspaths[0];
                    $cer->people_img_back=$newspaths[1];
                    $res=$cer->save();
                    if($res)
                    {
                        if($id=='')
                        {

                            return $this->success($url=['user/index']);

                        }else{


                            return $this->success('/takeing/order-persons?id='.$id);
                        }




                    }else{

                        $errors=$cer->getFirstErrors();
                        $first = current($errors);
                        return $this->error($first);

                    }


                }else{


                    return $this->error('请选择文件');

                }


            }
            else{

                $errors=$cer->getFirstErrors();
                $first = current($errors);
                return $this->error($first);

            }

        }


        return $this->render('certification-personal',['model'=>$model,'cer'=>$cer]);

    }


    public function actionLogout() {
        \Yii::$app->session->destroy('user_id');
    }
}