<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "user_referrals_skill".
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $name
 */
class UserReferralsSkill extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user_referrals_skill';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'name'], 'required'],
            [['user_id'], 'integer'],
            [['name'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'name' => 'Name',
        ];
    }
}
