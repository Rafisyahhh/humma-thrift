<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Str;

class Product extends Model {
    use HasFactory;
    protected $guarded = ['id'];
    protected static function boot() {
        parent::boot();

        static::creating(function ($models) {
            if(!$models->slug) {
                $models->slug = Str::slug($models->title);
            }
        });
        static::updating(function ($models) {
            if(!$models->slug) {
                $models->slug = Str::slug($models->title);
            }
        });
    }

    public function userstore() {
        return $this->belongsTo(UserStore::class, 'store_id');
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

    /**
     * Get the favorite associated with the Product
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function favorite(): HasMany {
        return $this->hasMany(Favorite::class);
    }
}
