<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "order_post_ben".
 *
 * @property int $ben_id 福利待遇ID
 * @property string $ben_name 福利待遇名称
 * @property int $order_post_id 发单ID
 */
class OrderPostBen extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'order_post_ben';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ben_id'], 'required'],
            [['ben_id', 'order_post_id'], 'integer'],
            [['ben_name'], 'string', 'max' => 255],
            [['ben_id'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ben_id' => 'Ben ID',
            'ben_name' => 'Ben Name',
            'order_post_id' => 'Order Post ID',
        ];
    }
}
