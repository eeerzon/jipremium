<?php

namespace App\Http\Controllers;

use App\brand;
use App\product;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\BrandImport;

class BrandController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }

    public function import(Request $request){
        $file = $request->file('excel_file');

        try {
            Excel::import(new BrandImport, $file);
        } catch (ValidationException $e) {
            return redirect()->back()->with('danger', 'Brands not Imported!! Please check id and empty row');
        } catch (\Exception $e) {
            return redirect()->back()->with('danger', 'Brands not Imported!! Please check id and empty row');
        }

        return redirect()->back()->with('success', 'Categories imported successfully');
    }

    public function index()
    {
        // $brand = brand::orderBy('created_at', 'desc')->paginate(25);
        $brand = brand::orderBy('id', 'desc')->paginate(25);
        return view('backend.brand.list', compact('brand'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        return view('backend.brand.create');
    }


    public function store(Request $request)
    {
        $data = $request->validate([
            'brand_name' => 'required|string|max:255',
            'brand_desc' => 'nullable|string',
            'booth_no' => 'nullable|string',
            'ceo_name' => 'nullable|string|max:255',
            'website' => 'nullable|url|max:255',
        ]);

        brand::create($data);
        return redirect()->route('brand.index')->with('success', 'Brand Has Been Input!!');
    }

    public function show(brand $brand)
    {
        //
    }

    public function edit($id)
    {
        // $brand = brand::find($id);
        $brand = brand::findOrFail($id);
        return view('backend.brand.edit',compact('brand'));
    }


    public function update(Request $request, $id)
    {
        $randomId = rand(1, 99999999);
        $brand = brand::findOrFail($id);
        $data = $request->validate([
            'brand_name' => 'required|string|max:255',
            'brand_desc' => 'nullable|string',
            'booth_no' => 'nullable|string',
            'ceo_name' => 'nullable|string|max:255',
            'website' => 'nullable|url|max:255',
        ]);

        $brand->update($data);
        return redirect()->route('brand.index')->with('success', 'Brand updated successfully!');
    }

    public function destroy($id)
    {
        $brand = brand::find($id);

        if ($brand) {
            $brand->products()->delete();

            $brand->delete();
        }

        return redirect()->route('brand.index')
                        ->with('danger','Data Has Been Deleted !!');
    }

    public function deleteSelected(Request $request)
    {
        $selectedIds = $request->input('selectedIds', []);

        if (empty($selectedIds)) {
            return response()->json(['success' => false]);
        }

        // Same as destroy(): remove the brands' products too, so no orphan products are left behind.
        product::whereIn('brand_id', $selectedIds)->delete();
        brand::whereIn('id', $selectedIds)->delete();

        return response()->json(['success' => true]);
    }

    public function toggleStatus($id)
    {
        $brand = brand::findOrFail($id);
        $brand->status = $brand->status == '1' ? '0' : '1';
        $brand->save();

        return response()->json(['success' => true, 'status' => $brand->status]);
    }
}
