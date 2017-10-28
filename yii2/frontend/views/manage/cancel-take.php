<?php
/**
 * Created by PhpStorm.
 * User: zk
 * Date: 18/7/17
 * Time: PM2:36
 */
?>

<div class="row wrapper border-bottom white-bg page-heading"
     style="position:fixed;height: 40px;left:0px;top:0px;right: 0px;z-index: 9;padding-top: 10px;padding-left: 20px;padding-right: 20px;">
    <div class="row" style="padding-top: 0px;padding-left: 20px;padding-right: 20px;">
        <div class="col-xs-3">
            <a href="javascript:history.go(-1)"><i class="fa fa-angle-left f16"></i></a>
        </div>
        <div class="col-xs-6 text-center"><span class="f16">订单管理</span></div>
        <div class="col-xs-3 text-right">

        </div>
    </div>
</div>
<div class="row white-bg" style="height: 5px;padding-top: 55px;"></div>

<div class="row white-bg">
    <div class="col-xs-12 text-center" style="padding-left: 5px;padding-right: 5px;">
        <div class="btn-group">
            <a href="/manage/my-post" class="btn btn-white" style="padding-left: 30px;padding-right: 30px;">我发的单</a>
            <a  class="btn btn-primary" style="padding-left: 30px;padding-right: 30px;">我接的单</a>
        </div>
    </div>
</div>
<div class="row white-bg" style="height: 5px;"></div>
<div class="row white-bg">
    <div class="col-xs-3 text-center"  style="padding-top: 10px;padding-bottom: 10px;">
        <span class="f12"><a class="black-color" href="/manage/my-take">全部</a></span>
    </div>
    <div class="col-xs-3 text-center"  style="padding-top: 10px;padding-bottom: 10px;">
        <span class="f12"><a class="black-color" href="/manage/applay">申请中</a></span>
    </div>

    <div class="col-xs-3 text-center"  style="padding-top: 10px;padding-bottom: 10px;">
        <span class="f12"><a class="black-color" href="/manage/offer">已录用</a></span>
    </div>
    <div class="col-xs-3 text-center"  style="padding-top: 10px;padding-bottom: 10px;border-bottom: 2px solid #32B294">
        <span class="f12"><a class="black-color" href="/manage/cancel">已取消</a></span>
    </div>
</div>
<div class="row white-bg border-top"></div>
<div class="row" style="height: 5px;"></div>

<?php if(is_array($MyTakeList)&&empty(!$MyTakeList)){?>

    <?php foreach ($MyTakeList as $key=>$val):?>
<a href="/manage/order-detail?id=<?=$val['order_id']?>">
        <div class="row white-bg padding5 border-bottom">
            <div class="col-xs-12 black-color" style="padding-top:5px;padding-left: 5px;padding-right: 5px;">
                <p class="f14"><small class="pull-right darkgrey-color"><span class="f14">￥<?=$val['hour_money']?></span>/时</small><?=$val['work_name']?>（<?=$val['people_num']?>人）</p>

                <p class="f12 darkgrey-color"><small class="pull-right darkgrey-color"><span class="badge">日结</span></small>

                    <i class="fa fa-map-marker"></i> <?=$val['city_name']?> | <?-$val['dis_name']?> | <?=$val['area_name']?> <i class="fa fa-clock-o" style="padding-left: 15px;">

                    </i><?=\common\models\MyHelp::time_ago($val['add_time'])?>
                </p>
            </div>
        </div>
</a>


    <?php endforeach;?>
<?php }else{?>
    <div class="row" style="height: 5px;"></div>
    <div class="text-center" style="padding-top: 60px;">
        <span class="darkgrey-color">您还没有接单， <a href="/takeing/index">马上去接单</a></span>
    </div>

<?php }?>
