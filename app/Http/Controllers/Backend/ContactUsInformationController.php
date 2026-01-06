<?php

namespace App\Http\Controllers\Backend;

use Exception;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\ContactUsInformation;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use App\Models\ContactUsFrequentlyAskQuestion;
use App\Http\Requests\ContactUsInformationRequest;

class ContactUsInformationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $all_data = ContactUsInformation::with('ContactUsFrequentlyAskQuestion')->get();
        return view('backend.pages.contact_information.list', ['ContactUsInformationinfos' => $all_data]);
    }
    /**resources\views\backend\pages\contact_information
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.pages.contact_information.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ContactUsInformationRequest $request): RedirectResponse
    {
        // dd($request->all());
        DB::beginTransaction();

        try {
            $ContactUsInformationData = [
                'contact_us_top_title' => $request->contact_us_top_title,
                'contact_us_top_discription' => $request->contact_us_top_discription,
                'created_by' => auth()->user()->id,
            ];

            // Handle image upload
            if ($request->hasFile('contact_us_image_path')) {
                $cardImage = $request->file('contact_us_image_path');
                $contact_us_image_path = $cardImage->store('ContactUsInformation/image', 'public');
                $ContactUsInformationData['contact_us_image_path'] = $contact_us_image_path;
            }

            // Store data
            $ContactUsInformationDataCreate = ContactUsInformation::create($ContactUsInformationData);

            if ($ContactUsInformationDataCreate) {
                if (is_array($request->title) && count($request->title) > 0) {
                    foreach ($request->title as $key => $value) {
                        $ContactUsInformationDetailsData = [
                            'contact_us_information_id' => $ContactUsInformationDataCreate->id,
                            'title' => $value,
                            'discription' => $request->discription[$key],
                            'created_by' => auth()->user()->id,
                        ];
                        ContactUsFrequentlyAskQuestion::create(
                            $ContactUsInformationDetailsData
                        );
                    }
                }
            }

            DB::commit();
            return redirect()->route('contact_us.index')->with('status', 'Contact Us Information Created Successfully');
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
        $contact_info = ContactUsInformation::find($id);
        return view('backend.pages.contact_information.create', ['edit_data' => $contact_info]);
    }

    /**
     * Update the specified resource in storage.
     */

    // public function update(ContactUsInformationRequest $request, $id): RedirectResponse
    // {
    //     DB::beginTransaction();

    //     try {
    //         // Find the existing record
    //         $ContactUsInformationData = ContactUsInformation::findOrFail($id);

    //         // Prepare update data
    //         $updateData = [
    //             'contact_us_top_title' => $request->contact_us_top_title,
    //             'contact_us_top_discription' => $request->contact_us_top_discription,
    //             'updated_by' => auth()->user()->id,
    //         ];

    //         // Handle image upload
    //         if ($request->hasFile('contact_us_image_path')) {
    //             // Delete the old image
    //             Storage::disk('public')->delete($ContactUsInformationData->contact_us_image_path);

    //             // Store new image
    //             $imagePath = $request->file('contact_us_image_path')->store('ContactUsInformation/image', 'public');
    //             $updateData['contact_us_image_path'] = $imagePath;
    //         }

    //         // Update ContactUsInformation record
    //         $ContactUsInformationData->update($updateData);

    //         // Update ContactUsFrequentlyAskQuestion records (avoid duplicate entries)
    //         if (!empty($request->title)) {
    //             foreach ($request->title as $key => $title) {
    //                 ContactUsFrequentlyAskQuestion::updateOrCreate(
    //                     [
    //                         'contact_us_information_id' => $ContactUsInformationData->id,
    //                         'title' => $title,
    //                     ],
    //                     [
    //                         'discription' => $request->discription[$key] ?? null,
    //                         'updated_by' => auth()->user()->id,
    //                         'updated_at' => now(),
    //                     ]
    //                 );
    //             }
    //         }

    //         DB::commit();
    //         return redirect()->route('contact_us.index')->with('status', 'Contact Us Information Updated Successfully');
    //     } catch (Exception $e) {
    //         DB::rollBack();
    //         return redirect()->back()->with('error', 'Something went wrong! ' . $e->getMessage());
    //     }
    // }
    public function update(ContactUsInformationRequest $request, $id): RedirectResponse
    {
        DB::beginTransaction();

        try {
            // Find the existing ContactUsInformation record by ID
            $ContactUsInformationData = ContactUsInformation::findOrFail($id);

            // Prepare update data
            $updateData = [
                'contact_us_top_title' => $request->contact_us_top_title,
                'contact_us_top_discription' => $request->contact_us_top_discription,
                'updated_by' => auth()->user()->id,
            ];

            // Handle image upload
            if ($request->hasFile('contact_us_image_path')) {
                // Delete the old image
                Storage::disk('public')->delete($ContactUsInformationData->contact_us_image_path);

                // Store new image
                $imagePath = $request->file('contact_us_image_path')->store('ContactUsInformation/image', 'public');
                $updateData['contact_us_image_path'] = $imagePath;
            }

            // Update ContactUsInformation record
            $ContactUsInformationData->update($updateData);

            // **Fix for ContactUsFrequentlyAskQuestion (Avoid duplicate entries)**

            // Get existing questions for this ContactUsInformation
            $existingQuestions = ContactUsFrequentlyAskQuestion::where('contact_us_information_id', $ContactUsInformationData->id)->get();
            $newTitles = collect($request->title);

            // Delete removed questions
            $existingQuestions->each(function ($existingQuestion) use ($newTitles) {
                if (!$newTitles->contains($existingQuestion->title)) {
                    $existingQuestion->delete(); // Delete removed question
                }
            });

            // Insert or update new questions
            foreach ($newTitles as $key => $title) {
                ContactUsFrequentlyAskQuestion::updateOrCreate(
                    [
                        'contact_us_information_id' => $ContactUsInformationData->id,
                        'title' => $title,
                    ],
                    [
                        'discription' => $request->discription[$key] ?? null,
                        'updated_by' => auth()->user()->id,
                        'updated_at' => now(),
                    ]
                );
            }

            DB::commit();
            return redirect()->route('contact_us.index')->with('status', 'Contact Us Information Updated Successfully');
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Something went wrong! ' . $e->getMessage());
        }
    }



    public function delete($id)
    {
        DB::beginTransaction();

        try {
            // Find the ContactUsInformation record
            $contactUsInformation = ContactUsInformation::findOrFail($id);

            // Delete associated FAQ records
            ContactUsFrequentlyAskQuestion::where('contact_us_information_id', $id)->delete();

            // Delete the image file if it exists
            if ($contactUsInformation->contact_us_image_path) {
                Storage::disk('public')->delete($contactUsInformation->contact_us_image_path);
            }

            // Delete the main record
            $contactUsInformation->delete();

            DB::commit();
            return redirect()->route('contact_us.index')->with('status', 'Contact Us Information Deleted Successfully');
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Something went wrong! ' . $e->getMessage());
        }
    }

    public function restore($id)
    {
        $partnersinfo = ContactUsInformation::withTrashed()->findOrFail($id);
        $partnersinfo->restore();
        return redirect()->route('partnersinfo.index')->with('status', 'Partners Information Restored Successfully');
    }
}
