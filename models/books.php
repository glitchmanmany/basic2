<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;
use yii\db\ActiveRecord;

class Books extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return 'books';
    }

    public function rules()
    {
        return [
            [['title', 'author_id', 'genre_id'], 'required'],
            [['title'], 'string', 'max' => 255],
            [['author_id', 'genre_id'], 'integer'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'author_id' => 'Author ID',
            'genre_id' => 'Genre ID',
        ];
    }

    public function getAuthor()
    {
        return $this->hasOne(Authors::class, ['id' => 'author_id']);
    }

    public function getGenre()
    {
        return $this->hasOne(Genres::class, ['id' => 'genre_id']);
    }
}