<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Kriteria */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="kriteria-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nama_kriteria')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'bobot')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
