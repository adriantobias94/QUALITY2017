<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Weatherstation */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="weatherstation-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'WeatherStation_Model')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'WeatherStation_Name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'WeatherStation_Location')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'WeatherStation_Status')->dropDownList([ 'On' => 'On', 'Off' => 'Off', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'WeatherStation_Gateway')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'WeatherStation_Logger')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'WeatherStation_Number')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
