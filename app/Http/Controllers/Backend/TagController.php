<?php

namespace App\Http\Controllers\Backend;

use Exception;
use App\Models\Tag;
use Illuminate\Http\Request;
use App\Http\Requests\TagRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $all_data = Tag::all();
        return view('backend.pages.tag.list', ['ServiceCatrgoryinfos' => $all_data]);
    }
    /**resources\views\backend\pages\tag
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.pages.tag.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TagRequest $request): RedirectResponse
    {
        // dd($request->all());
        try {
            $validatedData = $request->validated();
            $validatedData['created_by'] = auth()->user()->id;

            Tag::create($validatedData);

            return redirect()->route('tag.index')->with('status', 'Tag Create Successfully');
        } catch (Exception $e) {
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
        $tag_info = Tag::find($id);
        return view('backend.pages.tag.create', ['edit_data' => $tag_info]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TagRequest $request, string $id): RedirectResponse
    {
        try {
            // Find the existing record or fail
            $TagInfo = Tag::findOrFail($id);
            // Validate incoming request data
            $validatedData = $request->validated();
            // Update the existing record
            $validatedData['updated_by'] = auth()->user()->id;
            $TagInfo->update($validatedData);
            // Redirect with success message
            return redirect()->route('tag.index')->with('status', 'Tag Updated Successfully');
        } catch (Exception $e) {
            // Redirect with error message in case of failure
            return redirect()->back()->with('error', 'Something went wrong! ' . $e->getMessage());
        }
    }
    public function delete($id)
    {
        $TagInfo = Tag::findOrFail($id);
        $TagInfo->delete();
        return redirect()->route('tag.index')->with('status', 'Tag Deleted Successfully');
    }

    public function restore($id)
    {
        $TagInfo = Tag::withTrashed()->findOrFail($id);
        $TagInfo->restore();
        return redirect()->route('tag.index')->with('status', 'Tag Restored Successfully');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
