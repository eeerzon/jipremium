<?php
namespace App\Imports;

use App\product;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use PhpOffice\PhpSpreadsheet\IOFactory;

class ProductImport implements ToModel, WithHeadingRow
{
    protected array $hyperlinks = [];
    protected int $currentRow = 1; // row 1 = heading, data mulai row 2

    public function __construct(string $filePath)
    {
        $spreadsheet = IOFactory::load($filePath);
        $sheet = $spreadsheet->getActiveSheet();
        $highestRow = $sheet->getHighestRow();

        // baca semua hyperlink di kolom E (product_image) sekali di awal
        for ($rowIndex = 2; $rowIndex <= $highestRow; $rowIndex++) {
            $coordinate = 'E' . $rowIndex;

            if ($sheet->hyperlinkExists($coordinate)) {
                $hyperlink = $sheet->getHyperlink($coordinate);
                if (!$hyperlink->isInternal() && !empty($hyperlink->getUrl())) {
                    $this->hyperlinks[$rowIndex] = $hyperlink->getUrl();
                }
            }
        }
    }

    public function model(array $row)
    {
        $this->currentRow++;

        if (!isset($row['product_name']) || empty($row['product_name'])) {
            return null;
        }

        // kalau ada hyperlink di baris ini, pakai itu; kalau tidak, fallback ke value biasa
        $productImage = $this->hyperlinks[$this->currentRow] ?? ($row['product_image'] ?? null);

        return new product([
            'product_name'  => $row['product_name'] ?? null,
            'product_desc'  => $row['product_desc'] ?? null,
            'brand_id'      => is_numeric($row['brand_id'] ?? null) ? $row['brand_id'] : null,
            'category_id'   => null, // $row['category_id'] ?? null,
            'product_image' => $productImage,
        ]);
    }
}