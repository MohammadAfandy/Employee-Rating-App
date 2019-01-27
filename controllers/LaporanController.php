<?php

namespace app\controllers;

use Yii;
use app\models\Penilaian;
use app\models\PenilaianSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

use yii\helpers\ArrayHelper;
use app\models\Pegawai;
use app\models\Kriteria;

/**
 * LaporanController 
 */
class LaporanController extends Controller
{

    /**
     * Lists all Laporan
     * @return mixed
     */
    public function actionIndex()
    {
        // $searchModel = new PenilaianSearch();
        // $dataProvider = $searchModel->search(Yii::$app->request->queryParams);\
        $penilaian = Penilaian::find()->joinWith(['pegawai'])->all();
        $kriteria = Kriteria::find()->all();

        $nilai = [];
        $max = [];
        $normalisasi = [];

        foreach ($penilaian as $key => $pen) {
            $nilai[$pen->id_penilaian] = json_decode($pen->penilaian, true);

            foreach ($nilai as $nil) {
                foreach ($nil as $k => $v) {
                    $max[$k] = [];
                }
            }
        }

        foreach ($max as $key_max => $m) {
            foreach ($nilai as $k => $v) {
                $max[$key_max][] = $nilai[$k][$key_max];
            }
            $max[$key_max] = max($max[$key_max]);
        }

        $normalisasi = $nilai;

        foreach ($normalisasi as $key_normalisasi => $norm) {
            foreach ($norm as $k => $n) {
                $normalisasi[$key_normalisasi][$k] = round($normalisasi[$key_normalisasi][$k] / $max[$k], 3);
            }
        }

        // print_r($normalisasi[6][10]);
        // print_r($max[10]);
        // print_r($normalisasi);
        // die();
       
        return $this->render('index', 
            // 'searchModel' => $searchModel,
            // 'dataProvider' => $dataProvider,
            // 'penilaian' => $penilaian,
            // 'kriteria' => $kriteria,
            // 'nilai' => $nilai,
            get_defined_vars()
        );
    }

}