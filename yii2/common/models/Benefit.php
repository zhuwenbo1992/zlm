<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "benefit".
 *
 * @property int $b_id
 * @property string $b_name 平台默认的福利待遇
 */
class Benefit extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'benefit';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['b_name'], 'required'],
            [['b_name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'b_id' => 'B ID',
            'b_name' => 'B Name',
        ];
    }
}
