<?php

namespace App\Http\Controllers;

use App\Models\cart;
use App\Models\Favorite;
use App\Models\User;
use Carbon\Carbon;
use Faker\Provider\bn_BD\Company;
use Illuminate\Http\Request;
use NumberFormatter;

class HistoryController extends Controller {
    /**
     * Display a listing of the resource.
     */
    public function index() {
        $carts = cart::where('user_id', auth()->id())
        ->whereNotNull('product_id')
        ->orderBy('created_at')
        ->get();
        $countcart = cart::where('user_id', auth()->id())->count();
        $favorites = Favorite::where('user_id', auth()->id())
        ->whereNotNull('product_id')
        ->orderBy('created_at')
        ->get();

        $countFavorite = Favorite::where('user_id', auth()->id())->count();

        $NumberFormatter = number_format(1_000, 0, '', '.');

        $transaction = [
            [
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
                    'product_id' => 1,
                    'status' => 'diterima',
                    'product' => [
                        'id' => 1,
                        'created_at' => '18-03-2024',
                        'updated_at' => '18-03-2024',
                        'title' => 'Classic Design Skart',
                        'price' => 100_000,
                        'cover_image' => 'template-assets/front/assets/images/homepage-one/product-img/product-img-1.webp'
                    ]
                ]
            ],
            [
                'id' => 2,
                'created_at' => '18-01-2024',
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
                    'product_id' => 1,
                    'status' => 'diterima',
                    'product' => [
                        'id' => 1,
                        'created_at' => '18-03-2024',
                        'updated_at' => '18-03-2024',
                        'title' => 'Classic Design Skart',
                        'price' => 100_000,
                        'cover_image' => 'template-assets/front/assets/images/homepage-one/product-img/product-img-1.webp'
                    ]
                ]
            ]
        ];
        // foreach ($transaction as &$key) {
        //     $key['date_diff_format'] = $this->formatTanggal($key['created_at']);
        //     $key['date_format'] = Carbon::parse($key['created_at'])->format('d F Y');
        // $key['price_format'] = str_replace(',00', '', number_format(1_000, 0, '', '.'));
        // }
        // unset($key);
        return view('user.history', compact('transaction','carts','countcart','countFavorite'));
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
