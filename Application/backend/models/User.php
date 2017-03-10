<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property integer $id
 * @property string $firstName
 * @property string $lastName
 * @property string $MiddleName
 * @property integer $Age
 * @property string $Birth
 * @property string $Address
 * @property integer $YearsInCompany
 * @property string $Department
 * @property string $username
 * @property string $auth_key
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $email
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property Servicereport[] $servicereports
 */
class User extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['firstName', 'lastName', 'MiddleName', 'Birth', 'Address', 'YearsInCompany', 'Department', 'username', 'auth_key', 'password_hash', 'email', 'created_at', 'updated_at'], 'required'],
            [['Age', 'YearsInCompany', 'status', 'created_at', 'updated_at'], 'integer'],
            [['Birth'], 'safe'],
            [['firstName', 'lastName', 'MiddleName', 'Department'], 'string', 'max' => 100],
            [['Address'], 'string', 'max' => 300],
            [['username', 'password_hash', 'password_reset_token', 'email'], 'string', 'max' => 255],
            [['auth_key'], 'string', 'max' => 32],
            [['username'], 'unique'],
            [['email'], 'unique'],
            [['password_reset_token'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'firstName' => 'First Name',
            'lastName' => 'Last Name',
            'MiddleName' => 'Middle Name',
            'Age' => 'Age',
            'Birth' => 'Birth',
            'Address' => 'Address',
            'YearsInCompany' => 'Years In Company',
            'Department' => 'Department',
            'username' => 'Username',
            'auth_key' => 'Auth Key',
            'password_hash' => 'Password Hash',
            'password_reset_token' => 'Password Reset Token',
            'email' => 'Email',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getServicereports()
    {
        return $this->hasMany(Servicereport::className(), ['user_ID' => 'id']);
    }
}
