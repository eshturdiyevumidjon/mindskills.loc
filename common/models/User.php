<?php
namespace common\models;

use Yii;
use yii\base\NotSupportedException;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;
use backend\base\AppActiveQuery;
use backend\models\Companies;
use yii\behaviors\BlameableBehavior;
use backend\models\Filials;
use yii\web\ForbiddenHttpException;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $fio
 * @property string $username
 * @property string $auth_key
 * @property string $password_hash
 * @property int $type
 * @property int $status
 * @property int $created_at
 * @property int $updated_at
 * @property int $filial_id Филиал
 * @property int $company_id Компания
 *
 * @property Companies $company
 * @property Filials $filial
 */

class User extends ActiveRecord implements IdentityInterface
{
    const STATUS_DELETED = 0;
    const STATUS_ACTIVE = 10;
    public $new_password=null;
    public $photoOfUser;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%user}}';
    }

    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
            [
                    'class' => BlameableBehavior::class,
                    'createdByAttribute' => 'company_id',
                    'updatedByAttribute' => null,
                    'value' => function($event) {
                        return Yii::$app->user->identity->company_id;
                    },
            ],
        ];
    }

     /**
     * @inheritdoc
     */
    public static function find()
    {
        if(Yii::$app->user->isGuest == false)
        {
            if(Yii::$app->user->identity->company->type === 2)
            {
                $companyId = Yii::$app->user->identity->company_id;
            }
            else $companyId = null;
        } 
        else $companyId = null;

        return new AppActiveQuery(get_called_class(), [
           'companyId' => $companyId,
        ]);
    }

    /**
     * @inheritdoc
     */
    public static function findOne($condition)
    {
        $model = parent::findOne($condition);
        if(Yii::$app->user->isGuest == false) 
        {
            if(Yii::$app->user->identity->company->type === 2)
            {
                $companyId = Yii::$app->user->identity->company_id;
                if($model->company_id != $companyId){
                    throw new ForbiddenHttpException('Доступ запрещен');
                }
            }
        }
        return $model;
    }

    public function beforeSave($insert)
    {
        if ($this->isNewRecord) {
            $this->password_hash = Yii::$app->security->generatePasswordHash($this->auth_key);
            $this->status = 10;
            $this->updated_at = time();
            $this->created_at = time();      
        }
        if(!$this->isNewRecord) { $this->updated_at=time();
             if($this->new_password != null) {
                $this->auth_key = $this->new_password;
                $this->password_hash = Yii::$app->security->generatePasswordHash($this->auth_key);
            }

        }
        if($this->birthday != null)
            $this->birthday = \Yii::$app->formatter->asDate($this->birthday, 'php:Y-m-d');
        
       
        return parent::beforeSave($insert);
    }
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
       /* return [
            ['status', 'default', 'value' => self::STATUS_ACTIVE],
            ['status', 'in', 'range' => [self::STATUS_ACTIVE, self::STATUS_DELETED]],
        ];*/
        return [
            [['username', 'auth_key','type','fio','filial_id'], 'required'],
            [['type', 'status','created_at', 'updated_at','filial_id', 'company_id'], 'integer'],
            [['balanc'], 'number'],
            [['birthday'],'safe'],
            [['fio', 'username', 'auth_key','new_password', 'password_hash','phone','image'], 'string', 'max' => 255],
            [['username'], 'unique'],
            [['company_id'], 'exist', 'skipOnError' => true, 'targetClass' => Companies::className(), 'targetAttribute' => ['company_id' => 'id']],
            [['filial_id'], 'exist', 'skipOnError' => true, 'targetClass' => Filials::className(), 'targetAttribute' => ['filial_id' => 'id']],
            [['photoOfUser'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg, jpeg',],
            [['username'], 'unique'],
        ];
    }
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'fio' => 'ФИО',
            'username' => 'Логин',
            'auth_key' => 'Пароль',
            'password_hash' => 'Password Hash',
            'type' => 'Тип',
            'new_password'=>'Новый пароль',
            'birthday'=>'День рождения',
            'phone'=>'Телефон',
            'image'=>'Фото',
            'photoOfUser'=>'Фото',
            'status' => 'Статус',
            'created_at' => 'Дата создания',
            'updated_at' => 'Изменить время',
            'filial_id' => 'Филиал',
            'company_id' => 'Компания',
            'balanc'=>'Баланс',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCompany()
    {
        return $this->hasOne(Companies::className(), ['id' => 'company_id']);
    }
    public function getAvailableFilials()
    {
        return Arrayhelper::map(Filials::find()->where(['company_id'=>Yii::$app->user->identity->company->id])->all(),'id','filial_name');
    }
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFilial()
    {
        return $this->hasOne(Filials::className(), ['id' => 'filial_id']);
    }
    public static function getDate($date=null)
    {
        return ($date!=null)?\Yii::$app->formatter->asDate($date, 'php:d.m.Y'):null;
    }
    //Получить описание типов пользователя.
    public function getTypeDescription()
    {
        switch ($this->type) {
            case 1: return "Администратор";
            case 2: return "Предподователь";
            case 3: return "Ученик";
            default: return "Super Admin";
        }
    }
    public function getType()
    {
        return [
            1 => 'Администратор',
            2 => 'Предподователь',
            3 => 'Ученик',
        ];
    }

    //Получить описание типов пользователя.
    public function getStatusDescription()
    {
        switch ($this->type) {
            case 0: return "Активен";
            case 10: return "Не активен";
            default: return "Неизвестно";
        }
    }
     public function getStatus()
    {
        return [
            0 => 'Активен',
            10 => 'Не активен',
        ];
    }
    
    /**
     * {@inheritdoc}
     */
    public static function findIdentity($id)
    {
        return static::findOne(['id' => $id, 'status' => self::STATUS_ACTIVE]);
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');
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
     * Finds out if password reset token is valid
     *
     * @param string $token password reset token
     * @return bool
     */
    public static function isPasswordResetTokenValid($token)
    {
        if (empty($token)) {
            return false;
        }

        $timestamp = (int) substr($token, strrpos($token, '_') + 1);
        $expire = Yii::$app->params['user.passwordResetTokenExpire'];
        return $timestamp + $expire >= time();
    }

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->getPrimaryKey();
    }

    /**
     * {@inheritdoc}
     */
    public function getAuthKey()
    {
        return $this->auth_key;
    }

    /**
     * {@inheritdoc}
     */
    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
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
     * Generates password hash from password and sets it to the model
     *
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password_hash = Yii::$app->security->generatePasswordHash($password);
    }
    public function getFilialsList()
    {
        $filial = Filials::find()->all();
        return ArrayHelper::map($filial, 'id', 'filial_name');
    }    

    /**
     * Generates "remember me" authentication key
     */
    public function generateAuthKey()
    {
        $this->auth_key = Yii::$app->security->generateRandomString();
    }

    public function ColumnsUser($post)
    {
        $session = Yii::$app->session;
        $session['User[image]'] = 0;
        $session['User[fio]'] = 0;
        $session['User[username]'] = 0;
        $session['User[birthday]'] = 0;
        $session['User[phone]'] = 0;
        $session['User[type]'] = 0;
        $session['User[company_id]'] = 0;
        $session['User[filial_id]'] = 0;
        $session['User[status]'] = 0;
        $session['User[balanc]'] = 0;
        
        if( isset($post['User']['image']) ) $session['User[image]'] = 1;
        if( isset($post['User']['fio']) ) $session['User[fio]'] = 1;
        if( isset($post['User']['username']) ) $session['User[username]'] = 1;
        if( isset($post['User']['birthday']) ) $session['User[birthday]'] = 1;
        if( isset($post['User']['phone']) ) $session['User[phone]'] = 1;
        if( isset($post['User']['type']) ) $session['User[type]'] = 1;
        if( isset($post['User']['company_id']) ) $session['User[company_id]'] = 1;
        if( isset($post['User']['filial_id']) ) $session['User[filial_id]'] = 1;
        if( isset($post['User']['status']) ) $session['User[status]'] = 1;
        if( isset($post['User']['balanc']) ) $session['User[balanc]'] = 1;
    }
}
