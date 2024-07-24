<?php

namespace App\Http\Controllers;

use App\Models\cart;
use App\Models\Favorite;
use App\Models\TransactionOrder;
use App\Models\Ulasan;
use App\Models\User;
use Carbon\Carbon;
use Faker\Provider\bn_BD\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use NumberFormatter;

class HistoryController extends Controller {
    /**
     * Display a listing of the resource.
     */
    public function index() {
        $transactions = TransactionOrder::where('user_id', auth()->id())->where('delivery_status', 'selesai')->get();

        // foreach ($transaction as &$key) {
        //     $key['date_diff_format'] = $this->formatTanggal($key['created_at']);
        //     $key['date_format'] = Carbon::parse($key['created_at'])->format('d F Y');
        // $key['price_format'] = str_replace(',00', '', number_format(1_000, 0, '', '.'));
        // }
        // unset($key);
        return view('user.history', compact('transactions'));
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

        $request->validate([
            'product_id' => 'required|exists:products,id',
            'star' => 'required|integer|between:1,5',
            'comment' => 'required|string|max:1000',
        ]);

        $review = new Ulasan();
        $review->user_id = Auth::user()->id;
        $review->product_id = $request->product_id;
        $review->star = $request->star;
        $review->comment= $request->comment;
        $review->save();
        return redirect()->back()->with('success', 'Ulasan Anda berhasil dibuat');
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
