<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function index()
    {
        return view('backend.pages.auth.sign-in');
    }

    public function register()
    {
        return view('backend.pages.auth.sign-up');
    }


    public function registerPost(Request $request)
    {
        $data = $request->validate([
            'name'     => ['required', 'string', 'max:255'],
            'email'    => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'min:6', 'confirmed'],
        ]);

        $user = User::create([
            'name'     => $data['name'],
            'email'    => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        return redirect()->route('login');
    }


    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Alert::success('Success Title', 'Success Message', [
            //     'autocomplete' => 'off',
            //     'autofocus' => false,
            // ]);
            //    Alert::success('Success Title', 'Success Message');
            // toast('Login Berhasil!','success');
            return redirect()->route('dashboard')->with('success', 'Login Berhasil!');
        }

        return back()->with('error', 'Email Atau Password Salah!')->withInput();
    }


    public function logout(Request $request)
    {
        Auth::logout();

        // alert()->success('Success', 'Logout Berhasil');
        // toast('Logout Berhasil!', 'success');

        return redirect()->route('home')->with('success', 'Logout Berhasil!');
    }
}
