<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Product extends Model {
    use HasFactory;
    protected $guarded = ['id'];
    protected static function boot() {
        parent::boot();

        static::creating(function ($question) {
            $question->slug = Str::slug($question->title);
        });
    }

    public function brand() {
        return $this->belongsTo(Brand::class, 'brand_id');
    }

    public function categories() {
        return $this->belongsToMany(ProductCategory::class, 'product_category_pivots');
    }

    public function gallery() {
        return $this->hasMany(ProductGallery::class);
    }
}
