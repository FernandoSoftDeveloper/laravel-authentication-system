<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller
{
    public function register(Request $request)
    {
        // Validate Form
        $formFields = $request->validate([
            'username' => ['required', 'min:4', 'max:255'],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => ['required', 'min:6', 'confirmed'],
        ]);

        // Hash Password
        $formFields['password'] = bcrypt($formFields['password']);

        // Create User
        $user = User::create($formFields);

        // Login
        auth()->login($user);

        // Redirect to Home Page
        return redirect('/')->with('message', 'User created and logged into account');
    }
    public function login()
    {
        return view('accounts.auth.login');
    }
    public function signup()
    {
        return view('accounts.auth.signup');
    }
    public function dashboard()
    {
        return view('accounts.profile.dashboard');
    }
}
