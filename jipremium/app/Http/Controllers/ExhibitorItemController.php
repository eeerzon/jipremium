<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\exhibition;
use App\brand;
use App\category;
use App\product;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

use Response;

class ExhibitorItemController extends Controller
{
    public function home(){
        $exhibition = exhibition::all();
        $bestProducts = Product::with('brand')
            ->where('is_best_product', 'Y')
            ->whereHas('brand', function ($query) {
                $query->where('status', '1');
            })
            ->orderBy('display_order', 'asc')
            ->take(9)
            ->get();

        return view('frontend.exhibitor_item', compact('exhibition', 'bestProducts'));
    }
}