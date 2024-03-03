<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Books;
use yii\db\ActiveRecord;


class BookSearch extends Books
{
    public $genre;
    public $author;
    

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['genre', 'author'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with the search query applied.
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Books::find()->with(['genre', 'author']);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        // Фильтрация по жанру
        if ($this->genre !== null) {
            $query->andFilterWhere(['genre_id' => $this->genre]);
        }

        // Фильтрация по автору
        if ($this->author !== null) {
            $query->andFilterWhere(['author_id' => $this->author]);
        }

        return $dataProvider;
    }
}
