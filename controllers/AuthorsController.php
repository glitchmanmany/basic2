<?php

namespace app\controllers;


use Yii;
use yii\web\Controller;
use app\models\Authors;
use yii\web\NotFoundHttpException;


class AuthorsController extends Controller
{
    public function actionIndex()
    {
        $authors = authors::find()->all();
        return $this->render('index', ['authors' => $authors]);
    }
    

    public function actionCreate()
{
    $model = new Authors();

    if ($model->load(Yii::$app->request->post()) && $model->save()) {
        return $this->redirect(['index']);
    } else {
        return $this->render('create', [
            'model' => $model,
        ]);
    }
}
        public function actionDelete($id)
    {
        $model = $this->findModel($id);
        $model->delete();

        return $this->redirect(['index']);
    }

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
    
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', 'Author has been updated successfully.');
            return $this->redirect(['view', 'id' => $model->id]); // Перенаправляем на страницу просмотра автора
        }
    
        return $this->render('update', [
            'model' => $model,
        ]);
    }
    

    protected function findModel($id)
    {
        if (($model = Authors::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 255],
        ];
    }
}

