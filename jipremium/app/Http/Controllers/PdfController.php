<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;

class PdfController extends Controller
{
    public function displayPdf($filename)
    {
        $filePath = 'public/pdfs/web_leaflet.pdf';

        if (!file_exists($filePath)) {
            abort(404);
        }

        $fileContents = file_get_contents($filePath);

        return response($fileContents, 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="' . $filename . '"',
        ]);
    }
}
