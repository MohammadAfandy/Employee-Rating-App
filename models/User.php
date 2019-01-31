<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;
use yii\base\NotSupportedException;
use yii\helpers\Security;
use yii\db\Expression;
use mdm\admin\components\UserStatus;
use app\models\Pegawai;

/**
 * This is the model class for table "tb_user".
 *
 * @property int $id
 * @property string $nip
 * @property string $username
 * @property string $password_hash
 */
class User extends \mdm\admin\models\User implements IdentityInterface
{
    const SCENARIO_CREATE = 'create';
    const SCENARIO_UPDATE = 'update';
    const SCENARIO_CHANGE_PASSWORD = 'change_password';

    public $password_old;
    public $password_confirm;
    public $password_new;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tb_user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'nip', 'password_hash', 'password_confirm', 'email'], 'required', 'on' => self::SCENARIO_CREATE,],
            [['username', 'nip', 'email', 'status'], 'required', 'on' => self::SCENARIO_UPDATE,],
            [['password_old', 'password_confirm', 'password_new',], 'required', 'on' => self::SCENARIO_CHANGE_PASSWORD,],
            [['password_confirm'], 'compare', 'compareAttribute' => 'password_hash', 'on' => self::SCENARIO_CREATE,],
            [['password_confirm'], 'compare', 'compareAttribute' => 'password_new', 'on' => self::SCENARIO_CHANGE_PASSWORD,],
            [['password_old'], 'checkOldPassword'],
            [['email'], 'email'],
            [['status'], 'in', 'range' => [UserStatus::ACTIVE, UserStatus::INACTIVE]],
            [['nip'], 'string', 'max' => 10],
            [['nip'], 'exist', 'targetClass' => Pegawai::class, 'targetAttribute' => ['nip' => 'nip'], 'on' => [self::SCENARIO_CREATE, self::SCENARIO_UPDATE], 'message' => 'NIP Not Found in Pegawai'],
            [['nip', 'username', 'email'], 'unique', 'on' => self::SCENARIO_CREATE],
            [['username'], 'string', 'max' => 100],
            [['password_hash', 'password_confirm', 'password_new', 'password_old'], 'string', 'max' => 255, 'min' => 6],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nip' => 'Nip',
            'username' => 'Username',
            'password_hash' => 'Password',
            'password_old' => 'Old Password',
            'password_new' => 'New Password',
            'password_confirm' => 'Confirm Password',
            'status' => 'Status',
        ];
    }

    public function behaviors()
    {
        return [
            'timestamp' => [
                'class' => 'yii\behaviors\TimestampBehavior',
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_date', 'updated_date'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_date'],
                ],
                'value' => new Expression('NOW()'),
            ],
        ];
    }

    public function checkOldPassword() {
        $user = Yii::$app->user->identity;
        if (!$user || !$user->validatePassword($this->password_old)) {
            $this->addError('password_old', 'Incorrect Old Password.');
        }
    }

    public function changePassword()
    {
        if ($this->validate()) {
            /* @var $user User */
            $user = Yii::$app->user->identity;
            $user->setPassword($this->password_new);
            $user->generateAuthKey();
            if ($user->save()) {
                return true;
            }
        }

        return false;
    }

    public function getPegawai()
    {
        return $this->hasOne(\app\models\Pegawai::className(), ['nip'=>'nip']);
    }
}
