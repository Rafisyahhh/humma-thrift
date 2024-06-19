<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Faker\Provider\bn_BD\Company;
use Illuminate\Http\Request;

class HistoryController extends Controller {
    /**
     * Display a listing of the resource.
     */
    public function index() {
        $transaction = [
            'id' => 1,
            'created_at' => '18-03-2024',
            'updated_at' => '18-03-2024',
            'user_id' => 17,
            'order_id' => 2,
            'total' => 1_000_000,
            'transaction_id' => 'String',
            'reference_id' => 'String',
            'status' => 'PAID',
            'user' => User::find(17),
            'order' => [
                'id' => 2,
                'created_at' => '18-03-2024',
                'updated_at' => '18-03-2024',
                'user_id' => 1,
                'product_id' => 1,
                'status' => 'diterima',
                'product' => [
                    'id' => 1,
                    'created_at' => '18-03-2024',
                    'updated_at' => '18-03-2024',
                    'user_id' => 2,
                    'price' => 100_000
                ]
            ]
        ];
        return view('user.history', compact('transaksi'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id) {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id) {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id) {
        //
    }

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