<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tb_kriteria".
 *
 * @property int $id_kriteria
 * @property string $nama_kriteria
 * @property double $bobot
 */
class Kriteria extends \yii\db\ActiveRecord
{
    const COST = 0;
    const BENEFIT = 1;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tb_kriteria';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nama_kriteria', 'type'], 'required'],
            [['nama_kriteria'], 'unique'],
            [['bobot'], 'number'],
            [['nama_kriteria'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_kriteria' => 'Id Kriteria',
            'nama_kriteria' => 'Nama Kriteria',
            'type' => 'Type',
            'bobot' => 'Bobot',
        ];
    }

}
