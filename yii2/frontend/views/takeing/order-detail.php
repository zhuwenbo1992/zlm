<?php
/**
 * Created by PhpStorm.
 * User: zk
 * Date: 2017/7/15
 * Time: 下午1:12
 */
?>
<div class="row wrapper border-bottom white-bg page-heading"
     style="position:fixed;height: 40px;left:0px;top:0px;right: 0px;z-index: 9;padding-top: 10px;padding-left: 20px;padding-right: 20px;">
    <div class="row" style="padding-top: 0px;padding-left: 20px;padding-right: 20px;">
        <div class="col-xs-3">
            <a href="javascript:history.go(-1)"><i class="fa fa-angle-left f16"></i></a>
        </div>
        <div class="col-xs-6 text-center"><span class="f16">订单详情</span></div>
        <div class="col-xs-3 text-right">
           <!--            <p style="padding-top: 5px;margin-bottom: 0px;"><a class="f12">确认</a></p>
            -->
        </div>
    </div>
</div>

<div style="height: 5px;padding-top: 40px;"></div>

<div class="row" style="padding-top: 5px;">
    <div class="col-xs-12 white-bg border-bottom" style="padding: 10px;line-height: 10px;padding-bottom: 0px;">

        <div style="padding-left: 10px;">
            <p><span class="pull-right" style="color: orangered;"><span
                        style="font-size: 18px;">¥<?=$Detail['hour_money']?></span><?=$Detail['money_code']?></span><span style="font-size: 14px;"><?=$Detail['work_name']?></span>

                <?php if($Detail['is_mandate']==2){?>
                <span class="badge badge-warning">已薪资托管</span>
                <?php }?>
            </p>
            <p style="color: darkgrey">
                <span class="pull-right"><span class="badge badge-primary" ><?=$Detail['payments']?></span></span>
                <i class="fa fa-bookmark-o primary-color"></i> <?=$Detail['job_name']?>
                <i class="fa fa-user-o primary-color" style="padding-left: 15px;"></i> 招<?=$Detail['people_num']?>人
                <i class="fa fa-compass primary-color" style="padding-left: 15px;"></i> <?=$Detail['dis_name']?>

            </p>
            <p style="color: darkgrey">
                <span><i class="fa fa-clock-o"></i> <?=date("Y-m-d H:i:s",$Detail['add_time'])?></span>
            </p>


        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 white-bg" style="padding: 10px;line-height: 10px;padding-bottom: 0px;">
        <p style="padding-top: 5px;padding-bottom: 5px;">
            <?php foreach($Detail['benfitch'] as $val):?>
                <span class="label label-default"
                      style="color: white;padding-top: 2px;padding-bottom: 2px;background: #CACFD2"><?=$val['ben_name']?></span>

            <?php endforeach;?>


        </p>


    </div>
</div>
<div style="height: 6px;"></div>

<div class="row white-bg">
    <div class="col-xs-12" style="padding-top: 5px;">
        <p>工作时间</p>
        <?php foreach ($Detail['date_time'] as $date):?>
        <p class="darkgrey-color"><span style="font-size: 8px;color: red;">●</span> <?=$date['start_date']?> -至- <?=$date['end_date']?>（<?=$date['work_day']?>）
            〡 <?=$date['time_start']?>
            - <?=$date['time_end']?></p>

        <?php endforeach;?>

    </div>

</div>
<div class="row white-bg border-top">
    <div class="col-xs-12" style="padding-top: 5px;">
        <p>工作地点</p>
        <p class="darkgrey-color"><?=$Detail['address']?> <?=$Detail['area_detail']?></p>

    </div>

</div>
<div style="height: 6px;"></div>

<div class="row white-bg">
    <div class="col-xs-12" style="padding-top: 5px;">
        <p>人员要求</p>
        <p class="darkgrey-color">
            <span class="btn btn-sm btn-default"><?=$Detail['people_edu']?></span>
            <span class="btn btn-sm btn-default"><?=$Detail['people_exc']?></span>
            <span class="btn btn-sm btn-default"><?=$Detail['people_age']?>岁</span>
        </p>
    </div>

</div>
<div class="row white-bg border-top">
    <div class="col-xs-12" style="padding-top: 5px;">
        <p>职位描述</p>
        <p class="darkgrey-color"><?=$Detail['duty_desc']?></p>


    </div>

</div>

<div style="height: 6px;"></div>


<div class="row">
    <div class="col-xs-12 white-bg border-bottom" style="padding: 10px;line-height: 20px;">
        <p>发布者</p>
        <div style="padding-left: 10px;">

<!--            <p><img src="--><?//=$Detail['headimgurl']?><!--" class="img-circle" style="height: 25px;width: 25px;"> -->
                <?=isset($Detail['company_name'])?$Detail['company_name']:''?> <i
                    class="fa fa-vimeo-square text-info" style="font-size: 14px;"></i></p>
        </div>
    </div>
</div>
<div style="height: 6px;"></div>

<div class="row">
    <div class="col-xs-12">
        <a href="/takeing/order-persons?id=<?=$Detail['order_id']?>" class="block btn btn-primary">接单</a>
    </div>
</div>
