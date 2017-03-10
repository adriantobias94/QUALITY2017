<?php

use yii\helpers\Html;
use yii\grid\GridView;
use dosamigos\datepicker\DatePicker;
use yii\widgets\Pjax;
use yii\bootstrap\Modal;
use yii\helpers\Url;
use common\models\ServicereportSearch;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $searchModel common\models\ServicereportSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Servicereports';
$this->params['breadcrumbs'][] = $this->title;
$model = new ServicereportSearch();
?>

<div class="servicereport-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'globalSearch') ?>

   

    <?php // echo $form->field($model, 'WeatherStation_id') ?>

    <?php // echo $form->field($model, 'user_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<div class="servicereport-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::button('Create Servicereport', ['value'=>Url::to('index.php?r=servicereport/create'),'class' => 'btn btn-success','id'=>'modalButton']) ?>
    </p>

    <?php
        Modal::begin([
                'header'=>'<h4>Service Report</h4>',
                'id' => 'modal',
                'size' =>'modal-lg',

                ]);

        echo "<div id='modalContent'></div>";

        Modal::end();

            
    ?>
    <?php Pjax::begin([]); ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'weatherStation.id',
            //'id',
            [
                'attribute'=> 'DateStarted',
                'value'=> 'DateStarted',
                'format'=> 'raw',
                'filter'=>DatePicker::widget([
                            'model'=>$searchModel,
                            'attribute'=> 'DateStarted',
                            'clientOptions' => [
                                'autoclose' => true,
                                'format' => 'yyyy-mm-dd',
                                ]
                        ]),
            ],
            [
                'attribute'=> 'DateEnd',
                'value'=> 'DateEnd',
                'format'=> 'raw',
                'filter'=>DatePicker::widget([
                            'model'=>$searchModel,
                            'attribute'=> 'DateEnd',
                            'clientOptions' => [
                                'autoclose' => true,
                                'format' => 'yyyy-mm-dd',
                                ]
                        ]),
            ],
            [
                'attribute'=>'WeatherStation_id',
                'value'=>'weatherStation.WeatherStation_Location',
            ],
            'Author',
            'Manager',
            // 'user_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
