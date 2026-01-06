<?php

namespace App\Http\Controllers\Backend;

use App\Models\BusinessInfo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\BusinessInformationRequest;

class BusinessInfoController extends Controller
{
    public function index()
    {
        $all_data = BusinessInfo::all();
        return view('backend.pages.businessinformation.list', ['businessinfos' => $all_data]);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.pages.businessinformation.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BusinessInformationRequest $request):RedirectResponse
    {
        // dd($request->all());
        $validatedData = $request->validated();
        if ($validatedData) {
            if ($request->hasFile('business_logo')) {
                $businesslogo = $request->file('business_logo');
                $businesslogopath = $businesslogo->store('BusinessInfo/logo', 'public');
                $validatedData['business_logo_path'] = $businesslogopath;
            }
            BusinessInfo::create($validatedData);

            return redirect()->route('businessinfo.index')->with('status', 'Business Information Added Successfully');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = BusinessInfo::find($id);
        return view('businessinformation.view', ['business_info' => $data]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $edit_data = BusinessInfo::find($id);
        return view('backend.pages.businessinformation.create', ['business_info' => $edit_data]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BusinessInformationRequest $request, string $id): RedirectResponse
    {
        $validatedData = $request->validated();
        $buisness_info = BusinessInfo::find($id);

        if ($validatedData) {

            if ($request->hasFile('business_logo')) {
                $businesslogo = $request->file('business_logo');
                $businesslogopath = $businesslogo->store('BusinessInfo/logo', 'public');
                $validatedData['business_logo_path'] = $businesslogopath;
            }
            // dd($validatedData);exit;
            $buisness_info->fill($validatedData);
            $buisness_info->save();
            return redirect()->route('businessinfo.index')->with('status', 'Business Information Edit Successfully');
        }
    }


    public function delete($id)
    {
        $businfo = BusinessInfo::findOrFail($id);
        $businfo->delete();
        return redirect()->route('businessinfo.index')->with('status', 'Business Information Deleted Successfully');
    }

    public function restore($id)
    {
        $businfo = BusinessInfo::withTrashed()->findOrFail($id);
        $businfo->restore();
        return redirect()->route('businessinfo.index')->with('status', 'Business Information Restored Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
