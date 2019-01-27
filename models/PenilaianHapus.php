<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\db\Expression;

/**
 * This is the model class for table "tb_penilaian__hapus".
 *
 * @property int $id
 * @property int $id_penilaian
 * @property int $id_pegawai
 * @property string $penilaian json penilaian
 * @property string $created_date
 * @property string $updated_date
 * @property string $delete_date
 */
class PenilaianHapus extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tb_penilaian__hapus';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_penilaian', 'id_pegawai', 'penilaian'], 'required'],
            [['id_penilaian', 'id_pegawai'], 'integer'],
            [['penilaian'], 'string'],
            [['created_date', 'updated_date', 'delete_date'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_penilaian' => 'Id Penilaian',
            'id_pegawai' => 'Id Pegawai',
            'penilaian' => 'Penilaian',
            'created_date' => 'Created Date',
            'updated_date' => 'Updated Date',
            'delete_date' => 'Delete Date',
        ];
    }

    public function behaviors()
    {
        return [
            'timestamp' => [
                'class' => 'yii\behaviors\TimestampBehavior',
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['delete_date'],
                ],
                'value' => new Expression('NOW()'),
            ],
        ];
    }
}
