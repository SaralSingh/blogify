<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function registerPage()
    {
        return view('Visitor.register');
    }


public function registerCheck(Request $request)
{
    $validated = $request->validate([
        'name' => 'required|string|max:100',
        'username' => 'required|string|max:50|unique:users,username',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|string|min:6|confirmed',
    ]);
    
    User::create([
        'name' => $validated['name'],
        'username' => $validated['username'],
        'email' => $validated['email'],
        'password' => $validated['password'],
    ]);

    return redirect()->route('login.page')->with('success', 'Registration successful. Please login.');
}

    public function loginPage()
    {
        return view('Visitor.login');
    }

    public function loginCheck(Request $request)
    {
        $credentials = $request->validate(
            [
                'email' => 'required|email',
                'password' => 'required'
            ]
        );

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            $user = Auth::user();
            $token = $user->createToken('login_token')->plainTextToken;
            session(['auth_token' => $token]);
            return redirect()->route('dashboard.page');
        }
        return back()->with('error', 'Invalid credentials.');
    }

    public function logout(Request $request)
    {
        if (Auth::check()) {
            $user = Auth::user();

            // ✅ Delete all personal access tokens (for security)
            $user->tokens()->delete();
        }

        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('home.page');
    }
}
