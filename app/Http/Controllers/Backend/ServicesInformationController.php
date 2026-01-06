<?php

namespace App\Http\Controllers\Backend;

use Exception;
use Illuminate\Http\Request;
use App\Models\ServiceBenefit;
use App\Models\ServiceCategory;
use Illuminate\Support\Facades\DB;
use App\Models\ServicesInformation;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\ServicesInformationRequest;
use App\Models\ServiceInformationFrequentlyAskQuestion;

class ServicesInformationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $all_data = ServicesInformation::all();
        return view('backend.pages.services.list', ['serviceinfos' => $all_data]);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $all_service_category = ServiceCategory::pluck('name', 'id');
        return view('backend.pages.services.create', ['service_categoryes' => $all_service_category]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ServicesInformationRequest $request): RedirectResponse
    {
        // dd($request->all());
        DB::beginTransaction();
        try {
            $ServiceInformationsData = [
                'services_top_discription' => $request->services_top_discription,
                'services_card_title' => $request->services_card_title,
                'services_card_subtitle' => $request->services_card_subtitle,
                'services_card_discription' => $request->services_card_discription,
                'service_overview' => $request->service_overview,
                'service_category_id' => $request->service_category_id,
                'performance_discription' => $request->performance_discription,
                'performance' => json_encode($request->performance),
                'created_by' => auth()->user()->id,
            ];

            if ($request->hasFile('services_card_image')) {
                $cardImage = $request->file('services_card_image');
                $services_image_path = $cardImage->store('ServiceInfo/image', 'public');
                $ServiceInformationsData['services_card_image_path'] = $services_image_path;
            }
            if ($request->hasFile('service_attachment_path')) {
                $cardImage = $request->file('service_attachment_path');
                $service_attachment_path = $cardImage->store('ServiceInfo/attachment', 'public');
                $ServiceInformationsData['service_attachment_path'] = $service_attachment_path;
            }
            $OurServicesInformationDataCreate = ServicesInformation::create($ServiceInformationsData);

            // service benefit store start
            if ($OurServicesInformationDataCreate) {
                if (is_array($request->service_benefit) && count($request->service_benefit) > 0) {
                    foreach ($request->service_benefit as $key => $value) {
                        $OurServiceBenefitData = [
                            'service_information_id' => $OurServicesInformationDataCreate->id,
                            'service_benefit' => $value,
                            'created_by' => auth()->user()->id,
                        ];
                        ServiceBenefit::create(
                            $OurServiceBenefitData
                        );
                    }
                }
            }
            // service benefit store end

            // OurService AskQuestion Data store start
            if ($OurServicesInformationDataCreate) {
                if (is_array($request->details_title) && count($request->details_title) > 0) {
                    foreach ($request->details_title as $key => $value) {
                        $OurServiceAskQuestionData = [
                            'service_information_id' => $OurServicesInformationDataCreate->id,
                            'details_title' => $value,
                            'detail_discription' => $request->detail_discription[$key],
                            'created_by' => auth()->user()->id,
                        ];
                        ServiceInformationFrequentlyAskQuestion::create(
                            $OurServiceAskQuestionData
                        );
                    }
                }
            }
            // OurService AskQuestion Data store end

            DB::commit();
            return redirect()->route('servicesinfo.index')->with('status', 'Services Information Create Successfully');
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
        $service_info = ServicesInformation::find($id);
        $all_service_category = ServiceCategory::pluck('name', 'id');

        return view('backend.pages.services.create', ['edit_data' => $service_info, 'service_categoryes' => $all_service_category]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ServicesInformationRequest $request, $id): RedirectResponse
    {
        DB::beginTransaction();
        try {
            // Find the existing service information by ID
            $ServiceInformationsData = ServicesInformation::findOrFail($id);

            // Prepare the data to be updated (including other fields, images, etc.)
            $updateData = [
                'services_top_discription' => $request->services_top_discription,
                'services_card_title' => $request->services_card_title,
                'services_card_subtitle' => $request->services_card_subtitle,
                'services_card_discription' => $request->services_card_discription,
                'service_overview' => $request->service_overview,
                'service_category_id' => $request->service_category_id,
                'performance_discription' => $request->performance_discription,
                'performance' => json_encode($request->performance),
                'updated_by' => auth()->user()->id,
            ];

            // Handle image uploads (if applicable)
            if ($request->hasFile('services_card_image')) {
                if ($ServiceInformationsData->services_card_image) {
                    Storage::disk('public')->delete($ServiceInformationsData->services_card_image);
                }
                $services_card_image = $request->file('services_card_image');
                $updateData['services_card_image'] = $services_card_image->store('ServiceInfo/image', 'public');
            }

            if ($request->hasFile('service_attachment_path')) {
                if ($ServiceInformationsData->service_attachment_path) {
                    Storage::disk('public')->delete($ServiceInformationsData->service_attachment_path);
                }
                $service_attachment_path = $request->file('service_attachment_path');
                $updateData['service_attachment_path'] = $service_attachment_path->store('ServiceInfo/image', 'public');
            }

            // Update the main record
            $ServiceInformationsData->update($updateData);

            // **Handle Service Benefits Update (Logic for update and delete)**
            $existingBenefits = ServiceBenefit::where('service_information_id', $ServiceInformationsData->id)->get();
            $newBenefits = collect($request->service_benefit);

            // Delete removed benefits
            $existingBenefits->each(function ($existingBenefit) use ($newBenefits) {
                if (!$newBenefits->contains($existingBenefit->service_benefit)) {
                    $existingBenefit->delete(); // Delete removed benefits
                }
            });

            // Insert or update new benefits
            foreach ($newBenefits as $benefit) {
                ServiceBenefit::updateOrCreate(
                    [
                        'service_information_id' => $ServiceInformationsData->id,
                        'service_benefit' => $benefit,
                    ],
                    [
                        'created_by' => auth()->user()->id,
                        'updated_at' => now(),
                    ]
                );
            }

            // **Handle Frequently Asked Questions Update (Logic for update and delete)**

            // Get all existing FAQs for the current service information
            $existingFAQs = ServiceInformationFrequentlyAskQuestion::where('service_information_id', $ServiceInformationsData->id)->get();
            $newFAQs = collect($request->details_title);

            // Delete removed FAQs
            $existingFAQs->each(function ($existingFAQ) use ($newFAQs, $request) {
                if (!$newFAQs->contains($existingFAQ->details_title)) {
                    $existingFAQ->delete(); // Delete removed FAQs
                }
            });

            // Insert or update new FAQs
            foreach ($newFAQs as $key => $title) {
                ServiceInformationFrequentlyAskQuestion::updateOrCreate(
                    [
                        'service_information_id' => $ServiceInformationsData->id,
                        'details_title' => $title,
                    ],
                    [
                        'detail_discription' => $request->detail_discription[$key] ?? null,
                        'created_by' => auth()->user()->id,
                        'updated_at' => now(),
                    ]
                );
            }

            DB::commit();
            return redirect()->route('servicesinfo.index')->with('status', 'Services Information Updated Successfully');
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Something went wrong! ' . $e->getMessage());
        }
    }




    public function delete($id)
    {
        DB::beginTransaction();
        try {
            // Find the service information by ID
            $serviceInformation = ServicesInformation::findOrFail($id);

            // Delete related service benefits
            ServiceBenefit::where('service_information_id', $serviceInformation->id)->delete();

            // Delete related frequently asked questions
            ServiceInformationFrequentlyAskQuestion::where('service_information_id', $serviceInformation->id)->delete();

            // Delete files if they exist
            if ($serviceInformation->services_card_image_path) {
                Storage::disk('public')->delete($serviceInformation->services_card_image_path);
            }

            if ($serviceInformation->service_attachment_path) {
                Storage::disk('public')->delete($serviceInformation->service_attachment_path);
            }

            // Delete the service information record
            $serviceInformation->delete();

            DB::commit();

            return redirect()->route('servicesinfo.index')->with('status', 'Service Information Deleted Successfully');
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Something went wrong! ' . $e->getMessage());
        }
    }

    public function restore($id)
    {
        $serviceinfo = ServicesInformation::withTrashed()->findOrFail($id);
        $serviceinfo->restore();
        return redirect()->route('servicesinfo.index')->with('status', 'Services Information Restored Successfully');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
