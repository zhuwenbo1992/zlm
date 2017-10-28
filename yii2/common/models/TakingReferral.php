<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "taking_referral".
 *
 * @property int $taking_id
 * @property int $user_referral_id
 */
class TakingReferral extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'taking_referral';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['taking_id', 'user_referral_id'], 'required'],
            [['taking_id', 'user_referral_id'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'taking_id' => 'Taking ID',
            'user_referral_id' => 'User Rererral ID',
        ];
    }
}
