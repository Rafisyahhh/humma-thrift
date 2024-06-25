<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCategoryPivot extends Model {
    use HasFactory;
    protected $guarded = ['id'];

    public function category() {
        return $this->belongsTo(ProductCategory::class, 'product_category_id');
    }
}