<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Order
 *
 * @package App\Models
 * @property int $id
 * @property int $product_id
 * @property int $product_auction_id
 * @property int $transaction_order_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \App\Models\Product $product
 * @property \App\Models\ProductAuction $product_auction
 * @property \App\Models\TransactionOrder $transaction_order
 */
class Order extends Model
{
    use HasFactory;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];

    /**
     * Get the product associated with the order.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    /**
     * Get the product auction associated with the order.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product_auction()
    {
        return $this->belongsTo(ProductAuction::class, 'product_auction_id');
    }

    /**
     * Get the transaction order associated with the order.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function transaction_order()
    {
        return $this->belongsTo(TransactionOrder::class, 'transaction_order_id');
    }
}
