<?php

namespace App\Imports;

use App\product;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ProductImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        if (!isset($row['product_name']) || empty($row['product_name'])) {
            return null;
        }

        return new product([
            'product_name' => $row['product_name'] ?? null,
            'product_desc' => $row['product_desc'] ?? null,
            'brand_id' => $row['brand_id'] ?? null,
            'category_id' => null, // $row['category_id'] ?? null, 
            'product_image' => $row['product_image'] ?? null,
        ]);
    }
}
