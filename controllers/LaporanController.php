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


        foreach ($normalisasi as $key_normalisasi => $norm_value) {
            foreach ($norm_value as $k => $n) {
                $normalisasi[$key_normalisasi][$k] = round($normalisasi[$key_normalisasi][$k] / $max[$k], 3);
            }
        }

        $rank = $normalisasi;

        foreach ($rank as $key_rank => $rank_value) {
            foreach ($rank_value as $k => $n) {
                $i = 0;
                $rank[$key_rank][$k] = $rank[$key_rank][$k] * $kriteria[$i]->bobot;
                $i++;
            }
            
            $rank[$key_rank] = array_sum($rank[$key_rank]);
        }

        // uasort($rank, function($a, $b) {
        //     if ($a == $b) {
        //         return 0;
        //     }
        //     return ($a > $b) ? -1 : 1;
        // });

        // rsort($rank);
        // print_r($normalisasi[6][10]);
        // print_r($rank);
        // print_r($kriteria[0]->bobot);
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