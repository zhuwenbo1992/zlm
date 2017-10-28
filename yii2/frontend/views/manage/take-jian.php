<?php
/**
 * Created by PhpStorm.
 * User: zk
 * Date: 18/7/17
 * Time: PM1:09
 */
?>

<div class="row wrapper border-bottom white-bg page-heading"
     style="position:fixed;height: 40px;left:0px;top:0px;right: 0px;z-index: 9;padding-top: 10px;padding-left: 20px;padding-right: 20px;">
    <div class="row" style="padding-top: 0px;padding-left: 20px;padding-right: 20px;">
        <div class="col-xs-3">
            <a href="javascript:history.go(-1)"><i class="fa fa-angle-left f16"></i></a>
        </div>
        <div class="col-xs-6 text-center"><span class="f16">查看推荐</span></div>
        <div class="col-xs-3 text-right">
            <p style="padding-top: 2px;margin-bottom: 0px;"><a href="/referrals/qrcode" class="f18 black-color"><i class="fa fa-qrcode"></i></a> <a href="/referrals/persons-add" class="f18 black-color"><i class="fa fa-plus-square-o" style="padding-left: 6px;"></i></a></p>

        </div>

    </div>


</div>

<div style="height: 5px;padding-top: 45px;"></div>


<!--人才为空
<div class="row">
    <div class="col-xs-12 text-center" style="padding-top: 40px;padding-bottom: 40px;">
        <i class="fa fa-heart fa-5x"></i>
        <p style="padding-top: 20px;">录入人才，极速接单，轻松赚钱</p>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 text-center" style="padding-top: 30px;">
        <a href="/site/persons-add" class="btn btn-white block primary-color primary-border">添加你的第一个人才</a>
    </div>
</div>
结束人才为空-->

<div style="height: 6px;"></div>
<?php if(isset($userinfo)&&empty(!$userinfo)) {?>

    <div class="row white-bg padding5 border-bottom">

        <a  class="col-xs-11 f14 black-color">
            <p style="padding-top: 10px;"><span class="pull-right"><i class="fa fa-mobile"></i><?=$userinfo['cer_phone']?></span><?=$userinfo['real_name']?>  </p>
            <p class="darkgrey-color f12"><?=$userinfo['province']?> | <?=$userinfo['city']?> | </p><span>我自己</span>
            <span class="pull-right darkgrey-color">
        <a  style="float: right;color:black"  class="btn btn-default" style="padding-left: 30px;padding-right: 30px;">未被录用</a >
        </span>
        </a>
    </div>

<?php }?>


<?php foreach ($referrals as $value): ?>

    <?php if(isset($value['userList'])&&empty(!$value['userList'])) { ?>
        <div class="row white-bg padding5 border-bottom">

            <a href="/referrals/persons-detail?id=<?=isset($value['userList'][0]['id'])?$value['userList'][0]['id']:null?>&&act=order" class="col-xs-11 f14 black-color">
                <p style="padding-top: 10px;"><?php if (isset($value['userList'][0]['mobile_phone'])&&empty(!$value['userList'][0]['mobile_phone'])):?>
                        <span class="pull-right"><i class="fa fa-mobile"></i>
                            <?=isset($value['userList'][0]['mobile_phone'])?$value['userList'][0]['mobile_phone']:''?></span>



                    <?php endif;?><?=isset($value['userList'][0]['name'])?$value['userList'][0]['name']:''?>
                    | <?=isset($value['userList'])?$value['userList'][0]['sex']==1?'男':'女':""?>
                    | <?=isset($value['userList'])?$value['userList'][0]['age']:''?>岁 </p>

                <p>证件号：<?=isset($value['userList'][0]['idno'])?$value['userList'][0]['idno']:''?></p>

                <?=isset($value['userList'][0]['province_name'])?$value['userList'][0]['province_name']:''?>
                ||<?=isset($value['userList'][0]['city_name'])?$value['userList'][0]['city_name']:''?>
                ||<?=isset($value['userList'][0]['area_name'])?$value['userList'][0]['area_name']:''?>


                </p>
                <p class="darkgrey-color">
                    <span class="label"><?=isset($value['userList'][0]['job1_name'])?$value['userList'][0]['job1_name']:null?></span>
                    <span class="label"><?=isset($value['userList'][0]['job2_name'])?$value['userList'][0]['job2_name']:null?></span>
                    <span class="label"><?=isset($value['userList'][0]['job3_name'])?$value['userList'][0]['job3_name']:null?></span></p>

        <?php if($value['is_offer']==1) {?>
            <span class="pull-right darkgrey-color">
        <a style="float: right;color:green" href="" class="btn btn-default" style="padding-left: 30px;padding-right: 30px;">已被录用</a >
        </span>

        <?php }?>

        <?php if($value['is_offer']==2) {?>

            <span class="pull-right darkgrey-color">
        <a style="float: right;color:red"     href="" class="btn btn-default" style="padding-left: 30px;padding-right: 30px;">已被拒绝</a >
        </span>

        <?php }?>

        <?php if($value['is_offer']==0) {?>

            <span class="pull-right darkgrey-color">
        <a style="float: right;color:black" href="" class="btn btn-default" style="padding-left: 30px;padding-right: 30px;">未被录用</a >
        </span>

        <?php }?>

    <?php }?>
            </a>



        </div>




<?php endforeach;?>




