<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductAuction extends Model {
    use HasFactory;
    protected $guarded = ['id'];

    public function brand() {
        return $this->belongsTo(Brand::class, 'brand_id');
    }

    public function categories() {
        return $this->belongsToMany(ProductCategory::class, 'product_category_pivots');
    }

    public function product() {
        return $this->hasMany(ProductGallery::class, 'product_galleries');
    }
}
