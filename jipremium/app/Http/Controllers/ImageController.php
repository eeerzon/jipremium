<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\Image;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class ImageController extends Controller
{
    public function showUploadForm()
    {
        $images = DB::table('images')->orderBy('created_at', 'desc')->paginate(25);
        return view('backend.image.upload', compact('images'));
    }

    public function upload(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'images.*' => 'image|mimes:jpeg,jpg,png,gif,webp|max:9000',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with('danger', 'Only image files (jpg, jpeg, png, gif, webp) up to 9MB are allowed.');
        }

        if ($images = $request->file('images')) {
            foreach ($images as $image) {
                // Keep the original name for readability, but take the extension from the file content
                // so a file like "shell.php" can never be stored with an executable extension.
                $originalFilename = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME) . '.' . $image->extension();
                $randomString = Str::random(10);
                $filename = $randomString . '_' . $originalFilename;

                $destinationPath = 'public/images/';
                $image->move($destinationPath, $filename);
                Image::create(['image_path' => $destinationPath . $filename]);
            }
            return redirect()->route('image.upload')->with('success', 'Images uploaded successfully.');
        }
        return redirect()->back()->with('danger', 'No images selected.');
    }

    public function delete($id)
    {
        $image = Image::find($id);

        if (!$image) {
            return redirect()->route('image.upload')->with('danger', 'Image not found.');
        }

        // Delete the image record from the database
        $image->delete();

        return redirect()->route('image.upload')->with('success', 'Image has been deleted.');
    }

    public function deleteSelected(Request $request)
    {
        $selectedIds = $request->input('selectedIds', []);

        if (empty($selectedIds)) {
            return response()->json(['success' => false]);
        }

        // Delete selected data
        Image::whereIn('id', $selectedIds)->delete();

        return response()->json(['success' => true]);
    }


}
