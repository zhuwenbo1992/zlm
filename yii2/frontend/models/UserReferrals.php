<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "user_referrals".
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $name
 * @property integer $sex
 * @property integer $age
 * @property string $idno
 * @property string $mobile_phone
 * @property string $province
 * @property string $city
 * @property string $district
 * @property string $area
 * @property string $education
 * @property integer $working_year
 * @property integer $job_id1
 * @property integer $job_id2
 * @property integer $job_id3
 * @property integer $skill1
 * @property integer $skill2
 * @property integer $skill3
 * @property integer $tag1
 * @property integer $tag2
 * @property integer $tag3
 */
class UserReferrals extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user_referrals';
    }

    /**
     * @inheritdoc
     */

    public $act;
    public function rules()
    {
        return [
            [['user_id', 'name', 'sex', 'age', 'idno', 'mobile_phone', 'province', 'city'], 'required'],
            [['user_id', 'sex', 'age', 'working_year','district', 'job_id1', 'job_id2', 'job_id3', 'skill1', 'skill2', 'skill3', 'tag1', 'tag2', 'tag3'], 'integer'],
//            [['idno'],'unique'],
//            [['name', 'mobile_phone', 'area'], 'string', 'max' => 50],
//            [['idno'], 'string', 'max' => 18],
//            [['province', 'education'], 'string', 'max' => 20],
//            [['city'], 'string', 'max' => 30],
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
            'sex' => 'Sex',
            'age' => 'Age',
            'idno' => 'Idno',
            'mobile_phone' => 'Mobile Phone',
            'province' => 'Province',
            'city' => 'City',
            'district' => 'District',
            'area' => 'Area',
            'education' => 'Education',
            'working_year' => 'Working Year',
            'job_id1' => 'Job Id1',
            'job_id2' => 'Job Id2',
            'job_id3' => 'Job Id3',
            'skill1' => 'Skill1',
            'skill2' => 'Skill2',
            'skill3' => 'Skill3',
            'tag1' => 'Tag1',
            'tag2' => 'Tag2',
            'tag3' => 'Tag3',
        ];
    }
}
