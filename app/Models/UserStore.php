<?php

namespace App\Models;

use App\Enums\StoreStatusEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserStore extends Model {
    use HasFactory;
    use SoftDeletes;

    protected $table = "user_stores";
    protected $guarded = ['id'];

    /**
     * Boot method to attach model events.
     *
     * @return void
     */
    public static function boot() {
        parent::boot();

        # Auto Creating Username
        self::creating(function ($model) {
            $model->setAttribute('username', self::generateUniqueUsername($model->name));
        });

        # Auto Creating Username When Update if There Hasn't Have A Username
        self::updating(function ($model) {
            if (!$model->username) {
                $model->setAttribute('username', self::generateUniqueUsername($model->name));
            }
        });
    }

    /**
     * Get Relation to User
     *
     * @return BelongsTo
     */
    public function user() {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function products() {
        return $this->hasMany(Product::class, "store_id");
    }
    public function productAuctions() {
        return $this->hasMany(ProductAuction::class, "store_id");
    }

    public function ulasan() {
        return $this->hasManyThrough(Ulasan::class, Product::class, 'store_id', 'product_id', 'id', 'id');
    }

    /**
     * Generate a unique username based on the given name.
     *
     * @param  string  $name
     * @return string
     */
    protected static function generateUniqueUsername($name) {
        $baseUsername = Str::slug($name, '');
        $username = $baseUsername . rand(10, 99);

        while (self::where('username', $username)->exists()) {
            $username = $baseUsername . rand(10, 99);
        }

        return $username;
    }

    /**
     * Getting Store Profile photo
     *
     * @return string
     */
    public function avatar() {
        return asset("storage/{$this->getAttribute('store_logo')}");
    }

    /**
     * Getting Store Profile photo
     *
     * @return string
     */
    public function cover() {
        return asset("storage/{$this->getAttribute('store_logo')}");
    }

    /**
     * Getting User Store Status enum
     *
     * @return Collection
     */
    public static function getStoreStatusEnums(): Collection {
        return collect(StoreStatusEnum::cases())->pluck('value');
    }

    /**
     * Getting current User Store status
     *
     * @return StoreStatusEnum
     */
    public function getStatusEnum(): StoreStatusEnum {
        return StoreStatusEnum::from($this->status);
    }

    public function getAverageRating() {
        $reviews = $this->ulasan;

        $a = $reviews->where('star', 1)->count();
        $b = $reviews->where('star', 2)->count();
        $c = $reviews->where('star', 3)->count();
        $d = $reviews->where('star', 4)->count();
        $e = $reviews->where('star', 5)->count();

        $R = $a + $b + $c + $d + $e;

        if ($R === 0) {
            return number_format(0, 1);
        }

        $average = (1 * $a + 2 * $b + 3 * $c + 4 * $d + 5 * $e) / $R;

        return number_format($average, 1);
    }

}