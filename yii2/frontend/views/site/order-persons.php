<?php
/**
 * Created by PhpStorm.
 * User: zk
 * Date: 2017/7/15
 * Time: 下午8:38
 */
?>


<div class="row wrapper border-bottom white-bg page-heading"
     style="position:fixed;height: 40px;left:0px;top:0px;right: 0px;z-index: 9;padding-top: 10px;padding-left: 20px;padding-right: 20px;">
    <div class="row" style="padding-top: 0px;padding-left: 20px;padding-right: 20px;">
        <div class="col-xs-3">
            <a href="javascript:history.go(-1)"><i class="fa fa-angle-left f16"></i></a>
        </div>
        <div class="col-xs-6 text-center"><span class="f16">选择接单人</span></div>
        <div class="col-xs-3 text-right">
                        <p style="padding-top: 2px;margin-bottom: 0px;"><a href="/site/persons-add" class="f14 primary-color">+ 添加</a></p>

        </div>
    </div>
</div>
<div style="height: 5px;padding-top: 45px;"></div>
<div class="row">
    <div class="col-xs-12" style="padding-left: 5px;padding-right: 5px;">
        <div class="input-group" style="">
            <input type="text" class="form-control f12" placeholder="搜索姓名/手机号/职位">
            <span class="input-group-btn">
                <button type="button" class="btn btn-default"><i class="fa fa-search"></i></button>
            </span>
        </div>
    </div>
</div>
<div style="height: 6px;"></div>
<div class="row white-bg padding5 border-bottom">
<!--
选中样式
<div class="row white-bg padding5 border-bottom" style="border-left: 3px solid #32B294">
-->
    <div class="col-xs-12 f14">
        <p style="padding-top: 10px;">我自己</p>
    </div>
</div>
<div class="row white-bg padding5 border-bottom" style="border-left: 3px solid #32B294">

    <a href="/site/persons-detail" class="col-xs-11 f14 black-color">
        <p style="padding-top: 10px;"><span class="pull-right"><i class="fa fa-mobile"></i> 13524000000</span>张三 | 男 | 24岁 </p>
        <p class="darkgrey-color f12">上海 | 浦东新区 | 张江</p>
        <p class="darkgrey-color">
            <span class="label">普工</span>
            <span class="label">电工</span>
            <span class="label">泥瓦工</span></p>
    </a>
</div>
<div style="height: 6px;"></div>

<div class="row">
    <div class="col-xs-12">
        <a class="block btn btn-primary">已选1人，确认接单</a>
    </div>
</div>

</div>
