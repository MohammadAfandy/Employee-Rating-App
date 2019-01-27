<?php

namespace app\components;

use Yii;

class Helpers extends \yii\base\Component
{

    public static function dateIndonesia($date) 
    {
        $result = '';
        if(!empty($date) && $date !== '0000-00-00') {
            $BulanIndo = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"); 
            $tahun = substr($date, 0, 4);
            $bulan = substr($date, 5, 2);
            $tgl   = substr($date, 8, 2);
         
            $result = $tgl . " " . $BulanIndo[(int)$bulan-1] . " ". $tahun;
            
        }
        return $result;
    }

    public static function dateTimeIndonesia($date) 
    {
        $result = '';
        if(!empty($date) && $date !== '0000-00-00 00:00:00') {
            $BulanIndo = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"); 
            $tahun = substr($date, 0, 4);
            $bulan = substr($date, 5, 2);
            $tgl   = substr($date, 8, 2);
         
            $result = $tgl . " " . $BulanIndo[(int)$bulan-1] . " ". $tahun.' - '.substr($date, 11, 19);
            
        }
        return $result;
    }

}