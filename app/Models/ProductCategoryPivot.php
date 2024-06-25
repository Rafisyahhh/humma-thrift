<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ProductCategoryPivot extends Model {
    use HasFactory;
    protected $guarded = ['id'];

    protected static function boot() {
        parent::boot();

        static::creating(function ($question) {
            DB::statement("SET @count = 0;");
            DB::statement("UPDATE `product_category_pivots` SET `product_category_pivots`.`id` = @count:= @count + 1;");
            DB::statement("ALTER TABLE `product_category_pivots` AUTO_INCREMENT = 1;");
        });
    }

    public function category() {
        return $this->belongsTo(ProductCategory::class, 'product_category_id');
    }
}