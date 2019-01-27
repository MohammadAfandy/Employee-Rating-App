<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

use app\components\Helpers;
/* @var $this yii\web\View */
/* @var $searchModel app\models\PegawaiSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pegawai';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pegawai-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php Pjax::begin([
        'id' => 'pegawai-index',
        'enablePushState' => false, // to disable push state
        'enableReplaceState' => false, // to disable replace state
        'timeout' => 30000
    ]);
    ?>

    <p>
        <?= Html::a('Create Pegawai', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'nip',
            'nama_pegawai',
            [
                'attribute' => 'tgl_lahir',
                'value' => function($model) {
                    return Helpers::dateIndonesia($model->tgl_lahir);
                },
            ],
            [
                'attribute' => 'jk',
                'filter' => ['L' => 'Laki-Laki', 'P' => 'Perempuan'],
                'value' => function($model) {
                    return $model->jk == 'L' ? 'Laki-Laki' : 'Perempuan';
                },
            ],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
