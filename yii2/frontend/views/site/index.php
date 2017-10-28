<?php
/**
 * Created by PhpStorm.
 * User: zk
 * Date: 29/6/17
 * Time: PM2:39
 */
$this->title = '找了么';
//print_r($CityList);die;
?>
<body>
<div id="all">
    <div class="row wrapper border-bottom white-bg page-heading"
     style="position:fixed;height: 40px;left:0px;top:0px;right: 0px;z-index: 9;">
    <div class="row" style="padding-top: 10px;padding-left: 20px;padding-right: 20px;">
        <div class="col-xs-3">

            <select  style="border: solid 0px white "  class="fa fa-angle-down"   name="city_id" id="city_id">

                <option value="/site/index?city_id=4">上海</xuanze></option>

                <?php foreach ($CityList as $v){?>

                <option class="text-multed" value="/site/index?city_id=<?=$v['regionid']?>"
                    <?= isset($city_id) && $city_id == $v['regionid'] ? 'selected' : ''?>><?=$v['regionname']?></option>
           <?php }?>

            </select>


<!--            <div class="btn-group">-->
<!--                <button data-toggle="dropdown" class="dropdown-toggle" aria-expanded="false">区域 <span-->
<!--                            class="caret"></span></button>-->
<!--                <ul class="dropdown-menu">-->
<!--                    --><?php //foreach ($CityList as $v): ?>
<!--                        <li><a href="/site/index?city_id=--><?//=$v['regionid']?><!--">--><?//=$v['regionname']?><!--</a ></li>-->
<!--                    --><?php //endforeach; ?>
<!--                </ul>-->
<!--            </div>-->




        </div>
        <div class="col-xs-6 text-center"><span class="h5 text-primary" style="color: orange;">找了么</span></div>
        <div class="col-xs-3 text-right">
            <i class="fa fa-comment"></i>

        </div>
    </div>
</div>

<div class="row" style="padding-top: 40px;">
    <div class="slick_demo_1" style="margin-bottom: 0px;">

        <div>
            <img alt="image" class="img-responsive" src="/main.jpg">
        </div>
        <div>
            <img alt="image" class="img-responsive" src="/main.jpg">
        </div>

    </div>
</div>
    <form id="searchForm" action="/site/index" method="get">
<div class="row white-bg" style="padding-top: 15px;">
    <div class="col-xs-12" >
        <div class="input-group" style="padding-right: 15px;padding-left: 15px;">
            <input type="text"   name="work" class="form-control" placeholder="今天想接什么活？">
            <span class="input-group-btn">



                <a onclick="$('#searchForm').submit()" type="button" class="btn btn-default">
                    <i class="fa fa-search"></i>

                </a>



            </span>
        </div>
    </div>
</div>

    </form>

<div class="row white-bg" style="padding-top: 15px;">
    <div class="col-xs-12" >
        <p class="row" style="padding: 5px;">
            <a href="/takeing/index?city_id=<?=isset($city_id)?$city_id:4?>" class="col-xs-3 border-right text-center f12 black-color" style="line-height: 25px;"><i class="fa fa-file-o primary-color" style="font-size: 28px;"></i><br>我要接活</a>
            <a href="/site/order-post" class="col-xs-3 border-right text-center f12 black-color" style="line-height: 25px;"><i class="fa fa-paper-plane-o primary-color" style="font-size: 28px;"></i><br>我要发活</a>



            <a href="/referrals/index" class="col-xs-3 border-right text-center f12 black-color" style="line-height: 25px;"><i class="fa fa-wpforms primary-color" style="font-size: 28px;"></i><br>人才管理</a>
            <a href="/service/index" class="col-xs-3 text-center f12 black-color" style="line-height: 25px;"> <i class="fa fa-headphones primary-color" style="font-size: 28px;"></i><br>客服热线</a>
        </p>

    </div>
</div>




<!--<div class="row white-bg" style="padding-top: 10px;padding-bottom: 10px;">
    <div class="col-xs-6" style="padding-right: 5px;padding-left: 30px;">
        <a href="/site/order-post" class="btn btn-primary block"><i class="fa fa-external-link"></i> 我要发单</a>
    </div>
    <div class="col-xs-6" style="padding-left: 5px;padding-right: 30px;">
        <a href="/new/order-taking" class="btn btn-default btn-info block gray-bg"><i class="fa fa-ticket"></i>
            我要接单</a>
    </div>

</div>-->


<!--<div class="row" style="padding-top: 0px;">
    <div class="col-xs-12 white-bg" style="padding-bottom: 5px;">

        <h4>
            今日面试
        </h4>
    </div>
</div>-->

    <?php if(isset($OrderList)&&empty(!$OrderList)){?>

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
                    <p style="color: #cccccc" class="f12">
                    <span class="pull-right">
                        <i class="fa fa-clock-o"></i>
                        <?= \common\models\MyHelp::time_ago($val['add_time'])?>
                    </span>
                        <?= $val['address']['city_id'] ?> 〡 <?= $val['address']['area_id'] ?> 〡 <?= $val['people_exc'] ?>
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

<!--                <img src="--><?//=$val['headimgurl']?><!--" class="img-circle" style="height: 25px;width: 25px;"> -->

                <?=isset($val['company_name'])?$val['company_name']:''?> <i
                        class="fa fa-vimeo-square text-info" style="font-size: 14px;"></i>
            </div>
        </div>
    </div>
<?php endforeach;?>

    <?php  }?>



</div>
</body>
<script  src="http://libs.baidu.com/jquery/1.7.2/jquery.min.js"></script>
<script>


    $(function(){

        $('select[name="city_id"]').change(function(){
            var id = $(this).val();
            //var url = "<?=\yii\helpers\Url::to(['site/get-city'])?>";//
            window.location =id;






        })
    })




//
//    // 将值传入好后台
//    $.ajax({
//        type:'POST',
//        url:"{:U('Index/index')}",
//        data:"value="+value,
//        success:function(result){
//
//
//            $("body").html(result);
//        }
//
//
//    })
//
//
//    })
//    })

</script>






