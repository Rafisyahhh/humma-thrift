<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cart extends Model
{
    use HasFactory;

    protected$table = "cart";

    protected $guarded =[
        'id',
        'created_at',
        'updated_at'

    ];

    public function product()
    {
        return $this->belongsTo(product::class);
    }
}
