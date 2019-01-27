<?php

use yii\helpers\Html;
use yii\grid\GridView;


/* @var $this yii\web\View */
/* @var $searchModel app\models\PenilaianSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Laporan';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="laporan-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php
    echo $this->render('_penilaian', [
        'penilaian' => $penilaian,
        'kriteria' => $kriteria,
        'nilai' => $nilai,
    ]);
    ?>

    <?php
    echo $this->render('_normalisasi', [
        'penilaian' => $penilaian,
        'kriteria' => $kriteria,
        'normalisasi' => $normalisasi,
    ]);
    ?>

    <?php
    echo $this->render('_rank', [
        'penilaian' => $penilaian,
        'kriteria' => $kriteria,
        'rank' => $rank,
        'sort' => $sort,
    ]);
    ?>

</div>
