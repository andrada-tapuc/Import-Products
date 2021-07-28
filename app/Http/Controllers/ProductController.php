<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Imports\ProductsImport;
use Maatwebsite\Excel\Facades\Excel;


class ProductController extends Controller
{

//    Listing products from the database, sorting them by most recently imported
    public function listProducts(){
        $products = Product::orderBy('created_at', 'DESC')->get();
        return view('dashboard.products', ['products' => $products]);
    }

//    Importing products
    public function importProducts( Request $request){

        if ($request->file('csv_file') != null) {
            Excel::import(new ProductsImport, $request->file('csv_file')->store('temp'));
        }
        return back();
    }

//    Filter products and return them to json
    public function productsFiltered(){
        $products = Product::filter()->get();
        return response()->json($products);
    }
}
