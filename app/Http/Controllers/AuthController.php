<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        return view('login');
    }

    public function register() 
    {
        return view('register');
    }

    public function authenticating(Request $request)
    {
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            // Cek apakah user status = active
            if (Auth::user()->status != 'active') {
                // cek apakah user status = adtive, jika tidak maka logout dan redirect ke login dengan pesan error
                Auth::Logout();
                $request->session()->invalidate();
                $request->session()->regenerateToken();
                Session::flash('status', 'failed');
                Session::flash('message', 'Your account is not active yet. Please contact Admin!');
                return redirect('/login');
            }
            
            $request->session()->regenerate();
            if(Auth::user()->role_id == 1) {
                return redirect('dashboard');
            }
            if(Auth::user()->role_id == 2) {
                return redirect('profile');
            }
        }
        Session::flash('status', 'failed');
        Session::flash('message', 'Login Invalid');
        return redirect('/login');
    }

    public function Logout(Request $request)
    {
        Auth::Logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
    public function registerProcess(Request $request) 
    {
        $validated = $request->validate([
        'username' => ['required', 'unique:users', 'max:255'],
        'password' => ['required', 'max:255'],
        'hp' => ['max:255'],
        'alamat' => ['required'],
    ]);
        $user = User::create($request->all());

        Session::flash('status', 'success');
        Session::flash('message', 'Registration successful! Waiting for Admin approval to activate your account.');
        return redirect('/register');
    }
}
