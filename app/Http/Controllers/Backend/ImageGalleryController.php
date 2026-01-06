<?php

namespace App\Http\Controllers\Backend;

use App\Models\ImageGallery;
use App\Http\Controllers\Controller;
use App\Http\Requests\ImageGalleryRequest;

class ImageGalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $all_images = ImageGallery::all();
        return view('backend.pages.image_gallery.create', ['images' => $all_images]);
    }
    /**resources\views\backend\pages\image_gallery
     * Show the form for creating a new resource.
     */
    // public function create()
    // {
    //     return view('backend.pages.image_gallery.create');
    // }
    /**
     * Store a newly created resource in storage.
     */
    public function store(ImageGalleryRequest $request)
    {
        // If Dropzone uploads the file (AJAX request)
        if ($request->hasFile('file')) {
            $image = $request->file('file');
            $path = $image->store('image_gallery/images', 'public');

            ImageGallery::create(['image_path' => $path]);

            return response()->json(['image_path' => $path]);
        }

        // If the final form is submitted
        if ($request->filled('uploaded_files')) {
            $uploadedFiles = json_decode($request->uploaded_files, true);

            foreach ($uploadedFiles as $filePath) {
                ImageGallery::create(['image_path' => $filePath]);
            }

            return redirect()->route('image_gallery.index')->with('status', 'Gallery Images Added Successfully');
        }

        return redirect()->back()->with('error', 'No image was uploaded.');
    }
}
