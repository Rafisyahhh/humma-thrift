<?php

namespace App\Models;

use App\Enums\TransactionStatusEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TransactionOrder
 *
 * @package App\Models
 * @property int $id
 * @property int $user_id
 * @property int $user_address_id
 * @property int $user_store_id
 * @property string $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \App\Models\UserAddress $userAddress
 * @property \App\Models\User $user
 * @property \App\Models\UserStore $userstore
 * @property \Illuminate\Database\Eloquent\Collection|\App\Models\Order[] $order
 */
class TransactionOrder extends Model
{
    use HasFactory;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];

    protected $casts = [
        'paid_at' => 'datetime',
        'expired_at' => 'datetime',
    ];

    /**
     * Get the user address associated with the transaction order.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function userAddress()
    {
        return $this->belongsTo(UserAddress::class);
    }

    /**
     * Get the user associated with the transaction order.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the user store associated with the transaction order.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function userstore()
    {
        return $this->belongsTo(UserStore::class);
    }

    /**
     * Get the orders associated with the transaction order.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function order()
    {
        return $this->hasMany(Order::class);
    }

    /**
     * Get the transaction status enum instance.
     *
     * @return \App\Enums\TransactionStatusEnum
     */
    public function getTransactionEnum()
    {
        return TransactionStatusEnum::from($this->getAttribute('status'));
    }
}
