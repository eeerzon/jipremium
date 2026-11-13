<?php

namespace App\Imports;

use App\brand;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Facades\Log;

class BrandImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        if (!isset($row['brand_name']) || empty($row['brand_name'])) {
            return null;
        }

        return new brand([
            'brand_name' => $row['brand_name'] ?? null,
            'brand_desc' => $row['brand_desc'] ?? null,
            'booth_no' => $row['booth_no'] ?? null,
            'ceo_name' => $row['ceo_name'] ?? null,
            'website' => $row['website'] ?? null,
            'phone_number' => $row['phone_number'] ?? null,
            'email' => $row['email'] ?? null,
            'status' => '1',
        ]);
    }
}
