<?php
namespace yii\easyii\helpers;

use Yii;
use yii\helpers\Inflector;
use yii\helpers\StringHelper;

class Data
{
    public static function cache($key, $duration, $callable)
    {
        $cache = Yii::$app->cache;
        if($cache->exists($key)){
            $data = $cache->get($key);
        }
        else{
            $data = $callable();

            if($data) {
                $cache->set($key, $data, $duration);
            }
        }
        return $data;
    }

    public static function generateSlug($string)
    {
        return StringHelper::truncate(Inflector::slug($string), 128, '');
    }
}