<?php

namespace App\Casts;

use Carbon\Carbon;
use Illuminate\Contracts\Database\Eloquent\CastsAttributes;
use Illuminate\Database\Eloquent\Model;

class HistoryTanggalCast implements CastsAttributes {
    /**
     * Cast the given value.
     *
     * @param  array<string, mixed>  $attributes
     */
    public function get(Model $model, string $key, mixed $value, array $attributes): mixed {
        $tanggalSekarang = Carbon::now();
        $tanggalFormat = Carbon::parse($value);

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

    /**
     * Prepare the given value for storage.
     *
     * @param  array<string, mixed>  $attributes
     */
    public function set(Model $model, string $key, mixed $value, array $attributes): mixed {
        return $value;
    }
}