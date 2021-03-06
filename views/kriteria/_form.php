<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\bootstrap\Modal;

/* @var $this yii\web\View */
/* @var $model app\models\Kriteria */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="panel-body">
    <div class="kriteria-form">
        <div style="margin-bottom: 20px;">
            <span style="color: red">
                <strong>*Menambah Kriteria Akan Menghapus Data Penilaian dan Mereset Bobot Kriteria</strong>
            </span>
        </div>

        <?php
        $form = ActiveForm::begin([
            'action' => ['create']
        ]);
        ?>
    
        <?= $form->field($model, 'nama_kriteria')->textInput(['maxlength' => true]) ?>
    
        <div class="form-group">
            <?php
            Modal::begin([
                'header' => '<h4>Apakah Anda Yakin Ingin Menambah Data</h4>',
                'id' => 'modal_confirm_tambah',
                'toggleButton' => [
                    'label' => 'Tambah',
                    'class' => 'btn btn-success',
                ],
            ]);

            $warning = '<div style="margin-bottom: 20px;">
                            <span style="color: red">
                                <strong>*Menambah Kriteria Akan Menghapus Data Penilaian dan Mereset Bobot Kriteria</strong>
                            </span>
                        </div>';

            $cancel = Html::button('Cancel', ['class' => 'btn btn-danger', 'id' => 'btn_cancel_tambah']);
            $ok = Html::submitButton('OK', ['class' => 'btn btn-success', 'id' => 'btn_ok_tambah']);

            echo $warning.$cancel.' '.$ok;

            Modal::end();
            ?>
        </div>
    
        <?php ActiveForm::end(); ?>
    
    </div>
</div>