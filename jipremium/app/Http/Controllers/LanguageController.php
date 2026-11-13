<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;

class LanguageController extends Controller
{
    public function switchLang(Request $request)
    {
        if (array_key_exists($request->lang, config('app.available_locales'))) {
            Session::put('applocale', $request->lang);
        }
        return redirect()->back();
    }
}
