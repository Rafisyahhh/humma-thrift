<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cart extends Model
{
    use HasFactory;

    protected $table = "carts";

    protected $guarded = ['id'];

    public function product()
    {
        return $this->belongsTo(product::class);
    }

    public function store()
    {
        return $this->belongsTo(UserStore::class);
    }
}
