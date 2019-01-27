<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PenilaianSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Penilaian';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="penilaian-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Tambah Penilaian', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php
    // GridView::widget([
    //     'dataProvider' => $dataProvider,
    //     'filterModel' => $searchModel,
    //     'columns' => [
    //         ['class' => 'yii\grid\SerialColumn'],

    //         'id_penilaian',
    //         'id_pegawai',
    //         'penilaian:ntext',
    //         'created_date',
    //         'updated_date',

    //         ['class' => 'yii\grid\ActionColumn'],
    //     ],
    // ]); 
    ?>

    <table class="table table-hover table-bordered">
        <thead>
            <th>No</th>
            <th>Nama Pegawai</th>
            
            <?php foreach ($kriteria as $kri): ?>
                <th><?= $kri->nama_kriteria ?></th>
            <?php endforeach; ?>
            
            <th>Aksi</th>
        </thead>
        
        <?php if (!empty($penilaian) && is_array($penilaian)): ?>
            
            <?php foreach($penilaian as $key => $pen): ?>
                
                <tbody>
                    <tr>
                        <td><?= ($key + 1) ?></td>
                        <td><?= $pen->pegawai->nama_pegawai; ?></td>
                        
                        <?php foreach ($kriteria as $kri): ?>
                            <td><?= $nilai[$pen->id_penilaian][$kri->id_kriteria]; ?></td>
                        <?php endforeach; ?>
                    </tr>
                </tbody>
            
            <?php endforeach; ?>
        
        <?php else: ?>
            
            <tbody>
                <tr>
                    <td colspan="5">Data Tidak Ditemukan</td>
                </tr>
            </tbody>
        
        <?php endif; ?>
    
    </table>

</div>
