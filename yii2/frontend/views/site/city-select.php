<?php
/**
 * Created by PhpStorm.
 * User: zk
 * Date: 11/7/17
 * Time: PM1:08
 */
?>
<div class="row wrapper border-bottom white-bg page-heading"
     style="position:fixed;height: 40px;left:0px;top:0px;right: 0px;z-index: 9;padding-top: 10px;padding-left: 20px;padding-right: 20px;">
    <div class="row" style="padding-top: 0px;padding-left: 20px;padding-right: 20px;">
        <div class="col-xs-3">
            <a href="javascript:history.go(-1)"><i class="fa fa-angle-left f16"></i></a>
        </div>
        <div class="col-xs-6 text-center"><span class="f16">选择城市</span></div>
        <div class="col-xs-3 text-right">


        </div>
    </div>
</div>
<div style="height: 5px;padding-top: 50px;"></div>
<div class="row white-bg border-bottom padding5">
    <div class="col-xs-12">
        <p class="default-title f16"></p>
    </div>
</div>



<div style="height: 5px;padding-top: 50px;"></div>
<div class="row white-bg border-bottom padding5">
    <div class="col-xs-12">
        <p class="default-title f16">S</p>
    </div>
</div>


<?php foreach ($CityList as $value):?>
<div class="row white-bg border-bottom padding5">
    <div class="col-xs-12">
        <p class="default-title f16"><a href="/site/order-address?city=<?=$value->regionname?>"><?=$value->regionname?></a></p>
    </div>
</div>

<?php endforeach;?>