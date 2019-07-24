<?php
namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

class User extends ActiveRecord implements IdentityInterface
{
    const STATUS_DELETED = 0;
    const STATUS_ACTIVE = 10;

    public $jwtToken = '';

    public static function tableName()
    {
        return 'hs_user';
    }

    public static function login($username, $password) {
        $user = self::findByUsername($username);

        if (!empty($user)) {
            if ($user->validatePassword($password)) {
                $user->generateJwtToken();
                return $user;
            }
        }
        
        throw new \yii\base\UserException("Wrong username/password");
    }

    public function generateJwtToken() {
        $signer = new \Lcobucci\JWT\Signer\Hmac\Sha256();
        $jwt = Yii::$app->jwt;

        /**
         * by Muhd Danish Ezwan bin Mohd Nordin, to future programmer. Best regards!
         * 
         * guide to jwt: (more info at https://auth0.com/docs/tokens/jwt-claims#reserved-claims)
         * iss - issuer claim; who issued the JWT token, usually used sites as the value
         * aud - audience claim; who the jwt token is generated for, better use id of the person/organization (if you generate this for API usage)
         * 
         */
        
        $signer = new \Lcobucci\JWT\Signer\Hmac\Sha256();
        $jwt = Yii::$app->jwt;
        $this->jwtToken = (string)$jwt->getBuilder()
            ->setIssuer('http://apps.harwood.my') // Configures the issuer (iss claim)
            ->setAudience($this->id) // Configures the audience (aud claim)
            ->set('uid', $this->id)
            ->setIssuedAt(time())
            // ->setExpiration(time() + 3600)
            ->sign($signer, $jwt->key)
            ->getToken();
    }

    public function getEmp() {
        return $this->hasOne(HsHrEmployee::className(), ['emp_id' => 'emp_id']);
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentity($id)
    {
        return isset(self::$users[$id]) ? new static(self::$users[$id]) : null;
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        return static::findOne(['username' => $username, 'status' => self::STATUS_ACTIVE]);
    }

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->emp_id;
    }

    /**
     * {@inheritdoc}
     */
    public function getAuthKey()
    {
        return $this->authKey;
    }

    /**
     * {@inheritdoc}
     */
    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->password_hash);
    }

    /**
     * {@inheritdoc}
     * @param \Lcobucci\JWT\Token $token
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        return self::findOne(['emp_id' => $token->getClaim('uid')]);
    }
}
