<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ListView;
use yii\widgets\ActiveForm;

$this->title = 'Home';
?>
<div class="site-index">
    <div class="jumbotron">
        <h1>Welcome to My Library!</h1>
        <p class="lead">You can browse through our collection of authors, genres, and books.</p>
        <p><?= Html::a('Browse Authors', Url::to(['authors/index']), ['class' => 'btn btn-lg btn-success']) ?></p>
        <p><?= Html::a('Browse Genres', Url::to(['genres/index']), ['class' => 'btn btn-lg btn-info']) ?></p>
        <p><?= Html::a('Browse Books', Url::to(['books/index']), ['class' => 'btn btn-lg btn-primary']) ?></p>
    </div>


