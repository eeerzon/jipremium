<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PartnerAsset;
use App\partners;

class PartnerAssetController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function user(){
        return $this->belongsTo('App\partners','partners_id','id');
    }

    public function index(){
        $partners = partners::latest()->get();
        $partnerAsset = PartnerAsset::latest()->paginate(5);

        return view('backend.PartnerAsset.list',compact('partnerAsset','partners'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create(){
        $partners = partners::latest()->get();
        $partnerAsset = PartnerAsset::latest()->paginate(5);
        return view('backend.PartnerAsset.create', compact('partnerAsset', 'partners'));
    }

    public function store(Request $request){
        $request->validate([
            'img' => 'required|image|mimes:jpeg,jpg,png,gif,webp|max:9000',
        ]);

        $input = $request->all();

        if ($image = $request->file('img')) {
            $destinationPath = 'public/image/';
            $profileImage = date('YmdHis') . "." . $image->extension();
            $image->move($destinationPath, $profileImage);
            $input['img'] = "$profileImage";
        }

        PartnerAsset::create($input);

        return redirect()->route('asset.index')->with('success','Data Has Been Input !!');
    }

    public function show(PartnerAsset $partnerAsset){
        //
    }

    public function edit($id){
        // $partnerAsset = PartnerAsset::find($id);
        $partnerAsset = PartnerAsset::findOrFail($id);
        $partners = partners::find($id);

        return view('backend.PartnerAsset.edit',compact('partnerAsset', 'partners'));
    }

    // The route is PUT asset/{id}, so a PartnerAsset type-hint was never bound and the update saved nothing.
    // public function update(Request $request, PartnerAsset $partnerAsset){
    public function update(Request $request, $id){
        $partnerAsset = PartnerAsset::findOrFail($id);

        $request->validate([
            'img' => 'nullable|image|mimes:jpeg,jpg,png,gif,webp|max:9000',
        ]);

        $input = $request->all();

        if ($image = $request->file('img')) {
            $destinationPath = 'public/image/';
            $profileImage = date('YmdHis') . "." . $image->extension();
            $image->move($destinationPath, $profileImage);
            $input['img'] = "$profileImage";
        }else{
            unset($input['img']);
        }

        $partnerAsset->update($input);

        return redirect()->route('asset.index')
                        ->with('success','Image updated successfully');
    }

    public function destroy($id){
        // $partnerAsset = PartnerAsset::find($id);
        $partnerAsset = PartnerAsset::findOrFail($id);
        $partnerAsset->delete();

        return redirect()->route('asset.index')
                        ->with('danger','Data Has Been Deleted !!');
    }
}
