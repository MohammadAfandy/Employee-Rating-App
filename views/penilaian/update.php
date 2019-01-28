<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Penilaian */

$this->title = 'Update Penilaian: ' . $data_pegawai[$model->id_pegawai];
$this->params['breadcrumbs'][] = ['label' => 'Penilaian', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="penilaian-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'data_pegawai' => $data_pegawai,
        'data_penilaian' => $data_penilaian,
        'kriteria' => $kriteria,
    ]) ?>

</div>
