<?php

namespace App\Models;

use App\Enums\WithdrawalStatusEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Withdrawal
 *
 * @package App\Models
 *
 * @property int $id
 * @property int $user_id
 * @property int $store_id
 * @property WithdrawalStatusEnum $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Withdrawal newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Withdrawal newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Withdrawal query()
 * @method static \Illuminate\Database\Eloquent\Builder|Withdrawal whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Withdrawal whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Withdrawal whereStoreId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Withdrawal whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Withdrawal whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Withdrawal whereUpdatedAt($value)
 *
 * @mixin \Eloquent
 */
class Withdrawal extends Model
{
    use HasFactory;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'status' => WithdrawalStatusEnum::class,
    ];

    /**
     * Get the enum values for the withdrawal status.
     *
     * @return \Illuminate\Support\Collection
     */
    public static function getWithdrawalStatusEnum()
    {
        return collect(WithdrawalStatusEnum::cases())->pluck('value');
    }

    /**
     * Get the user that owns the withdrawal.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the store that owns the withdrawal.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function store()
    {
        return $this->belongsTo(UserStore::class,'user_store_id', 'id');
    }

    /**
     * Get the bank that owns the withdrawal.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function bank()
    {
        return $this->belongsTo(Bank::class);
    }
}
