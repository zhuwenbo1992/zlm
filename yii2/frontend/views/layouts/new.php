<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use frontend\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>

<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>

</head>

<body class="top-navigation gray-bg">


<?php $this->beginBody() ?>

<div id="wrapper">
    <div id="page-wrapper" class="gray-bg">

        <!--        <div class="wrapper wrapper-content">-->
        <!--        <div class="container">-->
        <?=$content?>
        <!--        </div>-->
        <!--        </div>-->
        <div style="padding-bottom: 70px;"></div>
        <div class="row border-top" style="position:fixed;height: 60px;left:0px;bottom:0px;right: 0px;z-index: 9;">
            <div class="col-lg-12">
                <div class="border-bottom white-bg" style="padding: 5px;">
                    <div class="row">
                        <div class="col-xs-3 text-center" onclick="window.location='/new/index'">
                                <i class="fa fa-home" style="font-size: 25px;color: #C3C3C3;padding-top: 5px;"></i>
                            <div style="padding-top: 0px;">首页</div>
                        </div>
                        <div class="col-xs-3 text-center" onclick="window.location='/new/order-post'">
                            <i class="fa fa-leaf" style="font-size: 25px;color: #C3C3C3;padding-top: 5px;"></i>


                            <div style="padding-top: 0px;">发单</div>
                        </div>
                        <div class="col-xs-3 text-center" onclick="window.location='/new/order-taking'">
                            <i class="fa fa-tint" style="font-size: 25px;color: #1AB394;padding-top: 5px;"></i>


                            <div style="padding-top: 0px;">接单</div>
                        </div>
                        <div class="col-xs-3 text-center" onclick="window.location='/new/user'">
                            <i class="fa fa-user" style="font-size: 25px;color: #C3C3C3;padding-top: 5px;"></i>


                            <div style="padding-top: 0px;">我的</div>
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


