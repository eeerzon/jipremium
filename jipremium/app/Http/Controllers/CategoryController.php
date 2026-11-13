<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\category;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\CategoryImport;

class CategoryController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function import(Request $request)
    {
        // $file = $request->file('excel_file');
        // Excel::import(new CategoryImport, $file);

        $file = $request->file('excel_file');

        try {
            Excel::import(new CategoryImport, $file);
        } catch (\Exception $e) {
            Log::error('Category import failed: ' . $e->getMessage());
            return redirect()->back()->with('danger', 'Categories not Imported!! Please check the file and empty row');
        }

        return redirect()->back()->with('success', 'Categories imported successfully');
    }

    public function index(){
        $category = category::latest()->paginate(25);
        return view('backend.brand.category.list',compact('category'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create(){
        return view('backend.brand.category.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'category_name' => 'required|string|max:255',
        ]);

        category::create($data);
        return redirect()->route('category.index')->with('success', 'category Has Been Input!!');
    }

    public function show(category $category)
    {
        //
    }

    public function edit($id)
    {
        // $category = category::find($id);
        $category = category::findOrFail($id);
        return view('backend.brand.category.edit',compact('category'));
    }


    public function update(Request $request, $id)
    {
        $category = category::findOrFail($id);
        $data = $request->validate([
            'category_name' => 'required|string|max:255',
        ]);

        $category->update($data);

        return redirect()->route('category.index')->with('success', 'category updated successfully!');
    }

    public function destroy($id)
    {
        // $category = category::find($id);
        $category = category::findOrFail($id);
        $category->delete();

        return redirect()->route('category.index')
                        ->with('danger','Data Has Been Deleted !!');
    }
}
