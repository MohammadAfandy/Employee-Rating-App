<?php

use yii\helpers\Html;
use yii\grid\GridView;


/* @var $this yii\web\View */
/* @var $searchModel app\models\PenilaianSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Laporan';
$this->params['breadcrumbs'][] = $this->title;
?>
<style>
.fieldset{
    padding: .35em .625em .75em;
    margin: 0 2px;
    border: 1px solid #c0c0c0;
}
.fieldset legend{
    padding: 2px 1em;
    width: auto !important;
    min-height: 1.4em;
    margin-bottom: 20px;
    font-size: 18px;
    line-height: inherit;
    color: #333;
    border: 1px solid #c0c0c0;
    background-color: rgba(167, 26, 26, 0);
    border-radius: 1em;
}
.fieldset button,
.fieldset input,
.fieldset textarea{
    margin-bottom: 20px !important;
}
</style>
<div class="penilaian-index">

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
