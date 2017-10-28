<?php
/**
 * Created by PhpStorm.
 * User: zk
 * Date: 2017/7/15
 * Time: 下午12:44
 */
?>
<div class="row wrapper border-bottom white-bg page-heading"
     style="position:fixed;height: 40px;left:0px;top:0px;right: 0px;z-index: 9;padding-top: 10px;padding-left: 20px;padding-right: 20px;">
    <div class="row" style="padding-top: 0px;padding-left: 20px;padding-right: 20px;">
        <div class="col-xs-3">
            <a href="javascript:history.go(-1)"><i class="fa fa-angle-left f16"></i></a>
        </div>
        <div class="col-xs-6 text-center"><span class="f16">接活</span></div>
        <div class="col-xs-3 text-right">
            <!--            <p style="padding-top: 5px;margin-bottom: 0px;"><a class="f12">确认</a></p>
            -->
        </div>
    </div>
</div>

<form id="searchForm" action="/takeing/index" method="post">

<div style="height: 5px;padding-top: 45px;"></div>
<div class="row">
    <input name="_csrf-frontend" type="hidden" id="_csrf-frontend" value="<?= \Yii::$app->request->csrfToken ?>">
    <div class="col-xs-9" style="padding-left: 5px;padding-right: 5px;">
        <div class="btn-group">

                <select  style="border: solid 0px white " name="dis_name" id="">
                    <option value="">区域</option>
                    <?php foreach ($GroundList as $value){?>
                    <option value="<?=$value['regionid']?>"><?=$value['regionname']?></option>
                    <?php }?>

                </select>

        </div>




        <div class="btn-group">

            <select style="border: solid 0px white"  name="jiesuan" id="">
                <option value="">结算</option>
                <option value="日结">日结</option>
                <option value="月结">月结</option>
                <option value="周结">周结</option>

            </select>

        </div>
        <div class="btn-group">

            <select style="border: solid 0px white"  name="edu" id="">
                <option value="">学历</option>
                <option value="初中">初中</option>
                <option value="大专">大专</option>
                <option value="本科">本科</option>

            </select>

        </div>

    </div>

    <div class="col-xs-3" style="padding-left: 5px;padding-right: 5px;">
        <div class="input-group" style="">
            <input type="text"  name="work" class="form-control f12" placeholder="搜索职位" style="padding: 1px;padding-left:3px;height: 24px;">




            <span class="input-group-btn">


            <a onclick="$('#searchForm').submit()" type="button" class="btn btn-default"style="padding-top: 1px;padding-bottom: 1px;padding-left: 5px;padding-right: 5px;">
                <i class="fa fa-search"></i>

            </a>

        </span>

        </div>
    </div>
</div>


</form>

<?php foreach ($OrderList as $k=>$val):?>

<div class="row" style="padding-top: 5px;">

    <a href="/takeing/order-detail?id=<?= $val['order_id'] ?>" class="col-xs-12 white-bg border-top-bottom"
       style="padding: 10px;line-height: 10px;">

        <div class="col-xs-12 white-bg" style="padding: 10px;line-height: 10px;">

            <div style="padding-left: 10px;">
                <p>
                    <span class="pull-right" style="color: orangered;">
                        <span style="font-size: 18px;">¥<?= $val['hour_money'] ?></span><?=$val['money_code']?>
                    </span>
                    <span class="black-color" style="font-size: 14px;"><?= $val['work_name'] ?>（<?= $val['people_num'] ?>人）</span>

                    <?php if($val['is_mandate']==2){?>
                    <span class="badge badge-warning">已薪资托管</span>
                    <?php }?>
                </p>
                <p style="color: darkgrey">
                    <span class="pull-right">
                        <i class="fa fa-clock-o"></i>
                        <?=\common\models\MyHelp::time_ago($val['add_time'])?>
                    </span>
                    |<?= $val['address']['city_id'] ?> 〡 <?= $val['address']['area_id'] ?> 〡 <?= $val['people_exc'] ?>
                </p>
                <?php if ($val['benfitch']): ?>
                <p style="padding-top: 5px;padding-bottom: 5px;">
                    <?php foreach ($val['benfitch'] as $v): ?>
                        <span class="label label-default"
                              style="color: white;padding-top: 2px;padding-bottom: 2px;background: #CACFD2"><?= $v['ben_name'] ?></span>


                    <?php endforeach; ?>
                </p>
                <?php endif; ?>
                <?php foreach ($val['date_time'] as $value) : ?>
                    <p style="margin-bottom: 0px;color: #7f7f7f;" class="f12"><span
                                style="font-size: 8px;color: red;">●</span> <?= $value['start_date'] ?> -
                        至-<?= $value['end_date'] ?>（<?= $value['work_day'] ?>）〡
                        <?= $value['time_start'] ?>
                        - <?= $value['time_end'] ?></p>
                    <p></p>
                <?php endforeach; ?>

            </div>
        </div>
    </a>
</div>
<div class="row">
    <div class="col-xs-12 white-bg border-bottom" style="padding: 10px;line-height: 10px;">

        <div style="padding-left: 10px;">
            <div class=" pull-right" style="padding-top: 3px;"><span class="badge" ><?=$val['payments']?></span></div>

<!--            <img src="--><?//=$val['headimgurl']?><!--" class="img-circle" style="height: 25px;width: 25px;"> -->

            <?=isset($val['company_name'])?$val['company_name']:''?> <i
                    class="fa fa-vimeo-square text-info" style="font-size: 14px;"></i>
        </div>
    </div>
</div>
<?php endforeach;?>


