<?php

use yii\helpers\Html;
use app\models\BookSearch;
use app\models\Books;
use yii\widgets\ActiveForm;
use yii\widgets\ListView;


/* @var $this yii\web\View */
/* @var $books app\models\Books[] */

$this->title = 'Books';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="books-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Book', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Author</th>
                <th>Genre</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($books as $book): ?>
                <tr>
                    
                    <td><?= Html::encode($book->id) ?></td>
                    <td><?= Html::encode($book->title) ?></td>
                    <td><?= Html::encode($book->author->name) ?></td>
                    <td><?= Html::encode($book->genre->name) ?></td>
                    <td>
                        
                        <?= Html::a('Update', ['update', 'id' => $book->id], ['class' => 'btn btn-primary']) ?>
                        <?= Html::a('Delete', ['delete', 'id' => $book->id], [
                            'class' => 'btn btn-danger',
                            'data' => [
                                'confirm' => 'Are you sure you want to delete this item?',
                                'method' => 'post',
                            ],
                        ]) ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<div class="body-content">
        <!-- Форма для фильтрации книг по жанрам и авторам -->
        <?php $form = ActiveForm::begin(['action' => ['books/index'], 'method' => 'get']); ?>
        <?= $form->field($searchModel, 'genre')->dropDownList($genres, ['prompt' => 'All Genres']) ?>
        <?= $form->field($searchModel, 'author')->dropDownList($authors, ['prompt' => 'All Authors']) ?>
        <div class="form-group">
            <?= Html::submitButton('Apply Filters', ['class' => 'btn btn-primary']) ?>
        </div>
        <?php ActiveForm::end(); ?>
    </div>

    <div class="body-content">
        <!-- Отображение списка книг -->
        <?= ListView::widget([
            'dataProvider' => $dataProvider,
            'itemView' => '_book_item',
            'summary' => false,
        ]) ?>
    </div>
</div>
