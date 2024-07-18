<?php

namespace App\Models;

use App\Enums\TransactionStatusEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionOrder extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function UserAddress()
    {
        return $this->belongsTo(UserAddress::class);
    }
    public function Product()
    {
        return $this->belongsTo(Product::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function order()
    {
        return $this->hasMany(Order::class);
    }

    public function getTransactionEnum()
    {
        return TransactionStatusEnum::from($this->getAttribute('status'));
    }
}
