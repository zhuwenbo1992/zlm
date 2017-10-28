<?php
/**
 * Created by PhpStorm.
 * User: zk
 * Date: 2017/7/15
 * Time: 下午12:20
 */
?>
<div class="row wrapper border-bottom white-bg page-heading"
     style="position:fixed;height: 40px;left:0px;top:0px;right: 0px;z-index: 9;padding-top: 10px;padding-left: 20px;padding-right: 20px;">
    <div class="row" style="padding-top: 0px;padding-left: 20px;padding-right: 20px;">
        <div class="col-xs-3">
            <a href="javascript:history.go(-1)"><i class="fa fa-angle-left f16"></i></a>
        </div>
        <div class="col-xs-6 text-center"><span class="f16">上传服务协议</span></div>
        <div class="col-xs-3 text-right">
<!--            <p style="padding-top: 5px;margin-bottom: 0px;"><a class="f12">确认</a></p>
-->
        </div>
    </div>
</div>
<?php
use yii\widgets\ActiveForm;

$form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]);
?>
<div style="height: 5px;padding-top: 45px;"></div>

<div class="row white-bg">
    <div class="col-xs-12">
        <h2>上传用人单位服务协议</h2>
    </div>

</div>
<div class="row white-bg border-bottom padding5">
    <div class="col-xs-4">
        <p class="default-title">协议扫描件/照片</p>
    </div>
    <div class="col-xs-8">
        <input type="text" name="a" class="form-control default-input" placeholder="请上传">
        <?= $form->field($model, 'images')->fileInput() ?>
    </div>
</div>
<div class="row" style="padding-top: 10px;">
    <div class="col-xs-12 text-center" >
        <h3 style="line-height: 30px;">上传完成后，您将获得标签： <br><span class="badge badge-warning">服务认证</span><br> 及优先展示机会</h3>
    </div>

</div>
<div style="padding-top: 30px;" class="text-center">
    <input  class="btn btn-lg btn-primary block" style="width:100%" type="submit" value="提交">


    <?php ActiveForm::end(); ?>

    <p><a href="/manage/my-post" class="btn btn-lg btn-default primary-color block" style="border-color: #32B294;">下次再说</a></p>
</div>