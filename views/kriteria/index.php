<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\KriteriaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Kriteria';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kriteria-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <p>
        <?= Html::a('Create Kriteria', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_kriteria',
            'nama_kriteria',
            'bobot',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
