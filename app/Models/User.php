<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Enums\UserLevelEnum;
use App\Traits\VerifyEmailTrait;
use Creativeorange\Gravatar\Facades\Gravatar;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles, VerifyEmailTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'username',
        'fullname',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Get Gravatar URL Image
     *
     * @return string
     */
    public function getGravatarLink()
    {
        return Gravatar::get($this->email);
    }

    /**
     * Get user role instance
     *
     * @return UserLevelEnum
     */
    public function getUserRoleInstance()
    {
        $roles = $this->getRoleNames();

        // Ensure $roles is an array and has at least one element before accessing $roles[0]
        $roleName = !empty($roles) && isset($roles[0]) ? $roles[0] : null;

        // Return the corresponding UserLevelEnum or default to UserLevelEnum::USER
        return $roleName ? UserLevelEnum::from($roleName) : UserLevelEnum::USER;
    }
}
