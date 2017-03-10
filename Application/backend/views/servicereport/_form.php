<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;
use yii\helpers\ArrayHelper;
use common\models\WeatherStation;
use common\models\User;
use kartik\select2\Select2;
/* @var $this yii\web\View */
/* @var $model common\models\Servicereport */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="servicereport-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
    
 
         <?= $form->field($model, 'WeatherStation_id')->widget(Select2::classname(), [
            'data' => ArrayHelper::map(WeatherStation::find()->all(),'id','WeatherStation_Location'),
            'language' => 'en',
            'options' => ['placeholder' => 'Select a Location ...'],
            'pluginOptions' => [
                'allowClear' => true
                    ],
            ]); ?>
         

    <?= $form->field($model, 'DateStarted')->widget(
                            DatePicker::className(), [
                                // inline too, not bad
                                 'inline' => false , 
                                 
                                'clientOptions' => [
                                    'autoclose' => true,
                                    'format' => 'yyyy-mm-dd',
                                    ]
                        ]);

                 ?>

    <?= $form->field($model, 'DateEnd')->widget(
                            DatePicker::className(), [
                                // inline too, not bad
                                 'inline' => false, 
                                 // modify template for custom rendering
                                //'template' => '<div class="well well-sm" style="background-color: #fff; width:250px">{input}</div>',
                                'clientOptions' => [
                                    'autoclose' => true,
                                    'format' => 'yyyy-mm-dd',
                                    ]
                        ]);

                 ?>

    <?= $form->field($model, 'Author')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Manager')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Document' )->fileInput() ?>

    <?= $form->field($model, 'user_id')->widget(Select2::classname(), [
            'data' => ArrayHelper::map(user::find()->all(),'id','email'),
            'language' => 'en',
            'options' => ['placeholder' => 'Select an Email ...'],
            'pluginOptions' => [
                'allowClear' => true
                    ],
            ]); ?>

    

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
