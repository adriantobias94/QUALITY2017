<?php
namespace backend\models;

use common\models\AuthAssignment;
use yii\base\Model;
use common\models\User;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $firstName;
    public $lastName;
    public $MiddleName;
    public $Age;
    public $Birth;
    public $YearsInCompany;
    public $Department;
    public $Address;

    public $username;
    public $email;
    public $password;
    public $permissions;


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['username', 'filter', 'filter' => 'trim'],
            ['username', 'required'],
            ['firstName', 'required'],
            ['lastName', 'required'],
            ['MiddleName', 'required'],
            ['Age', 'required'],
            ['Birth', 'required'],
            ['Department', 'required'],
            ['Address', 'required'],
            ['YearsInCompany', 'required'],
            [['YearsInCompany', 'Age'], 'integer'],
           
            ['username', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This username has already been taken.'],
            ['username', 'string', 'min' => 2, 'max' => 255],

            ['email', 'filter', 'filter' => 'trim'],
            ['email', 'match', 'pattern' => '/@aboitiz\.com$/i', 'message' => 'Only emails from aboitiz.com domain are allowed.'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This email address has already been taken.'],

            ['password', 'required'],
            ['password', 'string', 'min' => 6],
        ];
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup()
    {
        if ($this->validate()) {
            
           
        $user = new User();
        $user->firstName = $this->firstName;
        $user->lastName = $this->lastName;
        $user->MiddleName = $this->MiddleName;
        $user->Age = $this->Age;
        $user->Birth = $this->Birth;
        $user->Address = $this->Address;
        $user->YearsInCompany = $this->YearsInCompany;
        $user->Department = $this->Department;
        $user->username = $this->username;
        $user->email = $this->email;
        $user->setPassword($this->password);
        $user->generateAuthKey();
        $user->save();
        
        $permissionList = $_POST['SignupForm']['permissions'];
        
            foreach ($permissionList as $value){
                $newPermission = new AuthAssignment;
                $newPermission->user_id = $user->id;
                $newPermission->item_name = $value;
                $newPermission->save();


            }
        
            return $user;
        }
         return null;
        
    }   
}
