<?php

use yii\helpers\Html;

?>

<tr>
    <td><?= Html::encode($model->id) ?></td>
    <td><?= Html::encode($model->title) ?></td>
    <td><?= Html::encode($model->author->name) ?></td>
    <td><?= Html::encode($model->genre->name) ?></td>
    <td>
        <?= Html::a('View', ['view', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </td>
</tr>
