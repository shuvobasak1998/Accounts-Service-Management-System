<?php

namespace App\Http\Controllers\Backend;

use App\Models\User;
use App\Models\UserRole;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;


class UserController extends Controller
{
    public function index()
    {
        $users = User::get()->all();
        return view('backend.pages.users.list', [
            'list' => $users,
        ]);
    }

    public function store(UserRequest $request): RedirectResponse
    {
        try {
            // Validate request data
            $validatedData = $request->validated();

            // Store profile picture if provided
            if ($request->hasFile('profile_picture')) {
                $profilePicture = $request->file('profile_picture');
                $profilePicturePath = $profilePicture->store('users/profiles', 'public');
                $validatedData['profile_photo_path'] = $profilePicturePath;
            }

            // Encrypt password before saving
            $validatedData['password'] = bcrypt($validatedData['password']);

            // Create user
            $user = new User();
            $user->fill($validatedData);
            $user->created_by = auth()->user()->id; // Set creator ID
            $user->save();

            return redirect()->route('user.list')->with('status', 'User Created Successfully');
        } catch (\Exception $e) {
            // dd($e);
            return redirect()->back()->with('error', 'User creation failed: ' . $e->getMessage());
        }
    }


    function create()
    {
        $users_role = UserRole::pluck('name', 'id');
        return view('backend.pages.users.create', ['user_role' => $users_role]);
    }

    function view($id = '')
    {
        $data = $this->GetUsersById($id);
        return view('users.view', [
            'user_info' => $data['user_info'],
        ]);
    }

    function edit($id = '')
    {
        $data = $this->GetUsersById($id);
        $users_role = UserRole::pluck('name', 'id');
        return view('backend.pages.users.edit', [
            'edit_data' => $data['user_info'],
            'user_role' => $users_role,
        ]);
    }

    private function GetUsersById($id)
    {
        $user_info = User::find($id);
        return [
            'user_info' => $user_info,
        ];
    }

    public function editStore(UserRequest $request): RedirectResponse
    {
        // dd($request->all());
        if (User::where('id', $request->id)->exists()) {

            $validatedData = $request->all();
            // Store profile picture
            if ($request->hasFile('profile_picture')) {
                $profilePicture = $request->file('profile_picture');
                $profilePicturePath = $profilePicture->store('users/profiles', 'public');
                $validatedData['profile_photo_path'] = $profilePicturePath;
            }
            $user = User::find($request->id);
            $user->fill($validatedData);
            $user->updated_by = auth()->user()->id;

            $user->save();

            return redirect()->route('dashboard')->with('status', 'User Edit Successfully');
        }
    }


    public function delete($id = '')
    {
        try {
            // Find user by ID
            $user = User::findOrFail($id);
            // Delete profile picture if exists
            if ($user->profile_photo_path) {
                Storage::disk('public')->delete($user->profile_photo_path);
            }
            // Delete the user
            $user->delete();

            return redirect()->route('dashboard')->with('status', 'User Deleted Successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'User deletion failed: ' . $e->getMessage());
        }
    }

    public function restore($id)
    {
        $user = User::withTrashed()->findOrFail($id);
        $user->restore(); // Restore the soft-deleted user
        return redirect()->route('user.list')->with('status', 'User Restored Successfully');
    }
}
