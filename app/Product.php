<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Mehradsadeghi\FilterQueryString\FilterQueryString;


class Product extends Model
{
//    Allow filtering and declare filterable attributes
    use FilterQueryString;
    protected $filters = ['in', 'like', 'picture', 'name', 'category', 'subcategory', 'subtype', 'price', 'discount', 'stock_status', 'description', 'rating', 'product_url' , 'created_at'];

    protected $table = 'products';

    protected $fillable = [
        'picture', 'name', 'category', 'subcategory', 'subtype', 'price', 'discount', 'stock_status', 'description', 'rating', 'product_url' , 'created_at'
    ];
}
 
