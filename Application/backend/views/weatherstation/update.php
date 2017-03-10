<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Weatherstation */

$this->title = 'Update Weatherstation: ' . $model->WeatherStation_Location;
$this->params['breadcrumbs'][] = ['label' => 'Weatherstations', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->WeatherStation_Location, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="weatherstation-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
