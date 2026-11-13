<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\notice;

class noticeController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $notice = notice::latest()->paginate(5);
        return view('backend.notice.list',compact('notice'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create(){
        return view('backend.notice.create');
    }

    public function store(Request $request){
        $request->validate([
            'asset' => 'required|image|mimes:jpeg,jpg,png,gif,webp|max:9000',
        ]);

        $input = $request->all();

        if ($image = $request->file('asset')) {
            $destinationPath = 'public/image/';
            $profileImage = date('YmdHis') . "." . $image->extension();
            $image->move($destinationPath, $profileImage);
            $input['asset'] = "$profileImage";
        }

        notice::create($input);

        return redirect()->route('notice.index')->with('success','Data Has Been Input !!');
    }


    public function show(notice $notice){
        //
    }

    public function edit($id){
        // $notice = notice::find($id);
        $notice = notice::findOrFail($id);
        return view('backend.notice.edit',compact('notice'));
    }

    public function update(Request $request, notice $notice){
        $request->validate([
            'asset' => 'nullable|image|mimes:jpeg,jpg,png,gif,webp|max:9000',
        ]);

        $input = $request->all();

        if ($image = $request->file('asset')) {
            $destinationPath = 'public/image/';
            $profileImage = date('YmdHis') . "." . $image->extension();
            $image->move($destinationPath, $profileImage);
            $input['asset'] = "$profileImage";
        }else{
            unset($input['asset']);
        }

        $notice->update($input);

        return redirect()->route('notice.index')
                        ->with('success','Data updated successfully');
    }

    public function destroy($id){
        // $notice = notice::find($id);
        $notice = notice::findOrFail($id);
        $notice->delete();

        return redirect()->route('notice.index')
                        ->with('danger','Data Has Been Deleted !!');
    }
}
