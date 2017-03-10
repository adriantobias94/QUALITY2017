<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;
use common\models\AuthItem;
use common\models\User;

/* @var $this yii\web\View */
/* @var $model common\models\AuthAssignment */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="auth-assignment-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'item_name')->widget(Select2::classname(), [
            'data' => ArrayHelper::map(AuthItem::findBySql('SELECT * FROM auth_item WHERE type = 2' )->all(),'name','name'),
            'language' => 'en',
            'options' => ['placeholder' => 'Select a Privilege ...'],
            'pluginOptions' => [
                'allowClear' => true
                    ],
            ]); ?>

    <?= $form->field($model, 'user_id')->widget(Select2::classname(), [
            'data' => ArrayHelper::map(User::find()->all(),'id','fullName'),
            'language' => 'en',
            'options' => ['placeholder' => 'Select a User ...'],
            'pluginOptions' => [
                'allowClear' => true
                    ],
            ]); ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
