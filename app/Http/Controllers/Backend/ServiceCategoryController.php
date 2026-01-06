<?php

namespace App\Http\Controllers\Backend;


use Exception;
use App\Models\ServiceCategory;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\ServiceCategoryRequest;

class ServiceCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $all_data = ServiceCategory::all();
        return view('backend.pages.service_category.list', ['ServiceCatrgoryinfos' => $all_data]);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.pages.service_category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ServiceCategoryRequest $request): RedirectResponse
    {
        // dd($request->all());
        try {
            $validatedData = $request->validated();
            $validatedData['created_by'] = auth()->user()->id;

            ServiceCategory::create($validatedData);

            return redirect()->route('service_category.index')->with('status', 'Service Category Create Successfully');
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
        $service_category_info = ServiceCategory::find($id);
        return view('backend.pages.service_category.create', ['edit_data' => $service_category_info]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ServiceCategoryRequest $request, string $id): RedirectResponse
    {
        try {
            // Find the existing record or fail
            $serviceCategoryInfo = ServiceCategory::findOrFail($id);
            // Validate incoming request data
            $validatedData = $request->validated();
            // Update the existing record
            $validatedData['updated_by'] = auth()->user()->id;
            $serviceCategoryInfo->update($validatedData);
            // Redirect with success message
            return redirect()->route('service_category.index')->with('status', 'Services Category Updated Successfully');
        } catch (Exception $e) {
            // Redirect with error message in case of failure
            return redirect()->back()->with('error', 'Something went wrong! ' . $e->getMessage());
        }
    }
    public function delete($id)
    {
        $serviceCategoryInfo = ServiceCategory::findOrFail($id);
        $serviceCategoryInfo->delete();
        return redirect()->route('service_category.index')->with('status', 'Services Category Deleted Successfully');
    }

    public function restore($id)
    {
        $serviceCategoryInfo = ServiceCategory::withTrashed()->findOrFail($id);
        $serviceCategoryInfo->restore();
        return redirect()->route('service_category.index')->with('status', 'Services Category Restored Successfully');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
