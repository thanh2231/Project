<?php

namespace app\models;

use Yii;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "newuser".
 *
 * @property int $id
 * @property string $username
 * @property string $password
 * @property string $authKey
 * @property string $accessToken
 * @property string $role
 */
class Newuser extends \yii\db\ActiveRecord  implements IdentityInterface
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'newuser';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
             [['username', 'password'], 'string', 'max' => 50],
            [['authKey', 'accessToken','email'], 'string', 'max' => 255],
            [['role'], 'string', 'max' => 25],

        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
           'username' => 'Username',
            'password' => 'Password',
            'email'=>'Email',
        ];
    }
    public function getId()
    {
        return $this->id;
    }
    public function getRole()
    {
        return $this->role;
    }
    public static function findRole($username){
         $result= static::find()->where([
            'username' => $username
        ])
        ->limit(1)
        ->one();
         return $result->role;
    }
    
    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }
    
    public function getAuthKey()
    {
        return $this->authKey;
    }
    
    public static function findIdentity($id)
    {
        return static::findOne($id);
    }
    
    public static function findIdentityByAccessToken($token, $type = null)
    {
        return static::findOne([
            'accessToken' => $token
        ]);
    }
    
    public static function findByUsername($username)
    {
        return static::find()->where([
            'username' => $username
        ])
        ->limit(1)
        ->one();
        
    }   
        
    public function validatePassword($password)
    {
        return $this->password === $password;
     //   return Yii::$app->security->validatePassword($password, $this->password);
    }
}
