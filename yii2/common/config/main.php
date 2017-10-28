<?php
return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'con' => [
            'class' => 'common\components\con'
        ],
        'wechat' => [
            'class' => 'common\components\wechat'
        ],
        'user' => [
            'class' => 'common\components\user'
        ],
    ],
];
