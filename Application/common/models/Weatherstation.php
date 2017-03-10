<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "weatherstation".
 *
 * @property integer $id
 * @property string $WeatherStation_Model
 * @property string $WeatherStation_Name
 * @property string $WeatherStation_Location
 * @property string $WeatherStation_Status
 * @property string $WeatherStation_Gateway
 * @property string $WeatherStation_Logger
 * @property string $WeatherStation_Number
 *
 * @property Servicereport[] $servicereports
 */
class Weatherstation extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'weatherstation';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['WeatherStation_Model', 'WeatherStation_Name', 'WeatherStation_Location', 'WeatherStation_Status', 'WeatherStation_Gateway', 'WeatherStation_Logger', 'WeatherStation_Number'], 'required'],
            [['WeatherStation_Status'], 'string'],
            [['WeatherStation_Model', 'WeatherStation_Name','barcode_no'], 'string', 'max' => 200],
            [['WeatherStation_Location'], 'string', 'max' => 300],
            [['WeatherStation_Gateway', 'WeatherStation_Logger'], 'string', 'max' => 45],
            [['WeatherStation_Number'], 'string', 'max' => 11],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'Weather Station ID',
            'WeatherStation_Model' => 'Weather Station  Model',
            'WeatherStation_Name' => 'Weather Station  Name',
            'WeatherStation_Location' => 'Weather Station  Location',
            'WeatherStation_Status' => 'Weather Station  Status',
            'WeatherStation_Gateway' => 'Weather Station  Gateway',
            'WeatherStation_Logger' => 'Weather Station  Logger',
            'WeatherStation_Number' => 'Weather Station  Number',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getServicereports()
    {
        return $this->hasMany(Servicereport::className(), ['WeatherStation_id' => 'id']);
    }
}
