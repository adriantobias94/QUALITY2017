<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Servicereport */

$this->title = 'Update Servicereport: ' . $model->DateStarted . ' ' . $model->Author;
$this->params['breadcrumbs'][] = ['label' => 'Servicereports', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="servicereport-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
