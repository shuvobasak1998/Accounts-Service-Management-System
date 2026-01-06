<?php

namespace App\Http\Controllers\Backend;

use Exception;
use App\Models\TeamInformation;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\TeamInformationRequest;

class TeamInformationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $all_data = TeamInformation::all();
        return view('backend.pages.team_information.list', ['team_infos' => $all_data]);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.pages.team_information.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TeamInformationRequest $request): RedirectResponse
    {
        // dd($request->all());
        try {
            $validatedData = $request->validated();

            if ($request->hasFile('team_member_image_path')) {
                $teamMemberImage = $request->file('team_member_image_path');
                $team_member_image_path = $teamMemberImage->store('team_member_Info/memberimage', 'public');
                $validatedData['team_member_image_path'] = $team_member_image_path;
            }
            $validatedData['created_by'] = auth()->user()->id;
            TeamInformation::create($validatedData);

            return redirect()->route('our_team.index')->with('status', 'Team Member Information Create Successfully');
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
        $team_info = TeamInformation::find($id);
        return view('backend.pages.team_information.create', ['edit_data' => $team_info]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TeamInformationRequest $request, string $id): RedirectResponse
    {
        try {
            // Find the existing record or fail
            $team_member_Info = TeamInformation::findOrFail($id);

            // Validate incoming request data
            $validatedData = $request->validated();

            // Handle file upload if a new image is uploaded
            if ($request->hasFile('team_member_image_path')) {
                // Delete the old image if exists (optional)
                if ($team_member_Info->team_member_image_path) {
                    Storage::disk('public')->delete($team_member_Info->team_member_image_path);
                }
                // Store the new image
                $teamMemberImage = $request->file('team_member_image_path');
                $team_member_image_path = $teamMemberImage->store('team_member_Info/memberimage', 'public');
                $validatedData['team_member_image_path'] = $team_member_image_path;
            }

            // Update the existing record
            $validatedData['updated_by'] = auth()->user()->id;
            $team_member_Info->update($validatedData);

            // Redirect with success message
            return redirect()->route('our_team.index')->with('status', 'Team Member Information Updated Successfully');
        } catch (Exception $e) {
            // Redirect with error message in case of failure
            return redirect()->back()->with('error', 'Something went wrong! ' . $e->getMessage());
        }
    }
    public function delete($id)
    {
        $team_member_info = TeamInformation::findOrFail($id);
        $team_member_info->delete();
        return redirect()->route('our_team.index')->with('status', 'Team Member Information Deleted Successfully');
    }

    public function restore($id)
    {
        $team_member_info = TeamInformation::withTrashed()->findOrFail($id);
        $team_member_info->restore();
        return redirect()->route('our_team.index')->with('status', 'Team Member Information Restored Successfully');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
