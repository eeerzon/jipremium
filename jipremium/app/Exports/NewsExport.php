<?php

namespace App\Exports;

use App\news;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class NewsExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return News::select('name', 'email')->get();
    }

    /**
     * Define the headings for the exported Excel sheet.
     *
     * @return array
     */
    public function headings(): array
    {
        return [
            'Name',
            'Email',
        ];
    }
}
