<?php
/**
 * Created by PhpStorm.
 * User: zk
 * Date: 2017/6/20
 * Time: 上午8:29
 */
?>
<div class="row wrapper border-bottom white-bg page-heading" style="position:fixed;height: 40px;left:0px;top:0px;right: 0px;z-index: 9;">
    <div class="row" style="padding-top: 10px;padding-left: 20px;padding-right: 20px;">
        <div class="col-xs-3">
            <a href="/new/index"><i class="fa fa-angle-left"></i> 返回</a>
        </div>
        <div class="col-xs-6 text-center">接单</div>
        <div class="col-xs-3 text-right">
            <i class="fa fa-comment"></i>

        </div>
    </div>
</div>
<div class="row" style="padding-top: 50px;">
    <div class="col-xs-12">
        <div class="btn-group">
            <button data-toggle="dropdown" class="btn btn-default btn-xs dropdown-toggle" aria-expanded="false">区域 <span class="caret"></span></button>
            <ul class="dropdown-menu">
                <li><a href="buttons.html#">莘庄工业区</a></li>
                <li><a href="buttons.html#">闵行工业区</a></li>
                <li><a href="buttons.html#">金桥高科技开发区</a></li>
                <li class="divider"></li>
                <li><a href="buttons.html#">浦东国际经济开发区</a></li>
                <li><a href="buttons.html#">浦东某某开发区</a></li>
            </ul>
        </div>
        <div class="btn-group">
            <button data-toggle="dropdown" class="btn btn-default btn-xs dropdown-toggle" aria-expanded="false">工种 <span class="caret"></span></button>
            <ul class="dropdown-menu">
                <li><a href="buttons.html#">操作工</a></li>
                <li><a href="buttons.html#">洗碗工</a></li>
                <li><a href="buttons.html#">钳工</a></li>
                <li class="divider"></li>
                <li><a href="buttons.html#">某某公</a></li>
                <li><a href="buttons.html#">某某工</a></li>
            </ul>
        </div>

        <div class="btn-group">
            <button data-toggle="dropdown" class="btn btn-default btn-xs dropdown-toggle" aria-expanded="false">时薪 <span class="caret"></span></button>
            <ul class="dropdown-menu">
                <li><a href="buttons.html#">15元以下</a></li>
                <li><a href="buttons.html#">16元</a></li>
                <li><a href="buttons.html#">17元</a></li>
                <li><a href="buttons.html#">18元</a></li>
                <li><a href="buttons.html#">19元</a></li>
                <li><a href="buttons.html#">20元</a></li>
                <li><a href="buttons.html#">21元</a></li>
                <li><a href="buttons.html#">22元每人每小时</a></li>
                <li><a href="buttons.html#">23元</a></li>
                <li><a href="buttons.html#">24元</a></li>
                <li><a href="buttons.html#">25元每小时</a></li>

            </ul>
        </div>
        <div class="btn-group">
            <button data-toggle="dropdown" class="btn btn-default btn-xs dropdown-toggle" aria-expanded="false">福利 <span class="caret"></span></button>
            <ul class="dropdown-menu">
                <li><a href="buttons.html#">五险一金</a></li>
                <li><a href="buttons.html#">班车接送</a></li>
                <li><a href="buttons.html#">包食宿</a></li>
                <li><a href="buttons.html#">带薪年假</a></li>
                <li><a href="buttons.html#">话费报销</a></li>

            </ul>
        </div>
        <div class="pull-right" style="padding-top: 2px;">
            <i class="fa fa-bullhorn"></i> <span style="color: orangered;">接单帮助</span>
        </div>
    </div>
</div>
<div class="row" style="padding-top: 3px;">
    <div class="col-xs-12">

        <div class="list-group white-bg" style="margin-bottom: 3px;">
            <div class="list-group-item" onclick="window.location='<?=\yii\helpers\Url::toRoute('/new/job')?>'">
                <p><strong class="text-info">洗碗工</strong> 10人 <i class="fa fa-ellipsis-v" style="color: #cfcfcf;" ></i> 25元/时 <i class="fa fa-ellipsis-v" style="color: #cfcfcf;"></i> <span style="color: orangered;"><i class="fa fa-money"></i> 2元/时</span></p>
                <p class="block text-muted"><span class="text-warning"><i class="fa fa-circle-o"></i></span> 7月23日，工作日，9点-12点</p>
                <p class="block"><strong>微笑的萝卜</strong> <small class="text-muted"><i class="fa fa-clock-o"></i> 刚刚</small></p>
            </div>
        </div>
        <div class="list-group white-bg" style="margin-bottom: 3px;">
            <div class="list-group-item" onclick="window.location='<?=\yii\helpers\Url::toRoute('/new/job')?>'">
                <p><strong class="text-info">洗碗工</strong> 10人 <i class="fa fa-ellipsis-v" style="color: #cfcfcf;" ></i> 25元/时 <i class="fa fa-ellipsis-v" style="color: #cfcfcf;"></i> <span style="color: orangered;"><i class="fa fa-money"></i> 2元/时</span></p>
                <p class="block text-muted"><span class="text-warning"><i class="fa fa-circle-o"></i></span> 7月23日到8月1日，工作日，9点-12点</p>
                <p class="block text-muted"><strong>微笑的萝卜</strong> <small class="text-muted"><i class="fa fa-clock-o"></i> 刚刚</small></p>
            </div>
        </div>
        <div class="list-group white-bg" style="margin-bottom: 3px;">
            <div class="list-group-item" onclick="window.location='<?=\yii\helpers\Url::toRoute('/new/job')?>'">
                <p><strong class="text-info">洗碗工</strong> 10人 <i class="fa fa-ellipsis-v" style="color: #cfcfcf;" ></i> 25元/时 <i class="fa fa-ellipsis-v" style="color: #cfcfcf;"></i> <span style="color: orangered;"><i class="fa fa-money"></i> 2元/时</span></p>
                <p class="block text-muted"><span class="text-warning"><i class="fa fa-circle-o"></i></span> 7月23日到8月1日，工作日，9点-12点</p>
                <p class="block text-muted"><span class="text-warning"><i class="fa fa-circle-o"></i></span> 7月23日到8月1日，工作日，13点-18点</p>
                <p class="block text-muted"><span class="text-warning"><i class="fa fa-circle-o"></i></span> 7月23日到8月1日，周末，10点-11点</p>

                <p class="block"><strong>微笑的萝卜</strong> <small class="text-muted"><i class="fa fa-clock-o"></i> 刚刚</small></p>
            </div>
        </div>
        <div class="list-group white-bg" style="margin-bottom: 3px;">
            <div class="list-group-item" onclick="window.location='<?=\yii\helpers\Url::toRoute('/new/job')?>'">
                <p><strong class="text-info">洗碗工</strong> 10人 <i class="fa fa-ellipsis-v" style="color: #cfcfcf;" ></i> 25元/时 <i class="fa fa-ellipsis-v" style="color: #cfcfcf;"></i> <span style="color: orangered;"><i class="fa fa-money"></i> 2元/时</span></p>
                <p class="block text-muted"><span class="text-warning"><i class="fa fa-circle-o"></i></span> 7月23日到8月1日，工作日，9点-12点</p>
                <p class="block text-muted"><span class="text-warning"><i class="fa fa-circle-o"></i></span> 7月23日到8月1日，工作日，9点-12点</p>
                <p class="block"><strong>微笑的萝卜</strong> <small class="text-muted"><i class="fa fa-clock-o"></i> 刚刚</small></p>
            </div>
        </div>
        <div class="list-group white-bg" style="margin-bottom: 3px;">
            <div class="list-group-item" onclick="window.location='<?=\yii\helpers\Url::toRoute('/new/job')?>'">
                <p><strong class="text-info">洗碗工</strong> 10人 <i class="fa fa-ellipsis-v" style="color: #cfcfcf;" ></i> 25元/时 <i class="fa fa-ellipsis-v" style="color: #cfcfcf;"></i> <span style="color: orangered;"><i class="fa fa-money"></i> 2元/时</span></p>
                <p class="block text-muted"><span class="text-warning"><i class="fa fa-circle-o"></i></span> 7月23日到8月1日，工作日，9点-12点</p>
                <p class="block"><strong>微笑的萝卜</strong> <small class="text-muted"><i class="fa fa-clock-o"></i> 刚刚</small></p>
            </div>
        </div>

    </div>
</div>

<div class="row">
    <div class="col-xs-12 text-center">
        没有更多了
    </div>
</div>
