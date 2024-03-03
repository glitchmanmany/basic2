<?php

namespace app\controllers;

use Yii;
use app\models\Books;
use app\models\BookSearch;
use app\models\Authors;
use app\models\Genres;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;



class BooksController extends Controller
{ 
    public function actionIndex()
    {
        $searchModel = new BookSearch();
        $dataProvider = $this->searchBooks(Yii::$app->request->queryParams);
        
        $books = Books::find()->all();
            // Получение списка авторов
        $authors = Authors::find()->select(['id', 'name'])->orderBy('name')->asArray()->all();
    
    // Получение списка жанров
        $genres = Genres::find()->select(['id', 'name'])->orderBy('name')->asArray()->all();
        return $this->render('index', [
            'books' => $books,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'genres' => $genres,
            'authors' => $authors,
        ]);
    
    

    }

    protected function searchBooks($params)
    {
        $searchModel = new BookSearch();
        return $searchModel->search($params);
    }

    public function actionCreate()
    {
        $model = new Books();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', 'Book has been updated successfully.');
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    protected function findModel($id)
    {
        if (($model = Books::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }




}