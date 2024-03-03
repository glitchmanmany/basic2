<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\db\ActiveRecord;
use yii\helpers\ArrayHelper;



class Authors extends ActiveRecord
{
    // Определение связей и других методов модели
    public static function getAuthorsList()
    {
        $authors = self::find()->all();
        return ArrayHelper::map($authors, 'id', 'name');
    }

    public function getBooks()
    {
        return $this->hasMany(Books::className(), ['author_id' => 'id']);
    }
    
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 255],
        ];
    }
    
    public function beforeDelete()
    {
        if (parent::beforeDelete()) {
            foreach ($this->books as $book) {
                $book->delete();
            }
            return true;
        } else {
            return false;
        }
    }

}
