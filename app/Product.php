<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

    protected $fillable = [
        'picture', 'name', 'category', 'subcategory', 'subtype', 'price', 'discount', 'stock_status', 'description', 'rating', 'product_url' , 'created_at'
    ];
}
