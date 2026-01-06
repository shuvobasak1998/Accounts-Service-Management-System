<?php

namespace App\Http\Controllers\Backend;

use Exception;
use App\Models\AboutUs;
use App\Models\AboutUsCardInfo;
use App\Models\AboutUsFeatureInfo;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\AboutUsRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

class AboutUsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $all_data = AboutUs::all();
        return view('backend.pages.about_us.list', ['aboutUsinfos' => $all_data]);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.pages.about_us.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AboutUsRequest $request): RedirectResponse
    {
        // dd($request->all());
        DB::beginTransaction();
        try {
            $AboutUsInformationsData = [
                'about_us_top_discription' => $request->about_us_top_discription,
                'about_us_first_image_path' => $request->about_us_first_image_path,
                'about_us_second_image_path' => $request->about_us_second_image_path,
                'about_us_feature_title' => $request->about_us_feature_title,
                'about_us_feature_description' => $request->about_us_feature_description,
                'why_choose_us_description' => $request->why_choose_us_description,
                'topic_title' => json_encode($request->topic_title),
                'percentage_value' => json_encode($request->percentage_value),
                'created_by' => auth()->user()->id,
            ];

            if ($request->hasFile('about_us_first_image_path')) {
                $cardImage = $request->file('about_us_first_image_path');
                $about_us_first_image_path = $cardImage->store('AboutUsInfo/image', 'public');
                $AboutUsInformationsData['about_us_first_image_path'] = $about_us_first_image_path;
            }
            if ($request->hasFile('about_us_second_image_path')) {
                $cardImage = $request->file('about_us_second_image_path');
                $about_us_second_image_path = $cardImage->store('AboutUsInfo/attachment', 'public');
                $AboutUsInformationsData['about_us_second_image_path'] = $about_us_second_image_path;
            }
            $OurAboutUsDataCreate = AboutUs::create($AboutUsInformationsData);

            // AboutUs Feature Info store start
            if ($OurAboutUsDataCreate) {
                if (is_array($request->about_us_feature) && count($request->about_us_feature) > 0) {
                    foreach ($request->about_us_feature as $key => $value) {
                        $OurAboutUsFeatureData = [
                            'about_us_information_id' => $OurAboutUsDataCreate->id,
                            'about_us_feature' => $value,
                            'created_by' => auth()->user()->id,
                        ];
                        AboutUsFeatureInfo::create(
                            $OurAboutUsFeatureData
                        );
                    }
                }
            }
            // AboutUs Feature Info store end

            // About Us Card Info store start
            if ($OurAboutUsDataCreate) {
                if (is_array($request->about_us_card_title) && count($request->about_us_card_title) > 0) {
                    foreach ($request->about_us_card_title as $key => $value) {
                        $OurAboutUsCardData = [
                            'about_us_information_id' => $OurAboutUsDataCreate->id,
                            'about_us_card_title' => $value,
                            'about_us_card_discription' => $request->about_us_card_discription[$key],
                            'created_by' => auth()->user()->id,
                        ];
                        AboutUsCardInfo::create(
                            $OurAboutUsCardData
                        );
                    }
                }
            }
            // About Us Card Info store end

            DB::commit();
            return redirect()->route('about_us.index')->with('status', 'About Us Information Create Successfully');
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
        $about_us_info = AboutUs::find($id);
        return view('backend.pages.about_us.create', ['edit_data' => $about_us_info]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AboutUsRequest $request, $id): RedirectResponse
    {
        DB::beginTransaction();
        try {
            // Find the existing AboutUs record by ID
            $aboutUs = AboutUs::findOrFail($id);

            // Prepare the update data for AboutUs fields
            $aboutUs->about_us_top_discription = $request->about_us_top_discription;
            $aboutUs->about_us_feature_title = $request->about_us_feature_title;
            $aboutUs->about_us_feature_description = $request->about_us_feature_description;
            $aboutUs->why_choose_us_description = $request->why_choose_us_description;
            $aboutUs->topic_title = json_encode($request->topic_title);
            $aboutUs->percentage_value = json_encode($request->percentage_value);
            $aboutUs->updated_by = auth()->user()->id;

            // Handle about_us_first_image_path
            if ($request->hasFile('about_us_first_image_path')) {
                if ($aboutUs->about_us_first_image_path) {
                    Storage::disk('public')->delete($aboutUs->about_us_first_image_path);
                }
                $aboutUs->about_us_first_image_path = $request->file('about_us_first_image_path')->store('AboutUsInfo/image', 'public');
            }

            // Handle about_us_second_image_path
            if ($request->hasFile('about_us_second_image_path')) {
                if ($aboutUs->about_us_second_image_path) {
                    Storage::disk('public')->delete($aboutUs->about_us_second_image_path);
                }
                $aboutUs->about_us_second_image_path = $request->file('about_us_second_image_path')->store('AboutUsInfo/attachment', 'public');
            }

            // Save the updated AboutUs record
            $aboutUs->save();

            // **Update AboutUsFeatureInfo (Avoid duplicate entries)**

            $existingFeatures = AboutUsFeatureInfo::where('about_us_information_id', $aboutUs->id)->get();
            $newFeatures = collect($request->about_us_feature);

            // Delete removed features
            $existingFeatures->each(function ($existingFeature) use ($newFeatures) {
                if (!$newFeatures->contains($existingFeature->about_us_feature)) {
                    $existingFeature->delete(); // Delete removed features
                }
            });

            // Insert or update new features
            foreach ($newFeatures as $feature) {
                AboutUsFeatureInfo::updateOrCreate(
                    [
                        'about_us_information_id' => $aboutUs->id,
                        'about_us_feature' => $feature,
                    ],
                    [
                        'created_by' => auth()->user()->id,
                        'updated_at' => now(),
                    ]
                );
            }

            // **Update AboutUsCardInfo (Avoid duplicate entries)**

            $existingCards = AboutUsCardInfo::where('about_us_information_id', $aboutUs->id)->get();
            $newCards = collect($request->about_us_card_title);

            // Delete removed cards
            $existingCards->each(function ($existingCard) use ($newCards) {
                if (!$newCards->contains($existingCard->about_us_card_title)) {
                    $existingCard->delete(); // Delete removed cards
                }
            });

            // Insert or update new cards
            foreach ($newCards as $key => $title) {
                AboutUsCardInfo::updateOrCreate(
                    [
                        'about_us_information_id' => $aboutUs->id,
                        'about_us_card_title' => $title,
                    ],
                    [
                        'about_us_card_discription' => $request->about_us_card_discription[$key] ?? null,
                        'created_by' => auth()->user()->id,
                        'updated_at' => now(),
                    ]
                );
            }

            DB::commit();
            return redirect()->route('about_us.index')->with('status', 'About Us Information Updated Successfully');
        } catch (Exception $e) {
            // dd($e);
            DB::rollBack();
            return redirect()->back()->with('error', 'Something went wrong! ' . $e->getMessage());
        }
    }



    public function delete($id)
    {
        DB::beginTransaction();
        try {
            // Find the AboutUs entry
            $aboutUs = AboutUs::findOrFail($id);
            // Store the user who deleted the record
            $aboutUs->update(['deleted_by' => auth()->id()]);
            // Delete associated images if they exist
            if ($aboutUs->about_us_first_image_path) {
                Storage::disk('public')->delete($aboutUs->about_us_first_image_path);
            }
            if ($aboutUs->about_us_second_image_path) {
                Storage::disk('public')->delete($aboutUs->about_us_second_image_path);
            }
            // Delete related AboutUsFeatureInfo entries
            AboutUsFeatureInfo::where('about_us_information_id', $aboutUs->id)->delete();
            // Delete related AboutUsCardInfo entries
            AboutUsCardInfo::where('about_us_information_id', $aboutUs->id)->delete();
            // Delete the main AboutUs record
            $aboutUs->delete();

            DB::commit();
            return redirect()->route('about_us.index')->with('status', 'About Us Information Deleted Successfully');
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Something went wrong! ' . $e->getMessage());
        }
    }

    public function restore($id)
    {
        $serviceinfo = AboutUs::withTrashed()->findOrFail($id);
        $serviceinfo->restore();
        return redirect()->route('about_us.index')->with('status', 'Services Information Restored Successfully');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
