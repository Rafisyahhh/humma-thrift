<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;

class HistoryController extends Controller {
    //
    public static function formatTanggal($tanggal) {
        $tanggalSekarang = Carbon::now();
        $tanggalFormat = Carbon::parse($tanggal);

        if ($tanggalSekarang->isSameDay($tanggalFormat)) {
            return 'hari ini';
        }

        $selisihHari = $tanggalSekarang->diffInDays($tanggalFormat);
        $selisihMinggu = $tanggalSekarang->diffInWeeks($tanggalFormat);
        $selisihBulan = $tanggalSekarang->diffInMonths($tanggalFormat);
        $selisihTahun = $tanggalSekarang->diffInYears($tanggalFormat);

        if ($selisihHari < 7) {
            return $selisihHari . ' hari yang lalu';
        } elseif ($selisihMinggu < 4) {
            return $selisihMinggu . ' minggu yang lalu';
        } elseif ($selisihBulan < 12) {
            return $selisihBulan . ' bulan yang lalu';
        } else {
            return $selisihTahun . ' tahun yang lalu';
        }
    }
}