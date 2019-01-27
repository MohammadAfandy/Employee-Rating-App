<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Penilaian */

$this->title = 'Update Penilaian: ' . $model->id_penilaian;
$this->params['breadcrumbs'][] = ['label' => 'Penilaians', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_penilaian, 'url' => ['view', 'id' => $model->id_penilaian]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="penilaian-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'data_pegawai' => $data_pegawai,
        'kriteria' => $kriteria,
    ]) ?>

</div>
