<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\db\Expression;

// use app\models\Penilaian;
/**
 * This is the model class for table "tb_pegawai".
 *
 * @property int $id_pegawai
 * @property string $nip
 * @property string $nama_pegawai
 * @property string $tgl_lahir
 * @property string $jk
 * @property string $no_hp
 * @property string $email
 * @property string $created_date
 * @property string $updated_date
 */
class Pegawai extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tb_pegawai';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [
                ['nip', 'nama_pegawai', 'tgl_lahir', 'jk', 'no_hp', 'email'],
                'required',
                'message' => '{attribute} Tidak Boleh Kosong',
            ],
            [['tgl_lahir', 'created_date', 'updated_date', ], 'safe'],
            [['nip'], 'string', 'max' => 10],
            [['nama_pegawai', 'email'], 'string', 'max' => 100],
            [['jk'], 'string', 'max' => 20],
            [['no_hp'], 'string', 'max' => 15],
            [['nip'], 'unique'],
            ['email', 'email'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_pegawai' => 'Id Pegawai',
            'nip' => 'NIP',
            'nama_pegawai' => 'Nama Pegawai',
            'tgl_lahir' => 'Tanggal Lahir',
            'jk' => 'Jenis Kelamin',
            'no_hp' => 'No Hp',
            'email' => 'Email',
            'created_date' => 'Created',
            'updated_date' => 'Updated',
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
}
