<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Servicereport */

$this->title = $model->DateStarted. ' '. $model->Author;
$this->params['breadcrumbs'][] = ['label' => 'Servicereports', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="servicereport-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id',
            'DateStarted',
            'DateEnd',
            'Author',
            'Manager',
            'weatherStation.WeatherStation_Location',
            'user.email',
        ],
    ]) ?>

</div>
