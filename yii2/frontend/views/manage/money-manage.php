<div class="row wrapper border-bottom white-bg page-heading"
     style="position:fixed;height: 40px;left:0px;top:0px;right: 0px;z-index: 9;padding-top: 10px;padding-left: 20px;padding-right: 20px;">
    <div class="row" style="padding-top: 0px;padding-left: 20px;padding-right: 20px;">
        <div class="col-xs-3">
            <a href="javascript:history.go(-1)"><i class="fa fa-angle-left f16"></i></a>
        </div>
        <div class="col-xs-6 text-center"><span class="f16">添加薪资托管</span></div>
        <div class="col-xs-3 text-right">

        </div>
    </div>
</div>

<div style="height: 5px;padding-top: 45px;"></div>

<form id="infoform" action="/manage/money-manage" method="post">
    <input name="<?= Yii::$app->request->csrfParam; ?>" type="hidden" value="<?= Yii::$app->request->csrfToken ?>">
    <input type="hidden" name="order_id" value="<?=isset($order_id)?$order_id:''?>">


    <div style="height: 6px;"></div>


    <div class="row white-bg border-bottom padding5">
        <div class="col-xs-4">
            <p class="default-title">联系方式</p>
        </div>
        <div class="col-xs-8">
            <input type="text" name="cer_phone" class="form-control default-input" placeholder="请输入" value="<?=isset($cerList)&&!empty($cerList)?$cerList->cer_phone:''?>">
        </div>
    </div>
    <div class="row white-bg border-bottom padding5">
        <div class="col-xs-4">
            <p class="default-title">联系人</p>
        </div>
        <div class="col-xs-8">
            <input type="text" name="cer_people" class="form-control default-input" placeholder="请输入" value="<?=isset($cerList)&&!empty($cerList)?$cerList->cer_people:''?>">
        </div>
    </div>


</form>
<div class="row white-bg border-bottom padding5">
    <div class="col-xs-12">
        <a onclick="$('#infoform').submit();" class="btn btn-primary block">提交</a>
    </div>

</div>



