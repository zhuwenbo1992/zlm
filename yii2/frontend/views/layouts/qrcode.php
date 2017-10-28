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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

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
    </div>
</div>
<?php $this->endBody() ?>

</body>
</html>
<?php $this->endPage() ?>



