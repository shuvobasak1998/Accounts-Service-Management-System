<?php

namespace App\Http\Controllers\Backend;

use Exception;
use App\Models\OurProgress;
use Illuminate\Http\Request;
use App\Models\OurProgressDetails;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\OurProgressRequest;

class OurProgressController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $all_data = OurProgress::with('OurProgressDetails')->get();
        return view('backend.pages.our_progress.list', ['ourprogressinfos' => $all_data]);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.pages.our_progress.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(OurProgressRequest $request): RedirectResponse
    {
        // dd($request->all());
        DB::beginTransaction();

        try {
            $OurProgressData = [
                'progress_top_discription' => $request->progress_top_discription,
                'created_by' => auth()->user()->id,
            ];

            // Handle image upload
            if ($request->hasFile('first_image_path')) {
                $cardImage = $request->file('first_image_path');
                $first_image_path = $cardImage->store('OurProgress/image', 'public');
                $OurProgressData['first_image_path'] = $first_image_path;
            }
            if ($request->hasFile('second_image_path')) {
                $cardImage = $request->file('second_image_path');
                $second_image_path = $cardImage->store('OurProgress/image', 'public');
                $OurProgressData['second_image_path'] = $second_image_path;
            }
            if ($request->hasFile('third_image_path')) {
                $cardImage = $request->file('third_image_path');
                $third_image_path = $cardImage->store('OurProgress/image', 'public');
                $OurProgressData['third_image_path'] = $third_image_path;
            }

            // Store data
            $OurProgressDataCreate = OurProgress::create($OurProgressData);

            if ($OurProgressDataCreate) {
                if (is_array($request->details_title) && count($request->details_title) > 0) {
                    foreach ($request->details_title as $key => $value) {
                        $OurProgressDetailsData = [
                            'our_progress_information_id' => $OurProgressDataCreate->id,
                            'details_title' => $value,
                            'detail_discription' => $request->detail_discription[$key],
                            'created_by' => auth()->user()->id,
                        ];
                        OurProgressDetails::create(
                            $OurProgressDetailsData
                        );
                    }
                }
            }

            DB::commit();

            return redirect()->route('our_progress.index')->with('status', 'Our Progress Information Created Successfully');
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
        $patners_info = OurProgress::find($id);
        return view('backend.pages.our_progress.create', ['edit_data' => $patners_info]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(OurProgressRequest $request, $id): RedirectResponse
    {
        DB::beginTransaction();

        try {
            $OurProgressData = [
                'progress_top_discription' => $request->progress_top_discription,
                'updated_by' => auth()->user()->id,
            ];

            // Find the existing record
            $ourProgress = OurProgress::findOrFail($id);

            // Handle image updates
            if ($request->hasFile('first_image_path')) {
                // Delete old image if exists
                if ($ourProgress->first_image_path) {
                    Storage::disk('public')->delete($ourProgress->first_image_path);
                }
                $first_image_path = $request->file('first_image_path');
                $OurProgressData['first_image_path'] = $first_image_path->store('OurProgress/image', 'public');
            }

            if ($request->hasFile('second_image_path')) {
                if ($ourProgress->second_image_path) {
                    Storage::disk('public')->delete($ourProgress->second_image_path);
                }
                $second_image_path = $request->file('second_image_path');

                $OurProgressData['second_image_path'] = $second_image_path->store('OurProgress/image', 'public');
            }

            if ($request->hasFile('third_image_path')) {
                if ($ourProgress->third_image_path) {
                    Storage::disk('public')->delete($ourProgress->third_image_path);
                }
                $third_image_path = $request->file('third_image_path');
                $OurProgressData['third_image_path'] = $third_image_path->store('OurProgress/image', 'public');
            }

            // Update the main record
            $ourProgress->update($OurProgressData);

            // Update details
            if (is_array($request->details_title) && count($request->details_title) > 0) {
                // Delete existing details
                OurProgressDetails::where('our_progress_information_id', $ourProgress->id)->delete();
                // Insert new details
                foreach ($request->details_title as $key => $value) {
                    $OurProgressDetailsData = [
                        'our_progress_information_id' => $ourProgress->id,
                        'details_title' => $value,
                        'detail_discription' => $request->detail_discription[$key],
                        'created_by' => auth()->user()->id,
                    ];
                    OurProgressDetails::create($OurProgressDetailsData);
                }
            }

            DB::commit();

            return redirect()->route('our_progress.index')->with('status', 'Our Progress Information Updated Successfully');
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
            // Find the existing record
            $ourProgress = OurProgress::findOrFail($id);
            // Delete associated details
            OurProgressDetails::where('our_progress_information_id', $ourProgress->id)->delete();
            // Delete images if they exist
            if ($ourProgress->first_image_path) {
                Storage::disk('public')->delete($ourProgress->first_image_path);
            }
            if ($ourProgress->second_image_path) {
                Storage::disk('public')->delete($ourProgress->second_image_path);
            }
            if ($ourProgress->third_image_path) {
                Storage::disk('public')->delete($ourProgress->third_image_path);
            }
            // Delete the main record
            $ourProgress->delete();
            DB::commit();
            return redirect()->route('our_progress.index')->with('status', 'Our Progress Information Deleted Successfully');
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Something went wrong! ' . $e->getMessage());
        }
    }

    public function restore($id)
    {
        $partnersinfo = OurProgress::withTrashed()->findOrFail($id);
        $partnersinfo->restore();
        return redirect()->route('partnersinfo.index')->with('status', 'Partners Information Restored Successfully');
    }
}
