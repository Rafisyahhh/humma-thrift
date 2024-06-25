<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ProductGallery extends Model {
    use HasFactory;
    protected $guarded = ['id'];

    protected static function boot() {
        parent::boot();

        static::creating(function ($question) {
            DB::statement("SET @count = 0;");
            DB::statement("UPDATE `product_galleries` SET `product_galleries`.`id` = @count:= @count + 1;");
            DB::statement("ALTER TABLE `product_galleries` AUTO_INCREMENT = 1;");
        });
    }
    public function product() {
        return $this->belongsTo(Product::class, 'product_id');
    }
    public function productAuction() {
        return $this->belongsTo(ProductAuction::class, 'product_auction_id');
    }
}