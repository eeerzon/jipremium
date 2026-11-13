<?php

namespace App\Imports;

use App\category;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class CategoryImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        return new category([
            'category_name' => $row['category_name'],
        ]);
    }
}

