<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/products', 'ProductController@listProducts')->name('products');
Route::post('/import-products', 'ProductController@importProducts')->name('import_products');

Route::get('/filter-products', 'ProductController@productsFiltered')->name('filter-products');


//        Exemples to filter:
//        http://127.0.0.1:8000/filter-products?discount=66
//        http://127.0.0.1:8000/filter-products?in=rating,rating8
//        http://127.0.0.1:8000/filter-products?in=rating,rating8&in=subcategory,sub8
//        http://127.0.0.1:8000/filter-products?in=rating,rating8&like=subcategory,sub
//        http://127.0.0.1:8000/filter-products?rating=rating8&subcategory=sub8&description=descriere8
//        http://127.0.0.1:8000/filter-products?in=rating,rating8&like=subcategory,sub&description=descriere8

