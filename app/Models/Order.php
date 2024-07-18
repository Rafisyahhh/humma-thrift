<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function product() {
        return $this->belongsTo(Product::class, 'product_id');
    }
    public function product_auction() {
        return $this->belongsTo(ProductAuction::class, 'product_auction_id');
    }
    public function transaction_order() {
        return $this->belongsTo(TransactionOrder::class, 'transaction_order_id');
    }
}
