<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "admin".
 *
 * @property int $adminid 管理员ID
 * @property string $username
 * @property string $password
 * @property int $status
 * @property int $addtime
 * @property string $desc 备注
 */
class Admin extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'admin';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['status', 'addtime'], 'integer'],
            [['username', 'desc'], 'string', 'max' => 30],
            [['password'], 'string', 'max' => 32],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'adminid' => 'Adminid',
            'username' => 'Username',
            'password' => 'Password',
            'status' => 'Status',
            'addtime' => 'Addtime',
            'desc' => 'Desc',
        ];
    }
}
