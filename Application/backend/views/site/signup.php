<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use dosamigos\datepicker\DatePicker;
use yii\helpers\ArrayHelper;

$this->title = 'Signup';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-signup">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Please fill out the following fields to signup:</p>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>
            
                <?= $form->field($model, 'firstName') ?>

                <?= $form->field($model, 'lastName') ?>

                <?= $form->field($model, 'MiddleName') ?>

                <?= $form->field($model, 'Age') ?>

                <?= $form->field($model, 'Birth')->widget(
                            DatePicker::className(), [
                                // inline too, not bad
                                 'inline' => false, 
                                 // modify template for custom rendering
                                'clientOptions' => [
                                    'autoclose' => true,
                                    'format' => 'yyyy-mm-dd',
                                    ]
                        ]);

                 ?>

                <?= $form->field($model, 'Address') ?>

                <?= $form->field($model, 'YearsInCompany') ?>

                <?= $form->field($model, 'Department') ?>

                <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

                <?= $form->field($model, 'email') ?>

                <?= $form->field($model, 'password')->passwordInput() ?>
                <?php
                      $authItems = ArrayHelper::map($authItems,'name','name');

                ?>
                <?= $form->field($model, 'permissions')->checkboxList($authItems); ?>

                <div class="form-group">
                    <?= Html::submitButton('Signup', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
