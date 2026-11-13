<?php

namespace App\Http\Controllers;

use App\partners;
use App\PartnerAsset;
use Illuminate\Http\Request;

class PartnersController extends Controller
{

    public function home(){
        $partners = partners::all();
        $partnerAsset = PartnerAsset::latest()->get();

        return view('frontend.partner', compact('partners','partnerAsset'));
    }

    public function index(){
        $partners = Partners::latest()->paginate(5);
        return view('backend.partner.list',compact('partners'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    
    public function create(){
        return view('backend.partner.create');
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required',
        ]);
        Partners::create($request->all());
        return redirect()->route('partners.index')->with('success','Data Has Been Input !!');
    }

    public function show(partners $partners){
        //
    }

    public function edit($id){
        // $partners = Partners::find($id);
        $partners = Partners::findOrFail($id);
        return view('backend.partner.edit',compact('partners'));
    }

    public function update(Request $request, $id){
        // $partners = Partners::find($id);
        $partners = Partners::findOrFail($id);
        $partners->name = $request->get('name');

        $partners->save();
        return redirect()->route('partners.index')
                        ->with('success','Data Has Been Updated !!');
    }

    public function destroy($id){
        // $partners = Partners::find($id);
        $partners = Partners::findOrFail($id);
        $partners->delete();

        return redirect()->route('partners.index')
                        ->with('danger','Data Has Been Deleted !!');
    }
}
