<?php

namespace App\Http\Controllers\Backend;

use Exception;
use App\Models\BlogDetails;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\BlogDetailsRequest;

class BlogDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $all_data = BlogDetails::with('BlogCategory')->get();
        return view('backend.pages.blog_detail.list', ['BlogDetailinfos' => $all_data]);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $blog_category = BlogCategory::pluck('name', 'id');
        return view('backend.pages.blog_detail.create', ['blog_categoryes' => $blog_category]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BlogDetailsRequest $request): RedirectResponse
    {
        // dd($request->all());
        try {
            $BlogDetailsData = [
                'blog_category_id' => $request->blog_category_id,
                'card_title' => $request->card_title,
                'card_discription' => $request->card_discription,
                'blog_detail_title' => $request->blog_detail_title,
                'blog_detail_discription' => $request->blog_detail_discription,
                'created_by' => auth()->user()->id,
            ];

            // Handle image upload
            if ($request->hasFile('card_image_path')) {
                $cardImage = $request->file('card_image_path');
                $card_image_path = $cardImage->store('BlogDetails/image', 'public');
                $BlogDetailsData['card_image_path'] = $card_image_path;
            }
            if ($request->hasFile('blog_detail_image_path')) {
                $cardImage = $request->file('blog_detail_image_path');
                $blog_detail_image_path = $cardImage->store('BlogDetails/image', 'public');
                $BlogDetailsData['blog_detail_image_path'] = $blog_detail_image_path;
            }

            // Store data
            BlogDetails::create($BlogDetailsData);

            return redirect()->route('blog_details.index')->with('status', 'Blog Detail Information Created Successfully');
        } catch (Exception $e) {
            // dd($e);
            DB::rollBack();
            return redirect()->back()->with('error', 'Something went wrong! ' . $e->getMessage());
        }
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $blog_category = BlogCategory::pluck('name', 'id');
        $blog_detail_info = BlogDetails::find($id);
        return view('backend.pages.blog_detail.create', ['edit_data' => $blog_detail_info, 'blog_categoryes' => $blog_category]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BlogDetailsRequest $request, $id): RedirectResponse
    {
        try {
            $blogDetails = BlogDetails::findOrFail($id);

            $updateData = [
                'blog_category_id' => $request->blog_category_id,
                'card_title' => $request->card_title,
                'card_discription' => $request->card_discription,
                'blog_detail_title' => $request->blog_detail_title,
                'blog_detail_discription' => $request->blog_detail_discription,
                'updated_by' => auth()->user()->id,
            ];

            // Handle image update
            if ($request->hasFile('card_image_path')) {
                // Delete old image if exists
                if ($blogDetails->card_image_path) {
                    Storage::disk('public')->delete($blogDetails->card_image_path);
                }
                $cardImage = $request->file('card_image_path');
                $updateData['card_image_path'] = $cardImage->store('BlogDetails/image', 'public');
            }

            if ($request->hasFile('blog_detail_image_path')) {
                // Delete old image if exists
                if ($blogDetails->blog_detail_image_path) {
                    Storage::disk('public')->delete($blogDetails->blog_detail_image_path);
                }
                $blogDetailImage = $request->file('blog_detail_image_path');
                $updateData['blog_detail_image_path'] = $blogDetailImage->store('BlogDetails/image', 'public');
            }

            // Update data
            $blogDetails->update($updateData);

            return redirect()->route('blog_details.index')->with('status', 'Blog Detail Information Updated Successfully');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Something went wrong! ' . $e->getMessage());
        }
    }


    public function delete($id)
    {
        try {
            $blogDetails = BlogDetails::findOrFail($id);
            $blogDetails->update(['deleted_by' => auth()->user()->id]);
            $blogDetails->delete();

            return redirect()->route('blog_details.index')->with('status', 'Blog Detail Information Deleted Successfully');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Something went wrong! ' . $e->getMessage());
        }
    }

    public function restore($id)
    {
        $partnersinfo = BlogDetails::withTrashed()->findOrFail($id);
        $partnersinfo->restore();
        return redirect()->route('partnersinfo.index')->with('status', 'Partners Information Restored Successfully');
    }
}
