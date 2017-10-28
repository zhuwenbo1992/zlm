<div class="row wrapper border-bottom white-bg page-heading"
     style="position:fixed;height: 40px;left:0px;top:0px;right: 0px;z-index: 9;padding-top: 10px;padding-left: 20px;padding-right: 20px;">
    <div class="row" style="padding-top: 0px;padding-left: 20px;padding-right: 20px;">
        <div class="col-xs-3">
            <a href="javascript:history.go(-1)"><i class="fa fa-angle-left f16"></i></a>
        </div>
        <div class="col-xs-6 text-center"><span class="f16">个人信息</span></div>
        <div class="col-xs-3 text-right">

        </div>
    </div>
</div>

<div style="height: 5px;padding-top: 45px;"></div>

<form id="infoform" action="/user/add-info" method="post">
    <input name="<?= Yii::$app->request->csrfParam; ?>" type="hidden" value="<?= Yii::$app->request->csrfToken ?>">



    <div style="height: 6px;"></div>


    <div class="row white-bg border-bottom padding5">
        <div class="col-xs-4">
            <p class="default-title">手机号</p>
        </div>
        <div class="col-xs-8">
            <input type="text" name="cer_phone" class="form-control default-input" placeholder="请输入" value="<?=isset($UserList)&&!empty($UserList)?$UserList->phone:''?>">
        </div>
    </div>
    <div class="row white-bg border-bottom padding5">
        <div class="col-xs-4">
            <p class="default-title">QQ号</p>
        </div>
        <div class="col-xs-8">
            <input type="text" name="QQ" class="form-control default-input" placeholder="请输入" value="<?=isset($UserList)&&!empty($UserList)?$UserList->QQ_card:''?>">
        </div>
    </div>
    <div class="row white-bg border-bottom padding5">
        <div class="col-xs-4">
            <p class="default-title">微信号</p>
        </div>
        <div class="col-xs-8">
            <input type="text" name="wechat" class="form-control default-input" placeholder="请输入" value="<?=isset($UserList)&&!empty($UserList)?$UserList->wechat_card:""?>">
        </div>
    </div>

</form>
<div class="row white-bg border-bottom padding5">
    <div class="col-xs-12">
        <a onclick="$('#infoform').submit();" class="btn btn-primary block">保存</a>
    </div>

</div>



