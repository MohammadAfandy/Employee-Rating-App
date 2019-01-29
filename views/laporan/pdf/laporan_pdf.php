<?php

use yii\helpers\Html;
use yii\grid\GridView;


/* @var $this yii\web\View */
/* @var $searchModel app\models\PenilaianSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'LAPORAN PENILAIAN';
?>

<style>
.pdf-laporan {
    text-align: center;
}
.pdf-table {
    width: 100%;
    empty-cells: show;
    border: 1px solid;
    border-collapse: collapse;
    border-spacing: 0;
}
.pdf-table thead tr {
    background: #cbcbcb;
}
.pdf-table th, td {
    border: 1px solid;
    padding: 10px;
}
.col-number {
    text-align: center;
}
.fieldset{
    page-break-inside: avoid !important;;
    padding: .35em .625em .75em;
    margin: 0 2px;
    border: 2px solid;
}
.fieldset legend {
    font-size: 20px;
    color: #333;
}
</style>

<div class="pdf-laporan">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php
    echo $this->render('_cetak_penilaian', [
        'penilaian' => $penilaian,
        'kriteria' => $kriteria,
        'nilai' => $nilai,
    ]);
    ?>
    <br><br><br>
    <?php
    echo $this->render('_cetak_normalisasi', [
        'penilaian' => $penilaian,
        'kriteria' => $kriteria,
        'normalisasi' => $normalisasi,
    ]);
    ?>
    <br><br><br>
    <?php
    echo $this->render('_cetak_rank', [
        'penilaian' => $penilaian,
        'kriteria' => $kriteria,
        'rank' => $rank,
        'sort' => $sort,
    ]);
    ?>

</div>
