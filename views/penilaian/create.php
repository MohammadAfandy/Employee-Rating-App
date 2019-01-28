<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Penilaian */

$this->title = 'Tambah Penilaian';
$this->params['breadcrumbs'][] = ['label' => 'Penilaian', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="penilaian-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'data_pegawai' => $data_pegawai,
        'kriteria' => $kriteria,
    ]) ?>

</div>
