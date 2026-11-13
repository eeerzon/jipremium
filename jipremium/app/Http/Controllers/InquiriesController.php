<?php

namespace App\Http\Controllers;

use App\inquiries;
use Illuminate\Http\Request;

class InquiriesController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $inquiries = inquiries::latest()->paginate(5);
        return view('backend.inquiries.list',compact('inquiries'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create(){
        return view('frontend.inquiries');
    }

    public function store(Request $request){
        //function in frontcontroller@inquiriesStore
    }

    public function show(inquiries $inquiries){
        //
    }

    public function edit($id){
        // $inquiries = inquiries::find($id);
        $inquiries = inquiries::findOrFail($id);
        return view('backend.inquiries.edit',compact('inquiries'));
    }

    public function update(Request $request, $id){
        // $inquiries = inquiries::find($id);
        $inquiries = inquiries::findOrFail($id);
        $inquiries->first_name = $request->get('first_name');
        $inquiries->last_name = $request->get('last_name');
        $inquiries->company= $request->get('company');
        $inquiries->country = $request->get('country');
        $inquiries->inquiry = $request->get('inquiry');

        $inquiries->save();
        return redirect()->route('inquiries.index')
                        ->with('success','Data Has Been Updated !!');
    }

    public function destroy($id){
        // $inquiries = inquiries::find($id);
        $inquiries = inquiries::findOrFail($id);
        $inquiries->delete();

        return redirect()->route('inquiries.index')
                        ->with('danger','Data Has Been Deleted !!');
    }
}
