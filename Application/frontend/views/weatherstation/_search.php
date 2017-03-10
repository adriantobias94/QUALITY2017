<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\WeatherstationSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="weatherstation-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= // $form->field($model, 'id') ?>

    <?= $form->field($model, 'globalSearch') ?>

   

    <?php // echo $form->field($model, 'WeatherStation_Gateway') ?>

    <?php // echo $form->field($model, 'WeatherStation_Logger') ?>

    <?php // echo $form->field($model, 'WeatherStation_Number') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

    

</div>
