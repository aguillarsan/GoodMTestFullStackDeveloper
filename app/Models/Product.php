<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    public function stores()
    {
        return $this->belongsToMany(Store::class, 'store_products', 'product_id', 'store_id')->withPivot('store_id');
    }
}
