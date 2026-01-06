<?php

namespace App\Http\Controllers\Backend;

use Exception;
use Illuminate\Http\Request;
use App\Models\CustomerReview;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\CustomerReviewRequest;

class CustomerReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $all_data = CustomerReview::all();
        return view('backend.pages.customer_review.list', ['customer_reviews' => $all_data]);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.pages.customer_review.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CustomerReviewRequest $request): RedirectResponse
    {
        try {
            $validatedData = $request->validated();

            if ($request->hasFile('customer_image')) {
                $customerImage = $request->file('customer_image');
                $services_image_path = $customerImage->store('ServiceInfo/customerImage', 'public');
                $validatedData['customer_image_path'] = $services_image_path;
            }
            $validatedData['created_by'] = auth()->user()->id;
            CustomerReview::create($validatedData);

            return redirect()->route('customer_review.index')->with('status', 'Customer Review Information Create Successfully');
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
        $service_info = CustomerReview::find($id);
        return view('backend.pages.customer_review.create', ['edit_data' => $service_info]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CustomerReviewRequest $request, string $id): RedirectResponse
    {
        try {
            // Find the existing record or fail
            $customer_review_Info = CustomerReview::findOrFail($id);

            // Validate incoming request data
            $validatedData = $request->validated();

            // Handle file upload if a new image is uploaded
            if ($request->hasFile('customer_image')) {
                // Delete the old image if exists (optional)
                if ($customer_review_Info->customer_image_path) {
                    Storage::disk('public')->delete($customer_review_Info->customer_image_path);
                }
                // Store the new image
                $cardImage = $request->file('customer_image');
                $services_image_path = $cardImage->store('CustomerReviewInfo/customerimage', 'public');
                $validatedData['customer_image_path'] = $services_image_path;
            }

            // Update the existing record
            $validatedData['updated_by'] = auth()->user()->id;
            $customer_review_Info->update($validatedData);

            // Redirect with success message
            return redirect()->route('customer_review.index')->with('status', 'Customer Review Information Updated Successfully');
        } catch (Exception $e) {
            // Redirect with error message in case of failure
            return redirect()->back()->with('error', 'Something went wrong! ' . $e->getMessage());
        }
    }
    public function delete($id)
    {
        $customer_review = CustomerReview::findOrFail($id);
        $customer_review->delete();
        return redirect()->route('customer_review.index')->with('status', 'Customer Review Information Deleted Successfully');
    }

    public function restore($id)
    {
        $customer_review = CustomerReview::withTrashed()->findOrFail($id);
        $customer_review->restore();
        return redirect()->route('customer_review.index')->with('status', 'Customer Review Information Restored Successfully');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
