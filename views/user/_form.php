<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use app\models\User;

use yii\jui\AutoComplete;

/* @var $this yii\web\View */
/* @var $model app\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="panel-body">
    <div class="user-form">

        <?php 
        $form = ActiveForm::begin([
            'options' => [
                'enctype' => 'multipart/form-data',
            ],
            'layout' => 'horizontal',
        ]);
        ?>

        <?php if ($model->scenario === User::SCENARIO_CREATE): ?>

            <?= $form->field($model, 'nip')->widget(AutoComplete::classname(), [
                'clientOptions' => [
                    'source' => $data_nip_available,
                ],
                'options' => [
                    'class' => 'form-control',
                ],
            ]) ?>

            <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'password_hash')->passwordInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'password_confirm')->passwordInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'email')->input('email') ?>

        <?php elseif ($model->scenario === User::SCENARIO_CHANGE_PASSWORD): ?>

            <?= $form->field($model, 'nip')->textInput(['disabled' => true]) ?>

            <?= $form->field($model, 'username')->textInput(['disabled' => true]) ?>

            <?= $form->field($model, 'password_old')->passwordInput(['maxlength' => true]) ?>
            
            <?= $form->field($model, 'password_new')->passwordInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'password_confirm')->passwordInput(['maxlength' => true]) ?>

        <?php endif; ?>


        <div class="form-group">
            <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>
</div>

<?php
// $script = <<< JS
//     $(document).ready(function() {
        
//         $("#user-nip").on("input", function() {
//             $.ajax({
//                 url: "/user/cek-nip",
//                 type: "GET",
//                 dataType: "json",
//                 data: {
//                     nip: $(this).val()
//                 },
//                 success: function(response) {

//                 }
//             });
//         });

//     });
// JS;
// $this->registerJs($script);
?>
