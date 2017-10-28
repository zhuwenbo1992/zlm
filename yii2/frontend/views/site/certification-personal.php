<?php
/**
 * Created by PhpStorm.
 * User: zk
 * Date: 12/7/17
 * Time: PM3:57
 */
?>
<div class="row wrapper border-bottom white-bg page-heading"
     style="position:fixed;height: 40px;left:0px;top:0px;right: 0px;z-index: 9;padding-top: 10px;padding-left: 20px;padding-right: 20px;">
    <div class="row" style="padding-top: 0px;padding-left: 20px;padding-right: 20px;">
        <div class="col-xs-3">
            <a href="javascript:history.go(-1)"><i class="fa fa-angle-left f16"></i></a>
        </div>
        <div class="col-xs-6 text-center"><span class="f16">实名认证</span></div>
        <div class="col-xs-3 text-right">


        </div>
    </div>
</div>
<?php
use yii\widgets\ActiveForm;

$form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]);
?>
<!-- <input name="_csrf-frontend" type="hidden" id="_csrf-frontend" value="<?= \Yii::$app->request->csrfToken ?>"> -->
<div style="padding-top: 50px;"></div>
<div class="row white-bg border-bottom padding5">
    <div class="col-xs-4">
        <p class="default-title">姓名</p>
    </div>
    <div class="col-xs-8">
        <input type="text" name="real_name" class="form-control default-input" placeholder="请输入">
    </div>
</div>
<div class="row white-bg border-bottom padding5">
    <div class="col-xs-4">
        <p class="default-title">身份证号</p>
    </div>
    <div class="col-xs-8">
        <input type="text" name="cer_idcard" class="form-control default-input" placeholder="请输入">
    </div>
</div>
<div class="row white-bg border-bottom padding5">
    <div class="col-xs-4">
        <p class="default-title">身份证正面照</p>
    </div>
    <div class="col-xs-8">
       <?= $form->field($model, 'imagefile')->fileInput() ?>
    </div>
</div>
<div class="row white-bg border-bottom padding5">
    <div class="col-xs-4">
        <p class="default-title">身份证反面照</p>
    </div>
    <div class="col-xs-8">
        <?= $form->field($model, 'imagefileback')->fileInput() ?>
</div>
    </div>



<div style="padding: 10px;padding-top: 0px;">
    <a onclick="$('#w0').submit();" class="btn btn-lg btn-primary block"
       style="padding-top: 7px;padding-bottom: 7px;font-size: 16px;">提交认证</a>

    <?php ActiveForm::end(); ?>
    <br>


   <!--  <a class="btn btn-lg btn-primary block"
       style="padding-top: 7px;padding-bottom: 7px;font-size: 16px;">提交认证</a> -->
</div>


          
          </div>