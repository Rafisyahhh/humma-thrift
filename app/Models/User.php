<?php

namespace App\Models;

use App\Helpers\UrlHelper;
use App\Models\UserAddress;
use App\Enums\UserLevelEnum;
use App\Traits\VerifyEmailTrait;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Creativeorange\Gravatar\Facades\Gravatar;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * User Model Data
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $username
 * @property string $email
 * @property string $password
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string|null $remember_token
 * @property string $name
 * @property string|null $phone
 * @property string|null $avatar
 * @property string|null $pbirth
 * @property string|null $dbirth
 * @property string|null $nic
 * @property string|null $nic_photo
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Permission\Models\Permission> $permissions
 * @property-read int|null $permissions_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Permission\Models\Role> $roles
 * @property-read int|null $roles_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Laravel\Sanctum\PersonalAccessToken> $tokens
 * @property-read int|null $tokens_count
 * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User permission($permissions, $without = false)
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User role($roles, $guard = null, $without = false)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereAvatar($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereDbirth($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherename($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereNic($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereNicPhoto($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePbirth($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUsername($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User withoutPermission($permissions)
 * @method static \Illuminate\Database\Eloquent\Builder|User withoutRole($roles, $guard = null)
 * @mixin \Eloquent
 */
class User extends Authenticatable implements MustVerifyEmail {
    use HasApiTokens, HasFactory, Notifiable, HasRoles, VerifyEmailTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'username',
        'name',
        'email',
        'phone',
        'avatar',
        'pbirth',
        'dbirth',
        'password',
        'last_login',
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
    public function getGravatarLink() {
        return Gravatar::get($this->getAttribute('email'));
    }

    /**
     * Get user role instance
     *
     * @return UserLevelEnum
     */
    public function getUserRoleInstance() {
        $roles = $this->getRoleNames();
        $roleName = !empty($roles) && isset($roles[0]) ? $roles[0] : null;
        return $roleName ? UserLevelEnum::from($roleName) : UserLevelEnum::USER;
    }

    /**
     * Getting user status
     *
     * @return array
     */
    public function getUserStatusInstance() {
        $label = ['Aktif', 'Nonaktif'];
        $color = ['success', 'danger'];

        return [
            'label' => $label[$this->getAttribute('banned')],
            'color' => $color[$this->getAttribute('banned')],
        ];
    }

    /**
     * Getting user store
     *
     * @return HasOne
     */
    public function store() {
        return $this->hasOne(UserStore::class);
    }

    /**
     * Getting the user avatar
     *
     * @return string
     */
    public function getAvatar() {
        $avatar = $this->getAttribute('avatar');
        $isUrlOnAvatar = UrlHelper::isUrl($avatar);
        return $avatar ? ($isUrlOnAvatar ? $avatar : asset("storage/{$avatar}")) : Gravatar::get($this->getAttribute('email'));
    }

    public function UserAddress() {
        return $this->hasMany(UserAddress::class);
    }
}
