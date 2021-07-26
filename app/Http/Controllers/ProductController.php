<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Imports\ProductsImport;
use Maatwebsite\Excel\Facades\Excel;

class ProductController extends Controller
{
    public function listProducts(){
        $products = Product::orderBy('created_at', 'DESC')->get();
        return view('dashboard.products', ['products' => $products]);
    }

    public function importProducts( Request $request){

        if ($request->file('csv_file') != null) {
            config(['excel.import.startRow' => 2]);
            Excel::import(new ProductsImport, $request->file('csv_file')->store('temp'));
            return back();
        }
        return back();
    }
}
