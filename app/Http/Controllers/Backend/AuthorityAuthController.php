<?php

namespace App\Http\Controllers\Backend;

use App\Enum\UserRoleEnum;
use App\Http\Controllers\Controller;
use Auth;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Log;

class AuthorityAuthController extends Controller
{
    public function authorityLogin()
    {
        return view('backend.pages.login.authority-login');
    }
    public function authorityLoginRequest(Request $request)
    {
        try {
            // Validate the request
            $request->validate([
                'email' => 'required|email',
                'password' => 'required'
            ], [
                'email.required' => 'Email is required',
                'email.email' => 'Email must be a valid email address',
                'password.required' => 'Password is required',
            ]);

            // Attempt to log in the user
            if (Auth::attempt($request->only('email', 'password'))) {
                $request->session()->regenerate();
                $user = Auth::user();

                return match ($user->role) {
                    UserRoleEnum::AUTHORITY->value => redirect()->route('authority.dashboard'),
                    UserRoleEnum::USER->value => redirect()->route('user.dashboard'),
                    default => redirect()->route('home'),
                };
            }
            // dd('error');
            return back()->with(['error' => 'Login failed ! Check your credentials'])->withInput();
        } catch (ValidationException $e) {
            return back()->withErrors($e->errors())->withInput();
        } catch (Exception $e) {
            Log::error('Login Error: ' . $e->getMessage());

            return back()->withErrors([
                'error' => 'An unexpected error occurred. Please try again.',
            ]);
        }
    }


}
