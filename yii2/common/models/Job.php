<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "job".
 *
 * @property integer $job_id
 * @property string $job_name
 * @property string $job_author
 * @property integer $job_addtime
 * @property integer $job_sort
 * @property integer $p_id
 */
class Job extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'job';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['job_name'], 'required'],
            [['job_addtime', 'job_sort'], 'integer'],
            [['job_name'], 'string', 'max' => 35],
            [['job_author'], 'string', 'max' => 30],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'job_id' => 'Job ID',
            'job_name' => 'Job Name',
            'job_author' => 'Job Author',
            'job_addtime' => 'Job Addtime',
            'job_sort' => 'Job Sort',
            'job_type' => 'Job Type',
            'is_hot'=>'Is Hot'
        ];
    }

/*job职位选择

@joblist 最热门的职位ishot 为1则是热搜职位
@joblistone 技工职位

*/


    public function GetHotList()
    {
       return  $JobList=Job::find()->select('job_name')->where(['is_hot'=>1])->all();

    }


    /**
     * @param $type
     * @return array|\yii\db\ActiveRecord[]
     * 得到不同类型得数据
     */
   public function GetOne($type)
   {

      return  $JobList=Job::find()->select('job_name')->where(['job_type'=>$type])->all();
   }

   public static function getName($id)
   {
       /**缓存*/
       $cache=\Yii::$app->cache;
       $name=$cache->get('jobname'.$id);
       if ($name) {
           return $name;
       } else {
           $temp=self::find()
               ->select('job_name')
               ->where(['job_id'=>$id])
               ->one();
           $cache->set('jobname'.$id,$temp['job_name'],60*60*24);
           return $temp['job_name'];
       }
   }


}
