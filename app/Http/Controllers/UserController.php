<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Cookie;

class UserController extends Controller
{
    public function loginView()
    {
        return view('Auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string|min:8',
        ]);

        $credentials = $request->only('username', 'password');



        try {
            if (Auth::attempt($credentials,$request->rememberme)) {

                if ($request->rememberme) {
                    Cookie::queue('username', $request->username, 1440);
                }

                return redirect()->intended('/');
            } else {
                return back()->withErrors([
                    'username' => 'Username atau password salah.',
                ])->withInput();
            }
            return redirect('/')->with('success', 'Berhasil Login');
        } catch (\Exception $e) {
            return back()->withErrors([
                'username' => 'Terjadi kesalahan, silakan coba lagi.',
            ]);
        }
    }

    public function logout()
    {
        Auth::logout();

        return redirect('/login');
    }

    public function registerView()
    {
        return view('Auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
            'namalengkap' => 'required|string',
            'telepon' => 'required|string',
            'foto' => 'required|image|mimes:jpg,png,jpeg,gif|max:2048',
            'biodata' => 'required|string'
        ]);

        try {

            if ($request->file('foto')) {
                $path = $request->file('foto')->store('images', 'public');
            }


            $user = new User();
            $user->username = $request->username;
            $user->email = $request->email;
            $user->password = Hash::make($request->input('password'));
            $user->namalengkap = $request->namalengkap;
            $user->telepon = $request->telepon;
            $user->foto = $path;
            $user->biodata = $request->biodata;
            $user->save();

            return redirect('/login')->with('success', 'Berhasil Register');
        } catch (\Exception $e) {
            return redirect('/login')->with('fail', $e->getMessage());
        }
    }
}
