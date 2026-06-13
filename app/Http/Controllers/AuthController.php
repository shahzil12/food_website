<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    // --- 1. SHOW THE FORMS ---
    public function showLogin() {
        return view('auth.login');
    }

    public function showRegister() {
        return view('auth.register');
    }

    // --- 2. HANDLE LOGIN (Create Session) ---
    public function login(Request $request) {
        $credentials = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        // This checks DB and starts the Session
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate(); // Security: Prevent session theft
            return redirect('/redirect'); // Go to traffic controller
        }

        // Login Failed
        return back()->withErrors(['email' => 'Wrong email or password']);
    }

    // --- 3. HANDLE REGISTER ---
    public function register(Request $request) {
        // Create the User in DB
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->role = 1; // Default = Customer
        $user->save();

        // Auto-login (Start Session)
        Auth::login($user);
        return redirect('/redirect');
    }

    // --- 4. HANDLE LOGOUT (Destroy Session) ---
    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate(); // Kill the session data
        $request->session()->regenerateToken(); // Reset security token
        
        return redirect('/')->with('success', 'Logged out successfully!');
    }
}