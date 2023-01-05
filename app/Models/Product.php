<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory, SoftDeletes;
    public function stores()
    {
        return $this->belongsToMany(Store::class, 'store_products', 'product_id', 'store_id')->withPivot('store_id');
    }
}
