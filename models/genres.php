<?php

namespace app\models;


use Yii;
use yii\db\ActiveRecord;
use yii\helpers\ArrayHelper;

class Genres extends ActiveRecord
{
    public static function tableName()
    {
        return 'genres';
    }

    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 255],
        ];
    }
    public static function getGenresList()
    {
        $genres = self::find()->all();
        return ArrayHelper::map($genres, 'id', 'name');
    }
}