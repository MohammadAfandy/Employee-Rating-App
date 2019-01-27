<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\db\Expression;

use app\models\Pegawai;

/**
 * This is the model class for table "tb_penilaian".
 *
 * @property int $id_penilaian
 * @property int $id_pegawai
 * @property string $penilaian json penilaian
 * @property string $created_date
 * @property string $updated_date
 */
class Penilaian extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tb_penilaian';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_pegawai', 'penilaian'], 'required'],
            [['id_pegawai'], 'integer'],
            [['penilaian'], 'string'],
            [['created_date', 'updated_date'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_penilaian' => 'Id Penilaian',
            'id_pegawai' => 'Nama Pegawai',
            'penilaian' => 'Penilaian',
            'created_date' => 'Created Date',
            'updated_date' => 'Updated Date',
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

    public function getPegawai()
    {
        return $this->hasOne(Pegawai::className(),['id_pegawai'=>'id_pegawai']);
    }
}
