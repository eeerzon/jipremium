<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\product;
use App\brand;
use App\category;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ProductImport;
use Maatwebsite\Excel\Validators\ValidationException;

class ProductController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function import(Request $request){
        $file = $request->file('excel_file');

        try {
            // Excel::import(new ProductImport, $file);
        // $file = $request->file('file');
        $file = $request->file('excel_file');
		Excel::import(new ProductImport($file->getRealPath()), $file);
        } catch (ValidationException $e) {
      //  dd($e);
            return redirect()->back()->with('danger', 'Products not Imported!! Please check id and empty row');
        } catch (\Exception $e) {
            Log::error('Product import failed: ' . $e->getMessage());
            return redirect()->back()->with('danger', 'Products not Imported!! Please check id and empty row');
        }

        return redirect()->back()->with('success', 'Products imported successfully');
    }

    public function index()
    {
        $product = product::orderBy('created_at', 'desc')->paginate(25);
        return view('backend.brand.product.list',compact('product'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        $brand = brand::all();
        $category = category::all();
        return view('backend.brand.product.create', compact('brand', 'category'));
    }


    public function store(Request $request)
    {
        $data = $request->all();
        product::create($data);

        return redirect()->route('product.index')->with('success', 'Product created successfully!');
    }

    public function show(product $product)
    {
        //
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $brands = Brand::all();
        $categories = Category::all();
        return view('backend.brand.product.edit',compact('product', 'brands', 'categories'));
    }


    public function update(Request $request, product $product)
    {
        $input = $request->all();
        $product->update($input);

        return redirect()->route('product.index')->with('success', 'Product updated successfully!');
    }

    public function destroy($id)
    {
        // $product = product::find($id);
        $product = product::findOrFail($id);
        $product->delete();

        return redirect()->route('product.index')->with('danger','Product Has Been Deleted !!');
    }

    public function deleteSelected(Request $request)
    {
        $selectedIds = $request->input('selectedIds', []);

        if (empty($selectedIds)) {
            return response()->json(['success' => false]);
        }

        // Delete selected data
        product::whereIn('id', $selectedIds)->delete();

        return response()->json(['success' => true]);
    }
}
