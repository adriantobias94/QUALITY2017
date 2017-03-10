<?php

use yii\helpers\Html;
use yii\grid\GridView;
use barcode\barcode\BarcodeGenerator;
use yii\bootstrap\Modal;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use common\models\WeatherstationSearch;
/* @var $this yii\web\View */
/* @var $searchModel common\models\WeatherstationSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Weather Stations';
$this->params['breadcrumbs'][] = $this->title;
$model = new WeatherstationSearch();
?>
<div class="weatherstation-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>


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

<div class="weatherstation-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::button('Create Weather Station', ['value'=>Url::to('index.php?r=weatherstation/create'),'class' => 'btn btn-success','id'=>'modalButton']) ?>
    </p>

    <?php
        Modal::begin([
     
                'id' => 'modal',
                'size' =>'modal-lg',

                ]);

        echo "<div id='modalContent'></div>";

        Modal::end();

            
    ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'rowOptions' =>function($model){
                    if($model->WeatherStation_Status == 'On')
                    {
                        return ['class'=>'success'];
                    }else if ($model->WeatherStation_Status == 'Off')
                    {
                        return ['class'=>'danger'];
                    }

        },
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            'WeatherStation_Model',
            'WeatherStation_Name',
            'WeatherStation_Location',
            
            
            //'WeatherStation_Status',
             
            // 'WeatherStation_Gateway',
            // 'WeatherStation_Logger',
            // 'WeatherStation_Number',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
     <br />
    Legend:
    <p style="color:red"> &emsp; Red = Off status</p>
    <p style="color:green"> &emsp; Green = On status</p>
</div>
