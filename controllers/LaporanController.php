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
        $penilaian = Penilaian::find()->joinWith(['pegawai'])->all();
        $kriteria = Kriteria::find()->all();

        $nilai = [];
        $max = [];

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
            $i = 0;
            foreach ($rank_value as $k => $r) {
                $rank[$key_rank][$k] = $rank[$key_rank][$k] * $kriteria[$i]->bobot;
                $i++;
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