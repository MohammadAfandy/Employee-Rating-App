<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Penilaian */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="panel-body">
    <div class="penilaian-form">

        <?php
        $form = ActiveForm::begin([
            'options' => [
                'enctype' => 'multipart/form-data',
            ],
            'layout' => 'horizontal',
        ]);
        ?>

        <?php
        if ($model->isNewRecord) {
            echo $form->field($model, 'id_pegawai')->dropDownList($data_pegawai, [
                'prompt' => '--PILIH-',
            ]);
        } else {
            echo $form->field($model, 'id_pegawai')->begin();
            echo Html::activeHiddenInput($model, 'id_pegawai');
            echo $form->field($model, 'id_pegawai')->end();
            
            echo $form->field($model, 'id_pegawai')->dropDownList($data_pegawai, [
                'disabled' => true,
            ]);
        }
        ?>

        <?php foreach ($kriteria as $key => $kri): ?>
            <div class="form-group">
                <label class="control-label col-sm-3"><?= $kri->nama_kriteria; ?></label>
                <div class="col-sm-6">
                    <?php
                    echo Html::textInput(
                        'Penilaian[penilaian][' . $kri->id_kriteria . ']',
                        $model->isNewRecord ? '' : $data_penilaian[$kri->id_kriteria],
                        [
                            'type' => 'number',
                            'class' => 'form-control field_penilaian',
                            'data-id' => $kri->id_kriteria,
                            'data-nama' => $kri->nama_kriteria,
                            'style' => [
                                'width' => '100px',
                            ],
                        ]
                    );
                    ?>
                </div>
                <div class="col-sm-offset-3 col-sm-6" id="error_<?= $kri->id_kriteria; ?>" style="color: red; font-size: 0.9em;"></div>
            </div>

        <?php endforeach; ?>

        <div class="form-group">
            <div class="col-sm-3">
                <?php
                echo Html::submitButton($model->isNewRecord ? 'Tambah' : 'Update', [
                    'class' => 'btn btn-success',
                    'id' => 'btn_submit',
                ]);
                ?>
            </div>
        </div>

        <?php ActiveForm::end(); ?>

    </div>
</div>

<?php
$script = <<< JS
    $(document).ready(function() {
        
        $(document).on("keyup", ".field_penilaian", function() {
            let new_value = $(this).val().replace(/\D/g, "");
            this.value = new_value;
            
            if (this.value > 100) {
                this.value = 100;
                } else if (this.value < 0) {
                    this.value = 0;
            }
        });

        $("#btn_submit").on("click", function(e) {
            $(".field_penilaian").each(function() {
                if (this.value === "") {
                    $("#error_" + $(this).data("id")).html($(this).data("nama") + " Tidak Boleh Kosong");
                    e.preventDefault();
                } else if (this.value > 100) {
                    $("#error_" + $(this).data("id")).html("Maks Nilai 100");
                    e.preventDefault();
                } else {
                    $("#error_" + $(this).data("id")).empty();
                }
            });
        });

    });
JS;
$this->registerJs($script);
?>

