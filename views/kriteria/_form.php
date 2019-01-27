<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Kriteria */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="kriteria-form">

	<?php if ($model->isNewRecord): ?>
		<span style="color: red"><strong>*Menambah Data Akan Mereset Bobot Kriteria</strong></span>
	<?php endif; ?>

    <?php
    $form = ActiveForm::begin([
    	'action' => $model->isNewRecord ? ['create'] : ['update'],
    ]);
    ?>

    <?= $form->field($model, 'nama_kriteria')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?php
        echo Html::submitButton($model->isNewRecord ? 'Tambah' : 'Simpan', [
        	'class' => 'btn btn-success',
        	'id' => $model->isNewRecord ? 'btn_tambah' : 'btn_update',
        ]);
        ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
