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
                <a class="btn btn-primary" style="padding-left: 30px;padding-right: 30px;">我发的单</a>
                <a href="/manage/my-take" class="btn btn-white" style="padding-left: 30px;padding-right: 30px;">我接的单</a>
            </div>
        </div>
    </div>
    <div class="row white-bg" style="height: 5px;"></div>
    <div class="row white-bg">
        <div class="col-xs-3 text-center"  style="padding-top: 10px;padding-bottom: 10px;">
            <span class="f12"><a class="black-color" href="/manage/my-post">全部</a></span>
        </div>
        <div class="col-xs-3 text-center"  style="padding-top: 10px;padding-bottom: 10px;border-bottom: 2px solid #32B294">
            <span class="f12"><a class="black-color" href="/manage/pending">待处理</dai></a></span>
        </div>
        <div class="col-xs-3 text-center"  style="padding-top: 10px;padding-bottom: 10px;">
            <span class="f12"><a class="black-color" href="/manage/on-way">进行中</a></span>
        </div>
        <div class="col-xs-3 text-center"  style="padding-top: 10px;padding-bottom: 10px;">
            <span class="f12"><a class="black-color" href="/manage/ending">已结束</a></span>
        </div>
    </div>
    <div class="row white-bg border-top"></div>
    <div class="row" style="height: 5px;"></div>
<?php if(is_array($MyPostList)&&empty(!$MyPostList)){?>
<?php foreach ($MyPostList as $key=>$val):?>
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
    <div class="row white-bg padding5 border-bottom">
        <div class="col-xs-12 black-color text-right padding5" >



            <?php if($val['is_mandate']==0&&$val['order_status']>0){?>
                <a href="/manage/money-manage" class="btn btn-sm btn-default">申请薪资托管</a>
            <?php }?>

            <?php if($val['is_mandate']==1&&$val['order_status']>0){?>
                <a href="/manage/money-manage" class="btn btn-sm btn-default">薪资托管(审核中)</a>
            <?php }?>

            <?php if($val['is_mandate']==2&&$val['order_status']>0){?>

                <a class="btn btn-sm btn-outline btn-primary">薪资已托管</a>
            <?php }?>



            <?php if(isset($val['take_num'])&&!empty($val['take_num'])){ ?>

                <?php if($val['order_status']==2&&$val['take_num'][0]['taking_people']>0){?>

                    <a  href="/manage/ren-cai?order_id=<?=$val['take_num'][0]['order_take_id']?>&&is_myself=<?=$val['take_num'][0]['is_myself']?>" style="color:red" class="btn btn-sm btn-outline btn-primary"><?=$val['take_num'][0]['taking_people']?>人已报名</a>
                <?php }?>

            <?php }?>

        </div>
    </div>
        <div class="row" style="height: 5px;"></div>
<?php endforeach;?>
<?php } ?>
