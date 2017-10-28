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
        <div class="col-xs-6 text-center"><span class="f16">人才管理</span></div>
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
<div class="row">
    <div class="col-xs-12" style="padding-left: 5px;padding-right: 5px;">
        <div class="input-group" style="">
            <input id="search_value" type="text" class="form-control f12" placeholder="搜索姓名/手机号">
            <span class="input-group-btn">
                <button type="button" onclick="if ($('#search_value').val()!='') window.location='/referrals/search?value=' + $('#search_value').val()" class="btn btn-default"><i class="fa fa-search"></i></button>
            </span>
        </div>
    </div>
</div>
<div style="height: 6px;"></div>

<?php foreach ($personList as $value):?>
<div class="row white-bg padding5 border-bottom">

    <a href="/referrals/persons-detail?id=<?=$value['id']?>&&act=<?=$value['is_offer']?>" class="col-xs-11 f14 black-color">


        <p style="padding-top: 10px;"><?php if ($value['mobile_phone']!=0):?>
                <span class="pull-right"><i class="fa fa-mobile"></i> <?=$value['mobile_phone']?></span><?php endif;?><?=$value['name']?> | <?=$value['sex']==1?'男':'女'?> | <?=$value['age']?>岁 </p>
        <p class="darkgrey-color f12"><?=$value['local_name']?></p>


        <p>证件号：<?=isset($value['idno'])?$value['idno']:''?></p>
        <p class="darkgrey-color">
            <span class="label"><?=isset($value['job1_name'])?$value['job1_name']:null?></span>
            <span class="label"><?=isset($value['job2_name'])?$value['job2_name']:null?></span>
            <span class="label"><?=isset($value['job3_name'])?$value['job3_name']:null?></span></p>


        <?php if($value['is_offer']=='luyong') {?>
            <span class="pull-right darkgrey-color">
        <a  style="float: right ;color:green" href="" class="btn btn-default" style="padding-left: 30px;padding-right: 30px;">已被录用</a >
        </span>

        <?php }?>
    </a>
</div>
<?php endforeach;?>
