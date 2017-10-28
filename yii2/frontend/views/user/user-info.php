<?php
/**
 * Created by PhpStorm.
 * User: zk
 * Date: 14/7/17
 * Time: PM2:21
 */
?>

<div class="row primary-bg"style="height: 120px;">
    <div class="col-xs-3 text-right" style="padding-right: 0px;">

        <p style="padding-top: 30px;"><img src="<?=$UserList['headimgurl']?>"  class="img-circle circle-border m-b-md" style="border: 3px solid #FFFFFF;" alt="profile" width="46" height="46"></p>
    </div>
    <div class="col-xs-9">
        <p class="white-color f14" style="padding-top: 35px;margin-bottom: 5px;"><strong><?=$UserList['nickname']?></strong></p>
        <p>
            <?php if($CerInfoList['cer_person']==1){ ?>

            <span class="label label-primary" style="background: #329D82"><i class="fa fa-vimeo-square"></i> 已实名认证</span>


            <?php }?>

            <?php if($CerInfoList['cer_person']==0){ ?>

                <span class="label label-primary" style="background: #329D82"><i class=""></i> 未实名认证</span>


            <?php }?>

            <?php if($CerInfoList['cer_company']==0||$CerInfoList['cer_company']==1){ ?>

                <span class="label label-primary" style="background: #329D82"><i class=""></i> 未企业认证</span>


            <?php }?>
            <?php if($CerInfoList['cer_company']==2){ ?>

                <span class="label label-primary" style="background: #329D82"><i class="fa fa-vimeo-square"></i> 已企业认证</span>

            <?php }?>
            <?php if($CerInfoList['cer_company']==2&&$CerInfoList['cer_phone']==1){ ?>

                <span class="label label-primary" style="background: #329D82"><i class="fa fa-vimeo-square"></i> 已实名认证</span>
                <span class="label label-primary" style="background: #329D82"><i class="fa fa-vimeo-square"></i> 已企业认证</span>


            <?php }?>






        </p>
    </div>
</div>
<!--<div class="row white-bg padding5" style="padding-top: 10px;padding-bottom: 10px;">
    <div class="col-xs-6">
        <span>我的钱包</span>
    </div>
    <div class="col-xs-6 text-right">
        <span style="color: orange;"><i class="fa fa-cny"></i> 去提现</span>
    </div>
</div>
<div class="row border-top border-bottom">
    <div class="col-xs-12 white-bg padding5" style="line-height: 25px;">

        <p></p>
        <p class="col-xs-4 border-right text-center">钱包余额<br><b class="primary-color f18">187.00</b> 元</p>
            <p class="col-xs-4 border-right text-center">待收金额<br><span class="f18">100.00</span> 元</p>
            <p class="col-xs-4 text-center">待付金额<br><span class="f18">0.00</span> 元</p></p>

    </div>
</div>-->

<div class="row black-color" style="padding-top: 0px;">

</div>
<div class="row black-color" style="padding-top: 10px;">
    <div class="col-xs-12 white-bg border-bottom" style="padding:15px;">

        <span class="pull-right"><i class="fa fa-angle-right"></i></span>
        <i class="fa fa-user-o"></i> <a href="/user/list">个人资料</a>

    </div>

 <?php if($CerInfoList['cer_person']==1){ ?>

     <div class="col-xs-12 white-bg" style="padding:15px;">

         <a  class="block" href="/user/person-info"><span class="pull-right"><small class="darkgrey-color" style="padding-right: 10px;">已认证</small> <i class="fa fa-angle-right"></i></span>
             <i class="fa fa-flag-o"></i> 实名认证  <span style="font-size: 12px;color: red;">●</span></a>

     </div>

    <?php }else{?>

     <div class="col-xs-12 white-bg" style="padding:15px;">

         <a class="block" href="/site/certification-personal"><span class="pull-right"><small class="darkgrey-color" style="padding-right: 10px;">未认证</small> <i class="fa fa-angle-right"></i></span>
             <i class="fa fa-flag-o"></i> 实名认证  <span style="font-size: 12px;color: red;">●</span></a>

     </div>

 <?php }?>


    <?php if ($CerInfoList['cer_company']==0){?>
        <div class="col-xs-12 white-bg" style="padding:15px;">

            <a class="block" href="/site/certification-company"><span class="pull-right"><small class="darkgrey-color" style="padding-right: 10px;">未认证</small> <i class="fa fa-angle-right"></i></span>
                <i class="fa fa-money"></i> 企业认证  <span style="font-size: 12px;color: red;">●</span></a>

        </div>

   <?php  } ?>

    <?php if ($CerInfoList['cer_company']==2){?>
        <div class="col-xs-12 white-bg" style="padding:15px;">

            <a class="block" href="/user/company-info"><span class="pull-right"><small class="darkgrey-color" style="padding-right: 10px;">认证通过</small> <i class="fa fa-angle-right"></i></span>
                <i class="fa fa-money"></i> 企业认证  <span style="font-size: 12px;color: red;">●</span></a>

        </div>

    <?php  } ?>
    <?php if ($CerInfoList['cer_company']==1){?>
        <div class="col-xs-12 white-bg" style="padding:15px;">

            <a class="block" href="/user/company-info"><span class="pull-right"><small class="darkgrey-color" style="padding-right: 10px;">认证审核中</small> <i class="fa fa-angle-right"></i></span>
                <i class="fa fa-money"></i> 企业认证  <span style="font-size: 12px;color: red;">●</span></a>

        </div>

    <?php  } ?>
    <?php if ($CerInfoList['cer_company']==3){?>
        <div class="col-xs-12 white-bg" style="padding:15px;">

            <a class="block" href="/site/certification-company"><span class="pull-right"><small class="darkgrey-color" style="padding-right: 10px;">认证失败</small> <i class="fa fa-angle-right"></i></span>
                <i class="fa fa-money"></i> 企业认证  <span style="font-size: 12px;color: red;">●</span></a>

        </div>

    <?php  } ?>








</div>

<div class="row default-title" style="padding-top: 5px;">
    <div class="col-xs-12 white-bg" style="padding:15px;">

        <a href="/referrals/" class="block"><span class="pull-right"><i class="fa fa-angle-right"></i></span>
            <i class="fa fa-paper-plane-o"></i> 人才管理 </a>

    </div>
</div>
<div class="row default-title" style="padding-top: 5px;">
    <div class="col-xs-12 white-bg" style="padding:15px;">

        <a href="/site/logout" class="block"><span class="pull-right"><i class="fa fa-angle-right"></i></span>
            <i class="fa fa-paper-plane-o"></i> 退出登录 </a>

    </div>
</div>