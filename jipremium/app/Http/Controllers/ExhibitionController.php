<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\exhibition;

class ExhibitionController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $exhibition = exhibition::latest()->paginate(5);
        return view('backend.exhibition.list',compact('exhibition'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function exhibit(){
        return view('frontend.exhibit', compact('exhibit'));
    }

    public function create(){
        return view('backend.exhibition.create');
    }

    public function store(Request $request){
        $request->validate([
            'image' => 'required|image|mimes:jpeg,jpg,png,gif,webp|max:9000',
        ]);

        $input = $request->all();

        if ($image = $request->file('image')) {
            $destinationPath = 'public/image/';
            $profileImage = date('YmdHis') . "." . $image->extension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }

        exhibition::create($input);

        return redirect()->route('exhibition.index')->with('success','Data Has Been Input !!');
    }


    public function show(exhibition $exhibition){
        //
    }

    public function edit($id){
        // $exhibition = exhibition::find($id);
        $exhibition = exhibition::findOrFail($id);
        return view('backend.exhibition.edit',compact('exhibition'));
    }

    public function update(Request $request, exhibition $exhibition){
        $request->validate([
            'image' => 'nullable|image|mimes:jpeg,jpg,png,gif,webp|max:9000',
        ]);

        $input = $request->all();

        if ($image = $request->file('image')) {
            $destinationPath = 'public/image/';
            $profileImage = date('YmdHis') . "." . $image->extension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }else{
            unset($input['image']);
        }

        $exhibition->update($input);

        return redirect()->route('exhibition.index')
                        ->with('success','Image updated successfully');
    }

    public function destroy($id){
        // $exhibition = exhibition::find($id);
        $exhibition = exhibition::findOrFail($id);
        $exhibition->delete();

        return redirect()->route('exhibition.index')
                        ->with('danger','Data Has Been Deleted !!');
    }
}
