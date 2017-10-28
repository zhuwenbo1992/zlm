<?php
namespace frontend\models; 
use Yii;

/**
 * This is the model class for table "{{%user_certification}}".
 *
 * @property string $cer_id 认证ID
 * @property int $user_id 用户ID
 * @property string $cer_type 认证类型
 * @property string $company_name 公司名称
 * @property string $company_email 公司邮箱
 * @property string $company_img 公司的营业执照
 * @property string $cer_phone 认证电话
 * @property string $cer_people 认证联系人
 * @property string $people_img_head 个人认证正面照
 * @property string $people_img_back 个人认证反面照片
 * @property string $cer_idcard 认证人身份证号
 * @property int $cer_company 认证状态 0表示未认证  1 表示在认证中 2 表示认证成功 3表示认证失败
 * @property int $cer_person  认证状态 0表示未认证  1 表示认证通过
 * @property int $real_name  真实姓名
 */
class UserCer extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%user_certification}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'cer_company','cer_person'], 'integer'],
            ['cer_people', 'required','message'=>'企业联系人不能为空','on'=>['company']],
            ['real_name', 'required','message'=>'真实姓名不能为空','on'=>['personal']],
            ['cer_idcard', 'required','message'=>'身份证号不能为空','on'=>['personal']],
            ['cer_idcard', 'unique','on'=>['personal']],
            ['cer_phone', 'unique','message'=>'联系人电话已存在','on'=>['company']],
            ['cer_phone', 'required','message'=>'联系人电话不能为空','on'=>['company']],
            ['company_email', 'required','message'=>'联系人邮箱不能为空','on'=>['company']],
            ['company_name', 'required','message'=>'公司名字不能为空','on'=>['company']],
            [[ 'company_name', 'cer_people'], 'string', 'max' => 30],
            [['company_email'], 'string', 'max' => 35],
            [['company_img', 'people_img_head', 'people_img_back'], 'string', 'max' => 150],
            [['cer_phone'], 'string', 'max' => 11],
            [['cer_idcard'], 'string', 'max' => 18],
            [['company_service_img'],'string','max'=>150]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'cer_id' => 'Cer ID',
            'user_id' => '用户 ID',
            'cer_type' => '认证类型',
            'company_name' => '公司名称',
            'company_email' => '公司邮箱',
            'company_img' => '公司的营业执照',
            'cer_phone' => '公司联系人电话',
            'cer_people' => '联系人',
            'real_name' => '真实姓名',
            'people_img_head' => '身份证正面照',
            'people_img_back' => '身份证反面照',
            'cer_idcard' => '身份证号',
            'cer_status' => '认证状态',
            'company_service_img'=>'公司上传协议',
            'cer_company'=>'公司认证',
            'cer_person'=>'公司认证',
        ];
    }



/*给用用场景*/
    public function scenarios()
    {

        $scenarios=parent::scenarios();
        $scenarios['personal']=['cer_people','cer_idcard'];
        $scenarios['company']=['cer_people','cer_phone','company_email','company_name'];
        
        return $scenarios;

    }



}
