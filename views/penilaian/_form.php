<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Penilaian */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="penilaian-form">

    <?php $form = ActiveForm::begin([
        'options' => [
            'enctype' => 'multipart/form-data',
        ],
        'layout' => 'horizontal',
    ]); ?>

    <?= $form->field($model, 'id_pegawai')->dropDownList($data_pegawai, ['prompt' => '--PILIH-']) ?>

    <?php foreach ($kriteria as $key => $kri): ?>
        <div class="form-group">
            <label class="control-label col-sm-3"><?= $kri->nama_kriteria; ?></label>
            <div class="col-sm-6">
                <?= Html::textInput('Penilaian[penilaian][' . $kri->id_kriteria . ']', '', [
                    'type' => 'number',
                    'class' => 'form-control',
                    'max' => 100,
                    'style' => [
                        'width' => '100px',
                    ],
                ]); ?>
            </div>
        </div>

    <?php endforeach; ?>

    <div class="form-group">
        <div class="col-sm-3">
            <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
