<?php

namespace App\Http\Controllers\Backend;

use Exception;
use App\Models\Tag;
use App\Models\BlogCategory;
use App\Models\BlogCategoryTags;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\BlogCategoryRequest;

class BlogCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $all_data = BlogCategory::with('blogCategoryTagInfo')->get();
        // dd($all_data);
        return view('backend.pages.blog_category.list', ['BlogCatrgoryinfos' => $all_data]);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $all_tag = Tag::pluck('name', 'id');
        return view('backend.pages.blog_category.create', ['tags' => $all_tag]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BlogCategoryRequest $request): RedirectResponse
    {
        DB::beginTransaction(); // Start transaction

        try {
            $validatedData = $request->validated();
            $validatedData['created_by'] = auth()->id();

            // Create blog category
            $blogCategory = BlogCategory::create($validatedData);

            // If blog category is created and tags exist, insert them in bulk
            if ($blogCategory && is_array($request->tag_id) && count($request->tag_id) > 0) {
                $tagData = array_map(fn($tagId) => [
                    'blog_category_id' => $blogCategory->id,
                    'tag_id' => $tagId,
                    'created_by' => auth()->id(),
                    'created_at' => now(),
                    'updated_at' => now(),
                ], $request->tag_id);

                BlogCategoryTags::insert($tagData); // Bulk insert for better performance
            }

            DB::commit(); // Commit transaction

            return redirect()->route('blog_category.index')->with('status', 'Blog Category Created Successfully');
        } catch (Exception $e) {
            // dd($e);
            DB::rollBack(); // Rollback transaction if something goes wrong
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
        $blog_category_info = BlogCategory::find($id);
        return view('backend.pages.blog_category.create', ['edit_data' => $blog_category_info]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BlogCategoryRequest $request, BlogCategory $blogCategory): RedirectResponse
    {
        DB::beginTransaction(); // Start transaction

        try {
            $validatedData = $request->validated();
            $validatedData['updated_by'] = auth()->id();

            // Update blog category
            $blogCategory->update($validatedData);

            // Remove old tag associations
            BlogCategoryTags::where('blog_category_id', $blogCategory->id)->delete();

            // If new tags exist, insert them
            if (is_array($request->tag_id) && count($request->tag_id) > 0) {
                $tagData = array_map(fn($tagId) => [
                    'blog_category_id' => $blogCategory->id,
                    'tag_id' => $tagId,
                    'created_by' => auth()->id(),
                    'created_at' => now(),
                    'updated_at' => now(),
                ], $request->tag_id);

                BlogCategoryTags::insert($tagData); // Bulk insert for efficiency
            }

            DB::commit(); // Commit transaction

            return redirect()->route('blog_category.index')->with('status', 'Blog Category Updated Successfully');
        } catch (Exception $e) {
            DB::rollBack(); // Rollback transaction in case of error
            return redirect()->back()->with('error', 'Something went wrong! ' . $e->getMessage());
        }
    }

    public function delete($id)
    {
        $BlogCategoryInfo = BlogCategory::findOrFail($id);
        $BlogCategoryInfo->delete();
        return redirect()->route('blog_category.index')->with('status', 'Blog Category Deleted Successfully');
    }

    public function restore($id)
    {
        $BlogCategoryInfo = BlogCategory::withTrashed()->findOrFail($id);
        $BlogCategoryInfo->restore();
        return redirect()->route('blog_category.index')->with('status', 'Blog Category Restored Successfully');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
