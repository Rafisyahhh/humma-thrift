<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class ProductAuction extends Model {
    use HasFactory;
    protected $guarded = ['id'];

    protected static function boot() {
        parent::boot();

        static::creating(function ($question) {
            $question->slug = Str::slug($question->title);
        });
        static::updating(function ($question) {
            $question->slug = Str::slug($question->title);
        });
    }

    public function userStore() {
        return $this->belongsTo(UserStore::class, 'store_id');
    }

    public function brand() {
        return $this->belongsTo(Brand::class, 'brand_id');
    }

    public function categories() {
        return $this->belongsToMany(ProductCategory::class, 'product_category_pivots');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function order() {
        return $this->hasMany(Order::class);
    }
    public function gallery() {
        return $this->hasMany(ProductGallery::class);
    }
    public function auctions() {
        return $this->hasMany(auctions::class);
    }

    /**
     * Get the favorite associated with the Product
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function favorite(): HasMany
    {
        return $this->hasMany(Favorite::class);
    }
}
