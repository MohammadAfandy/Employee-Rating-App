<?php

namespace app\controllers;

use Yii;
use app\models\Penilaian;
use app\models\PenilaianSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

use app\models\Pegawai;
use app\models\Kriteria;

use mPDF;

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
        $laporan = $this->generateLaporan();
        return $this->render('index', $laporan);
    }

    public function actionExportPdf()
    {

        $laporan = $this->generateLaporan();

        $mpdf = new mPDF();
        $mpdf->WriteHTML($this->renderPartial('pdf/laporan_pdf', $laporan));
        $mpdf->Output('ERA_laporan_' . date('Y-m-d-H:i:s') . '.pdf', 'I');
        exit;

    }

    public function generateLaporan()
    {
        $penilaian = Penilaian::find()->joinWith(['pegawai'])->indexBy('id_penilaian')->asArray()->all();
        $kriteria = Kriteria::find()->indexBy('id_kriteria')->asArray()->all();

        $nilai = [];
        $min_max = [];

        foreach ($penilaian as $key => $pen) {
            $nilai[$key] = json_decode($pen['penilaian'], true);

            foreach ($nilai as $nil) {
                foreach ($nil as $k => $v) {
                    $min_max[$k] = [];
                }
            }
        }

        foreach ($min_max as $key_min_max => $m) {
            
            foreach ($nilai as $k => $v) {
                $min_max[$key_min_max][] = $nilai[$k][$key_min_max];
            }

            $min_max[$key_min_max] = ($kriteria[$key_min_max]['type'] == Kriteria::COST)
                ? min($min_max[$key_min_max])
                : max($min_max[$key_min_max]);

        }

        $normalisasi = $nilai;

        foreach ($normalisasi as $key_normalisasi => $norm_value) {
            foreach ($norm_value as $k => $n) {
                $normalisasi[$key_normalisasi][$k] = ($kriteria[$k]['type'] == Kriteria::COST)
                    ? round($min_max[$k] / $normalisasi[$key_normalisasi][$k], 3)
                    : round($normalisasi[$key_normalisasi][$k] / $min_max[$k], 3);
            }
        }

        $rank = $normalisasi;

        foreach ($rank as $key_rank => $rank_value) {
            foreach ($rank_value as $k => $r) {
                $rank[$key_rank][$k] = $rank[$key_rank][$k] * $kriteria[$k]['bobot'];
            }
            
            $rank[$key_rank] = array_sum($rank[$key_rank]);
        }

        uasort($rank, function($a, $b) {
            if ($a == $b) {
                return 0;
            }
            return ($a > $b) ? -1 : 1;
        });


        $sort = array_keys($rank);
        
        return [
            'penilaian' => $penilaian,
            'kriteria' => $kriteria,
            'nilai' => $nilai,
            'normalisasi' => $normalisasi,
            'rank' => $rank,
            'sort' => $sort,
        ];
    }
    
}