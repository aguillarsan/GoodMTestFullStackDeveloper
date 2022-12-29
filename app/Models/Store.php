<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    use HasFactory;

    public function delivery_type(){
        return $this->belongsTo(Delivery_type::class);
    }

    public function products()
    {
        return $this->belongsToMany(Product::class, 'store_products', 'store_id', 'product_id')->withPivot('product_id');
    }
}
