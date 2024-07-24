<?php

namespace App\Models;

use App\Casts\HistoryTanggalCast;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ulasan extends Model {
    use HasFactory;

    protected $fillable = [
        'user_id',
        'product_id',
        'star',
        'comment',
    ];

    protected $casts = [
        'created_at' => HistoryTanggalCast::class,
    ];

    public function product() {
        return $this->belongsTo(Product::class);
    }

    public function user() {

        return $this->belongsTo(User::class);
    }
}