<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\jui\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\Pegawai */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="panel-body">
    <div class="pegawai-form">
    
        <?php
        $form = ActiveForm::begin([
            'options' => [
                'enctype' => 'multipart/form-data',
            ],
            'layout' => 'horizontal',
        ]);
        ?>
    
        <?= $form->field($model, 'nip')->textInput(['type' => 'number'], ['maxlength' => true]) ?>
    
        <?= $form->field($model, 'nama_pegawai')->textInput(['maxlength' => true]) ?>
    
        <?php
        echo $form->field($model, 'tgl_lahir')->widget(DatePicker::className(), [
            'dateFormat' => 'yyyy-MM-dd',
            'options' => [
                'class' => 'form-control',
                'readOnly' => 'readOnly',
                'style' => 'background: #fff; width: 200px;',
            ],
            'clientOptions' => [
                'changeMonth' => true,
                'changeYear' => true,
                'yearRange' => '1920:now',
            ],
        ]);
        ?>
    
        <?= $form->field($model, 'jk')->dropDownList(['L' => 'Laki-Laki', 'P' => 'Perempuan'], ['prompt' => '--PILIH-']);?>
    
        <?= $form->field($model, 'no_hp')->textInput(['type' => 'number'], ['maxlength' => true]) ?>
    
        <div class="form-group">
            <?= Html::submitButton($model->isNewRecord ? 'Tambah' : 'Update', ['class' => 'btn btn-success']) ?>
        </div>
    
        <?php ActiveForm::end(); ?>
    
    </div>
</div>