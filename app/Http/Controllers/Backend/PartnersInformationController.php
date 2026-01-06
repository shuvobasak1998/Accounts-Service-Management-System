<?php

namespace App\Http\Controllers\Backend;

use Exception;
use App\Models\PartnersInformation;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\PartnersInformationRequest;

class PartnersInformationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $all_data = PartnersInformation::all();
        return view('backend.pages.patners.list', ['partnersinfos' => $all_data]);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.pages.patners.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PartnersInformationRequest $request): RedirectResponse
    {
        try {
            $validatedData = $request->validated();

            if ($request->hasFile('card_image_path')) {
                $cardImage = $request->file('card_image_path');
                $card_image_path = $cardImage->store('PartnersInfo/cardimage', 'public');
                $validatedData['card_image_path'] = $card_image_path;
            }
            $validatedData['created_by'] = auth()->user()->id;
            PartnersInformation::create($validatedData);

            return redirect()->route('partnersinfo.index')->with('status', 'Partners Information Create Successfully');
        } catch (Exception $e) {
            // dd($e);
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
        $patners_info = PartnersInformation::find($id);
        return view('backend.pages.patners.create', ['edit_data' => $patners_info]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PartnersInformationRequest $request, string $id): RedirectResponse
    {
        try {
            // Find the existing record or fail
            $partners_info = PartnersInformation::findOrFail($id);

            // Validate incoming request data
            $validatedData = $request->validated();

            // Handle file upload if a new image is uploaded
            if ($request->hasFile('card_image_path')) {
                // Delete the old image if exists (optional)
                if ($partners_info->card_image_path) {
                    Storage::disk('public')->delete($partners_info->card_image_path);
                }
                // Store the new image
                $cardImage = $request->file('card_image_path');
                $services_image_path = $cardImage->store('PartnersInfo/cardimage', 'public');
                $validatedData['card_image_path'] = $services_image_path;
            }

            // Update the existing record
            $validatedData['updated_by'] = auth()->user()->id;
            $partners_info->update($validatedData);

            // Redirect with success message
            return redirect()->route('partnersinfo.index')->with('status', 'Partners Information Updated Successfully');
        } catch (Exception $e) {
            // Redirect with error message in case of failure
            return redirect()->back()->with('error', 'Something went wrong! ' . $e->getMessage());
        }
    }
    public function delete($id)
    {
        $partnersinfo = PartnersInformation::findOrFail($id);
        $partnersinfo->delete();
        return redirect()->route('partnersinfo.index')->with('status', 'Partners Information Deleted Successfully');
    }

    public function restore($id)
    {
        $partnersinfo = PartnersInformation::withTrashed()->findOrFail($id);
        $partnersinfo->restore();
        return redirect()->route('partnersinfo.index')->with('status', 'Partners Information Restored Successfully');
    }
}
