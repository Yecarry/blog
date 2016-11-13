<?php
namespace frontend\models;

use Yii;
use yii\base\Model;
use common\models\UserModel;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $username;
    public $email;
    public $password;

    public $rePassWord; //重复密码
    public $verifyCode; //验证码


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['username', 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => '\common\models\UserModel', 'message' => Yii::t('common','This username has already been taken')],
            ['username', 'string', 'min' => 2, 'max' => 255],
            ['username','match','pattern' => '/^[(\x{4E00}-\x{9FA5})a-zA-Z]+[(\x{4E00}-\x{9FA5})a-zA-Z_\d]*$/u','message' => '用户名由字母，汉子，数字，下划线组成，切不能以数字和下划线开头。'],

            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\models\UserModel', 'message' => Yii::t('common','This email address has already been taken')],

            [['password','rePassWord'], 'required'],
            [['password','rePassWord'], 'string', 'min' => 6],

            ['verifyCode','captcha'],//验证码自带规则
            ['rePassWord','compare','compareAttribute'=> 'password','message' => Yii::t('common','Two times the password is not consitent')],
        ];
    }


    public function attributeLabels()
    {
        return[
            'username' => Yii::t('common','Username'),
            'email' => Yii::t('common','Email'),
            'password' => Yii::t('common','Password'),
            'rePassWord' =>Yii::t('common','rePassWord'),
            'verifyCode' =>Yii::t('common','verifyCode'),
        ];



    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup()
    {
        if (!$this->validate()) {
            return null;
        }
        
        $user = new UserModel();
        $user->username = $this->username;
        $user->email = $this->email;
        $user->setPassword($this->password);
        $user->generateAuthKey();
        
        return $user->save() ? $user : null;
    }
}
