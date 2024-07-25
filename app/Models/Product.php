<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Str;

/**
 * Class Product
 *
 * @package App\Models
 * @property int $id
 * @property string $title
 * @property string $slug
 * @property int $store_id
 * @property int $brand_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\UserStore $userstore
 * @property-read \App\Models\User $user
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Ulasan[] $ulasan
 * @property-read \App\Models\Brand $brand
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\ProductCategory[] $categories
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\ProductGallery[] $gallery
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Favorite[] $favorite
 */
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

    /**
     * Get the store that owns the product.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function userstore(): BelongsTo {
        return $this->belongsTo(UserStore::class, 'store_id');
    }

    /**
     * Get the user that owns the product.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }

    /**
     * Get all of the reviews for the product.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function ulasan(): HasMany {
        return $this->hasMany(Ulasan::class);
    }

    /**
     * Get the brand that owns the product.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function brand(): BelongsTo {
        return $this->belongsTo(Brand::class, 'brand_id');
    }

    /**
     * The categories that belong to the product.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function categories(): BelongsToMany {
        return $this->belongsToMany(ProductCategory::class, 'product_category_pivots');
    }

    /**
     * Get all of the galleries for the product.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function gallery(): HasMany {
        return $this->hasMany(ProductGallery::class);
    }

    /**
     * Get all of the favorites for the product.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function favorite(): HasMany {
        return $this->hasMany(Favorite::class);
    }
}
