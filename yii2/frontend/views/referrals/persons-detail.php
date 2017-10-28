<?php
/**
 * Created by PhpStorm.
 * User: zk
 * Date: 2017/7/15
 * Time: 下午9:20
 */
?>
<div class="row wrapper border-bottom white-bg page-heading"
     style="position:fixed;height: 40px;left:0px;top:0px;right: 0px;z-index: 9;padding-top: 10px;padding-left: 20px;padding-right: 20px;">
    <div class="row" style="padding-top: 0px;padding-left: 20px;padding-right: 20px;">
        <div class="col-xs-3">
            <a href="javascript:history.go(-1)"><i class="fa fa-angle-left f16"></i></a>
        </div>
        <div class="col-xs-6 text-center"><span class="f16">人才详情</span></div>
        <div class="col-xs-3 text-right">
<!--            <p style="padding-top: 2px;margin-bottom: 0px;"><a href="/site/persons-edit" class="f14 primary-color"><i class="fa fa-edit"></i></a></p>-->

        </div>
    </div>
</div>
<div style="height: 5px;padding-top: 45px;"></div>
<div class="row white-bg padding5 border-top-bottom">
    <a href="#" class="col-xs-12 f14 black-color">
        <p style="padding-top: 10px;">
            姓　　名：<span class="darkgrey-color"><?=isset($person['name'])?$person['name']:null?></span>
        </p>

        <p style="padding-top: 10px;">
            性　　别：<span class="darkgrey-color"><?=isset($person['sex'])&&$person['sex']==1?'男':null?><?=isset($person['sex'])&&$person['sex']==2?'女':null?></span>
        </p>
        <p style="padding-top: 10px;">
            年　　龄：<span class="darkgrey-color"><?=isset($person['age'])?$person['age']:null?></span>
        </p>
        <p style="padding-top: 10px;">
            所在地区：<span class="darkgrey-color"><?=isset($person['local_name'])?$person['local_name']:null?></span>
        </p>
        <p style="padding-top: 10px;">
            联系电话：<span class="darkgrey-color"><?=isset($person['mobile_phone'])?$person['mobile_phone']:null?></span>
        </p>
    </a>
</div>
<div style="height: 6px;"></div>

<div class="row white-bg border-bottom padding5">
    <div class="col-xs-4">
        <p class="default-title">最高学历</p>
    </div>
    <div class="col-xs-8 text-right">
        <p class="default-title darkgrey-color"><?=$person['education']?$person['education']:'无数据'?></p>
    </div>
</div>
<div class="row white-bg border-bottom padding5">
    <div class="col-xs-4">
        <p class="default-title">工作年限</p>
    </div>
    <div class="col-xs-8 text-right">
        <p class="default-title darkgrey-color"><?=$person['education']?$person['working_year']:'无数据'?></p>
    </div>
</div>
<div class="row white-bg border-bottom padding5">
    <div class="col-xs-12">
        <p class="default-title">期望职位</p>
    </div>
    <div class="col-xs-12">
        <p class="default-title darkgrey-color">
            <span class="label"><?=isset($person['job1_name'])?$person['job1_name']:null?></span>
            <span class="label"><?=isset($person['job2_name'])?$person['job2_name']:null?></span>
            <span class="label"><?=isset($person['job3_name'])?$person['job3_name']:null?></span>
        </p>
    </div>
</div>

<div style="height: 6px;"></div>

<div class="row">
    <div class="col-xs-12">
        <?php if(isset($act)&&empty(!$act)){?>
        <?php }else { ?>
        <a href="/referrals/persons-del?id=<?=$person['id']?$person['id']:null?>" class="block btn btn-default" style="color: orangered"><i class="fa fa-trash"></i> 删除</a>
    <?php }?>

    </div>
</div>

