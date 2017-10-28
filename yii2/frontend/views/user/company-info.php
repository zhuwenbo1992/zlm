<div class="row wrapper border-bottom white-bg page-heading"
     style="position:fixed;height: 40px;left:0px;top:0px;right: 0px;z-index: 9;padding-top: 10px;padding-left: 20px;padding-right: 20px;">
    <div class="row" style="padding-top: 0px;padding-left: 20px;padding-right: 20px;">
        <div class="col-xs-3">
            <a href="javascript:history.go(-1)"><i class="fa fa-angle-left f16"></i></a>
        </div>
        <div class="col-xs-6 text-center"><span class="f16">企业信息</span></div>
        <div class="col-xs-3 text-right">

        </div>
    </div>
</div>

<div style="height: 5px;padding-top: 45px;"></div>

<form id="infoform" action="/user/add-info" method="post">
    <input name="<?= Yii::$app->request->csrfParam; ?>" type="hidden" value="<?= Yii::$app->request->csrfToken ?>">

    <div class="row white-bg border-bottom padding5">
        <div class="col-xs-4">
            <p class="default-title">公司名称</p>
        </div>
        <div class="col-xs-8 default-title text-right darkgrey-color">
            <input type="hidden" name="company_name" value="<?=$companyinfo->company_name?>"><?=$companyinfo->company_name?>
        </div>
    </div>
    <div class="row white-bg border-bottom padding5">
        <div class="col-xs-4">
            <p class="default-title">公司邮箱</p>
        </div>
        <div class="col-xs-8 default-title text-right darkgrey-color">
            <input type="hidden" name="company_email" value="<?=$companyinfo->company_email?>"><?=$companyinfo->company_email?>
        </div>
    </div>

    <div class="row white-bg border-bottom padding5">
        <div class="col-xs-4">
            <p class="default-title">联系人姓名</p>
        </div>
        <div class="col-xs-8 default-title text-right darkgrey-color">
            <input type="hidden" name="company_email" value="<?=$companyinfo->cer_people?>"><?=$companyinfo->cer_people?>
        </div>
    </div>

    <div class="row white-bg border-bottom padding5">
        <div class="col-xs-4">
            <p class="default-title">联系人电话</p>
        </div>
        <div class="col-xs-8 default-title text-right darkgrey-color">
            <input type="hidden" name="company_email" value="<?=$companyinfo->cer_phone?>"><?=$companyinfo->cer_phone?>
        </div>
    </div>




</form>




