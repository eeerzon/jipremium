<?php

namespace App\Http\Controllers;

use App\news;
use Illuminate\Http\Request;
use App\Exports\NewsExport;
use Maatwebsite\Excel\Facades\Excel;

class NewsController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $news = news::latest()->paginate(20);
        return view('backend.news.list',compact('news'))->with('i', (request()->input('page', 1) - 1) * 20);
    }

    public function create(){
        return view('frontend.welcome');
    }

    public function export(){
        return Excel::download(new NewsExport, 'news_subscription.xlsx');
    }

    public function store(Request $request){
       //function in frontcontroller@newsStore
    }

    public function show(news $news){
        //
    }

    public function edit($id){
        // $news = news::find($id);
        $news = news::findOrFail($id);
        return view('backend.news.edit',compact('news'));
    }

    public function update(Request $request, $id){
        // $news = news::find($id);
        $news = news::findOrFail($id);
        $news->name = $request->get('name');
        $news->email = $request->get('email');

        $news->save();
        return redirect()->route('news.index')
                        ->with('success','Data Has Been Updated !!');
    }

    public function destroy($id){
        // $news = news::find($id);
        $news = news::findOrFail($id);
        $news->delete();

        return redirect()->route('news.index')
                        ->with('danger','Data Has Been Deleted !!');
    }
}
