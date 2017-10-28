<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use frontend\assets\AppAsset;

AppAsset::register($this);
$this->title='找了么';
$c=Yii::$app->controller->id;
?>
<?php $this->beginPage() ?>

<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">

    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>

</head>

<body class="top-navigation gray-bg" >


<?php $this->beginBody() ?>

<div id="wrapper" >
    <div id="page-wrapper" class="gray-bg">

        <!--        <div class="wrapper wrapper-content">-->
        <!--        <div class="container">-->
        <?=$content?>
        <!--        </div>-->
        <!--        </div>-->
        <div style="padding-bottom: 70px;"></div>
        <div class="row border-top" style="position:fixed;left:0px;bottom:0px;right: 0px;z-index: 9;">
            <div class="col-lg-12">
                <div class="border-bottom white-bg" style="padding-bottom: 3px;">
                    <div class="row">
                        <div class="col-xs-4 text-center" onclick="window.location='/site'">
                            <i class="fa fa-home <?=$c=='site'?'primary-color':'darkgary-color'?>" style="font-size: 25px;padding-top: 5px;"></i>
                            <div class="<?=$c=='site'?'primary-color':'darkgary-color'?>" style="padding-top: 0px;font-size: 10px;">首页</div>
                        </div>

                        <div class="col-xs-4 text-center" onclick="window.location='/manage'">
                            <i class="fa fa-file-text-o <?=$c=='manage'?'primary-color':'darkgary-color'?>" style="font-size: 25px;padding-top: 5px;"></i>


                            <div class="<?=$c=='manage'?'primary-color':'darkgary-color'?>" style="padding-top: 0px;font-size: 10px;">订单</div>
                        </div>
                        <div class="col-xs-4 text-center" onclick="window.location='/user'">
                            <i class="fa fa-user-circle <?=$c=='user'?'primary-color':'darkgary-color'?>" style="font-size: 25px;padding-top: 5px;"></i>


                            <div class="<?=$c=='user'?'primary-color':'darkgary-color'?>" style="padding-top: 0px;font-size: 10px">我的</div>
                        </div>


                    </div>

                </div>

            </div>
        </div>
    </div>
</div>
<?php $this->endBody() ?>

</body>
</html>
<?php $this->endPage() ?>



