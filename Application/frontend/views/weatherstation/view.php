<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
    use barcode\barcode\BarcodeGenerator;

/* @var $this yii\web\View */
/* @var $model common\models\Weatherstation */

$this->title = $model->WeatherStation_Location;
$this->params['breadcrumbs'][] = ['label' => 'Weatherstations', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="weatherstation-view">

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
            'id',
            'WeatherStation_Model',
            'WeatherStation_Name',
            'WeatherStation_Location',
            'WeatherStation_Status',
            'WeatherStation_Gateway',
            'WeatherStation_Logger',
            'WeatherStation_Number',
        ],
    ]) ?>

<html><div id="ShowBarcode"></div></html>

<?= 

 BarcodeGenerator::widget([
    'elementId'=> 'ShowBarcode', /* div or canvas id*/
    'value'=> $model->WeatherStation_Location, /* value for EAN 13 be careful to set right values for each barcode type */
    'type'=>'code128',/*supported types  ean8, ean13, upc, std25, int25, code11, code39, code93, code128, codabar, msi, datamatrix*/

    ]);

?>

</div>
