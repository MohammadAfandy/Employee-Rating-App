<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PenilaianSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="penilaian-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_penilaian') ?>

    <?= $form->field($model, 'id_pegawai') ?>

    <?= $form->field($model, 'penilaian') ?>

    <?= $form->field($model, 'created_date') ?>

    <?= $form->field($model, 'updated_date') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
