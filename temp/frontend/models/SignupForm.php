<?php
namespace frontend\models;

use common\models\User;
use frontend\models\Profile;
use yii\base\Model;
use Yii;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $username;
    public $email;
    public $password;

    public $prefix;
    public $firstName;
    public $lastName;
    public $status;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['username', 'filter', 'filter' => 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This username has already been taken.'],
            ['username', 'string', 'min' => 2, 'max' => 255],

            ['email', 'filter', 'filter' => 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This email address has already been taken.'],

            ['password', 'required'],
            ['password', 'string', 'min' => 6],

            ['prefix', 'required'],
            ['prefix', 'string', 'max' => 45],

            ['firstName', 'required'],
            ['firstName', 'string', 'max' => 45],

            ['lastName', 'required'],
            ['lastName', 'string', 'max' => 45],

            ['status', 'required'],
            ['status', 'string', 'max' => 45],
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
            $profile = new Profile();

            $user->username = $this->username;
            $user->email = $this->email;
            $user->setPassword($this->password);
            $user->generateAuthKey();

            if ($user->save()) {

                $profile->user_id = User::find()->where(['username' => $user->username])->one()->id;
                $profile->prefix = $this->prefix;
                $profile->firstname = $this->firstName;
                $profile->lastname = $this->lastName;
                $profile->status = $this->status;

                $profile->avatar = "5_" . rand(1, 16) . ".gif";

                if($profile->save()){
                    return $user;
                }
            }
        }

        return null;
    }

    public function attributeLabels()
    {
        return [
            'prefix' => 'คำนำหน้า',
            'firstName' => 'ชื่อ (ไทย)',
            'lastName' => 'นามสกุล (ไทย)',
            'status' => 'ลงทะเบียนเป็น',
        ];
    }
}
