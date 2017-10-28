<?php
use yii\helpers\Html;
use yii\helpers\Url;

?>

<div class="row wrapper border-bottom white-bg page-heading"
     style="position:fixed;height: 40px;left:0px;top:0px;right: 0px;z-index: 9;padding-top: 10px;padding-left: 20px;padding-right: 20px;">
    <div class="row" style="padding-top: 0px;padding-left: 20px;padding-right: 20px;">
        <div class="col-xs-3">
            <a href="javascript:history.go(-1)"><i class="fa fa-angle-left f16 darkgrey-color"></i></a>
        </div>
        <div class="col-xs-6 text-center"><span class="f16">操作失败</span></div>
        <div class="col-xs-3 text-right">

        </div>
    </div>
</div>

<div style="height: 5px;padding-top: 60px;"></div>

<div style="height: 5px;padding-top: 60px;"></div>

<p class="text-center"><i class="fa fa-times-circle text-danger" style="font-size: 100px;"></i></p>
<p class="text-center black-color f18"><?=$msg?></p>
<p class="text-center f14"><small>页面将在 <?=$sec?> 秒后返回</small></p>


<script>

    <?php if(!isset($gotoUrl)):?>
    setInterval("history.go(-1);",<?php echo $sec;?>000);
    <?php else:?>
    setInterval("window.location.href='<?php echo  $gotoUrl;?>'",<?php echo $sec;?>000);
    <?php endif;?>

</script>