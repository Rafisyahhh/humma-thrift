<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use WithdrawalStatusEnum;

class Withdrawal extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $casts = [
        'status' => WithdrawalStatusEnum::class
    ];

    public static function getWithdrawalStatusEnum()
    {
        return collect(WithdrawalStatusEnum::cases())->pluck('value');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function store()
    {
        return $this->belongsTo(UserStore::class);
    }
}
