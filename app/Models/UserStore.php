<?php

namespace App\Models;

use App\Enums\StoreStatusEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserStore extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = "user_stores";
    protected $guarded = ['id'];

    /**
     * Boot method to attach model events.
     *
     * @return void
     */
    public static function boot()
    {
        parent::boot();

        # Auto Creating Username
        self::creating(function ($model) {
            $model->setAttribute('username', self::generateUniqueUsername($model->name));
        });

        # Auto Creating Username When Update if There Hasn't Have A Username
        self::updating(function ($model) {
            if(!$model->username) {
                $model->setAttribute('username', self::generateUniqueUsername($model->name));
            }
        });
    }

    /**
     * Get Relation to User
     *
     * @return BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    /**
     * Generate a unique username based on the given name.
     *
     * @param  string  $name
     * @return string
     */
    protected static function generateUniqueUsername($name)
    {
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
    public function avatar()
    {
        return asset("storage/{$this->getAttribute('store_logo')}");
    }

    /**
     * Getting Store Profile photo
     *
     * @return string
     */
    public function cover()
    {
        return asset("storage/{$this->getAttribute('store_logo')}");
    }

    /**
     * Getting User Store Status enum
     *
     * @return Collection
     */
    public static function getStoreStatusEnums(): Collection
    {
        return collect(StoreStatusEnum::cases())->pluck('value');
    }

    /**
     * Getting current User Store status
     *
     * @return StoreStatusEnum
     */
    public function getStatusEnum(): StoreStatusEnum
    {
        return StoreStatusEnum::from($this->status);
    }
}
