<?php
/**
 * Created by PhpStorm.
 * User: zk
 * Date: 28/7/17
 * Time: PM2:50
 */

namespace common\models;


use yii\base\Model;

class MyHelp extends Model
{
    public static function time_ago($time){
        $now=time();
        if ($time>$now){
            return "来自未来";
        }
        $dif=$now-$time;
        if ($dif<60) {
            return $dif."秒前";
        } elseif ($dif<3600) {
            return floor($dif/60)."分钟前";
        } elseif ($dif<86400) {
            return floor($dif/3600)."小时前";
        } elseif ($dif<2678400) {
            return floor($dif/86400)."天前";
        } else {
            return date("y年n月",$time);
        }
    }
}