<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "servicereport".
 *
 * @property integer $id
 * @property string $DateStarted
 * @property string $DateEnd
 * @property string $Author
 * @property string $Manager
 * @property integer $WeatherStation_id
 * @property integer $user_id
 *
 * @property Weatherstation $weatherStation
 * @property User $user
 */
class Servicereport extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */

    public $file;
    public static function tableName()
    {
        return 'servicereport';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['DateStarted', 'DateEnd', 'Author', 'Manager', 'WeatherStation_id'], 'required'],
            [['DateStarted', 'DateEnd','user_id'], 'safe'],
            [['user_id'], 'integer'],
            [['file'],'file'],
            [['Author','Document', 'Manager'], 'string', 'max' => 200],
            [['WeatherStation_id'], 'exist', 'skipOnError' => true, 'targetClass' => Weatherstation::className(), 'targetAttribute' => ['WeatherStation_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'DateStarted' => 'Date Started',
            'DateEnd' => 'Date End',
            'Author' => 'Author',
            'Manager' => 'Manager',
            'WeatherStation_id' => 'Weather Station Location',
            'user_id' => 'Employee Email',
            'file' => 'Document',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWeatherStation()
    {
        return $this->hasOne(Weatherstation::className(), ['id' => 'WeatherStation_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
