<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        if ($request->isMethod('get')) {
            return view('auth.login');
        }

        $credentials = $request->validate([
            'name' => 'required',
            'password' => 'required'
        ]);

        // Retrieve the user by the provided name
        $user = User::where('name', $credentials['name'])->first();

        // Check if the user exists and if the provided password matches
        if ($user && $user->password == $credentials['password']) {
            Auth::login($user); // Manually log in the user

            $image = Auth::user()->profile_picture;

            return redirect()
                ->route('home')
                ->with('success', 'Login successfully!');
        }

        return redirect()
            ->route('login')
            ->with('error', 'Error! Invalid credentials.');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()
            ->route('home')
            ->with('success' . "You are logged out.");
    }
}
