<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\KriteriaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Kriteria';
$this->params['breadcrumbs'][] = $this->title;
?>

<style>
    .nama_kriteria, .bobot_kriteria {
        border: 0;
        outline: 0;
        background: transparent;
        border-bottom: 2px solid #C0C0C0;
    }
    .nama_kriteria:focus, .bobot_kriteria:focus {
        border-bottom: 2px solid #5cb85c;
    }
</style>
<div class="kriteria-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <p>
        <?= Html::a('Create Kriteria', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        // 'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'attribute' => 'nama_kriteria',
                'value' => function($model) {
                    $nama = Html::textInput('Kriteria[' .$model->id_kriteria. '][nama_kriteria]', $model->nama_kriteria, [
                        'class' => 'nama_kriteria',
                        'disabled' => 'disabled',
                        'data-id' => $model->id_kriteria,
                        'data-oldval' => $model->nama_kriteria,
                    ]);
                    $edit = Html::button('Edit', [
                        'class' => 'btn btn-success btn-xs btn_edit_nama',
                        'data-id' => $model->id_kriteria,
                    ]);
                    $cancel = Html::button('X', [
                        'class' => 'btn btn-danger btn-xs btn_cancel_nama',
                        'data-id' => $model->id_kriteria,
                    ]);
                    return $nama . '<span class="pull-right">' . $edit . ' '. $cancel;
                },
                'format' => 'raw',
            ],
            [
                'attribute' => 'bobot',
                'value' => function($model) {
                    $bobot = Html::textInput('Kriteria[' .$model->id_kriteria. '][bobot]', $model->bobot * 100, [
                        'class' => 'bobot_kriteria',
                        'disabled' => 'disabled',
                        'data-id' => $model->id_kriteria,
                        'data-oldval' => $model->bobot * 100,
                    ]);
                    $edit = Html::button('Edit', [
                        'class' => 'btn btn-success btn-xs btn_edit_bobot',
                        'data-id' => $model->id_kriteria,
                    ]);
                    $cancel = Html::button('X', [
                        'class' => 'btn btn-danger btn-xs btn_cancel_bobot',
                        'data-id' => $model->id_kriteria,
                    ]);
                    return $bobot . ' %<span class="pull-right">' . $edit . ' '. $cancel;
                },
                'format' => 'raw',
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>

<?php
$script = <<< JS
    $(document).ready(function() {
        
        $(document).on("click", ".btn_edit_nama", function() {
            let id = $(this).data("id");
            let input = $(".nama_kriteria[data-id="+id+"]");

            input.removeAttr("disabled").css("border-bottom", "2px solid #5cb85c").focus();
        });

        $(document).on("click", ".btn_cancel_nama", function() {
            let id = $(this).data("id");
            let input = $(".nama_kriteria[data-id="+id+"]");

            input.attr("disabled", true).css("border-bottom", "2px solid #C0C0C0").val(input.data("oldval"));
        });

        $(document).on("click", ".btn_edit_bobot", function() {
            let id = $(this).data("id");
            let input = $(".bobot_kriteria[data-id="+id+"]");

            input.removeAttr("disabled").css("border-bottom", "2px solid #5cb85c").focus();
        });

        $(document).on("click", ".btn_cancel_bobot", function() {
            let id = $(this).data("id");
            let input = $(".bobot_kriteria[data-id="+id+"]");

            input.attr("disabled", true).css("border-bottom", "2px solid #C0C0C0").val(input.data("oldval"));
        });

    });
JS;
$this->registerJs($script);
?>