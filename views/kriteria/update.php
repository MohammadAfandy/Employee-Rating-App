<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Kriteria */

$this->title = 'Update Kriteria: ' . $model->id_kriteria;
$this->params['breadcrumbs'][] = ['label' => 'Kriterias', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_kriteria, 'url' => ['view', 'id' => $model->id_kriteria]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="kriteria-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
