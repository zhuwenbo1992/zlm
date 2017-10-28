<?php

namespace common\models;

use Yii;


/**
 * This is the model class for table "region".
 *
 * @property integer $regionid
 * @property string $regionname
 * @property integer $parentid
 */
class Region extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'region';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['parentid'], 'integer'],
            [['regionname'], 'string', 'max' => 30],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'regionid' => 'Regionid',
            'regionname' => 'Regionname',
            'parentid' => 'Parentid',
        ];
    }

    /**
     * 获取以父id==0的一级分类ID
     *
     *
     */
    public function GetCityList()
    {
        /**缓存*/
        $cache=\Yii::$app->cache;
        //$cache->delete('CityList');//清除缓存

        $CityList=$cache->get('CityList');
        if($CityList)
        {
            return $CityList;

        }else{

            $CityList=Region::find()->where(['parentid'=>0])->asArray()->all();

            $cache->set('CityList',$CityList,60*60*24);
            return $CityList;


        }








    }






    /**
     * 获得其子类的孩子
     */
    public function GetSon($act)
    {
/*        $SonList = array();
        $CityId = Region::find()->where(['regionid' => $act])->one();
        $city_id = $CityId->regionid;
        $citylist = Region::find()->asArray()->all();*/
        $citylist = Region::find()
            ->where(['parentid'=>$act])
            ->asArray()->all();
        //var_dump($citylist);die;
        foreach ($citylist as $k => $v) {

                $SonList['name'][] = $v['regionname'];
                $SonList['id'][] = $v['regionid'];

        }
        if (empty($SonList)) {
            $SonList='';
        }

        return $SonList;


    }

    public  function GetGroundSon($id)
    {

        $citylist = Region::find()
            ->where(['parentid'=>$id])
            ->asArray()->all();
        return $citylist;


    }









    public function getNextRe($regionid)
    {
        return self::find()->where(['parentid' => $regionid])->asArray()->all();

    }
    /**
     * 根据id返回name
     */
    public static function getName($id) {
        /**缓存*/
        $cache=\Yii::$app->cache;
        $name=$cache->get('regionName'.$id);
        if ($name) {
            /**缓存存在*/
            return $name;
        } else {
            /**缓存不存在*/
            $temp=self::find()
                ->select('regionname')
                ->where(['regionid'=>$id])
                ->one();
            $cache->set('regionName'.$id,$temp['regionname'],60*60*24);
            return $temp['regionname'];
        }
    }
}
