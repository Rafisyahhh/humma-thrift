<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Str;
use App\Events\NewUserStoreCreated;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserStore extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    /**
     * Boot method to attach model events.
     *
     * @return void
     */
    public static function boot()
    {
        parent::boot();

        // Hook into the creating event
        self::creating(function ($model) {
            // Generate a unique username
            $model->setAttribute('username', self::generateUniqueUsername($model->name));
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

        // Ensure the username is unique
        while (self::where('username', $username)->exists()) {
            $username = $baseUsername . rand(10, 99);
        }

        return $username;
    }
}
