<?php

namespace App\Imports;

use App\Product;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;


class ProductsImport implements ToModel, WithStartRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */

    /**
     * @return int
     */
    public function startRow(): int
    {
        return 2;
    }

    public function model(array $row)
    {
        return new Product([
            'picture'     => $row[0],
            'name'    => $row[1],
            'category'    => $row[2],
            'subcategory'    => $row[3],
            'subtype'    => $row[4],
            'price'    => (int)$row[5],
            'discount'    => (int)$row[6],
            'stock_status'    => $row[7],
            'description'    => $row[8],
            'rating'    => $row[9],
            'product_url'    => $row[10],
        ]);
    }
}
