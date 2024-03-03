<?php
use yii\helpers\Html;
/* @var $model app\models\Books */
?>
<div class="book-item">
    <h2><?= Html::encode($model->title) ?></h2>
    <p>Author: <?= Html::encode($model->author->name) ?></p>
    <p>Genre: <?= Html::encode($model->genre->name) ?></p>
</div>
