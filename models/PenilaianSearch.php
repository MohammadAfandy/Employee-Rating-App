<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Penilaian;

/**
 * PenilaianSearch represents the model behind the search form of `app\models\Penilaian`.
 */
class PenilaianSearch extends Penilaian
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_penilaian', 'id_pegawai'], 'integer'],
            [['penilaian', 'created_date', 'updated_date'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Penilaian::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id_penilaian' => $this->id_penilaian,
            'id_pegawai' => $this->id_pegawai,
            'created_date' => $this->created_date,
            'updated_date' => $this->updated_date,
        ]);

        $query->andFilterWhere(['like', 'penilaian', $this->penilaian]);

        return $dataProvider;
    }
}
