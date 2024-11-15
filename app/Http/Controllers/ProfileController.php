<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function index(){
        $getProfile = Auth::User()->id;
        $profile = User::find($getProfile);
        return view('Auth.profile',compact('profile'));
    }

    public function update(Request $request){
        try {
            $request->validate([
                'username' => 'nullable|string',
                'email' => 'nullable|email',
                'password' => 'required|string|confirmed',
                'namalengkap' => 'required|string',
                'telepon' => 'required|string',
                'foto' => 'nullable|image|mimes:jpg,png,jpeg,gif,webp|max:2048',
                'biodata' => 'required|string'
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json(['errors' => $e->validator->errors()], 422);
        }

        try {
            $getProfile = Auth::User()->id;
            $profile = User::find($getProfile);

            if($request->file('foto')){
                //hapus file jika sudah ada
                if($profile->foto){
                    Storage::disk('public')->delete($profile->foto);
                }

                //simpan gambar baru

                $path = $request->file('foto')->store('images','public');
                $profile->foto = $path;

            }
            $profile->password = Hash::make($request->input('password'));
            $profile->namalengkap = $request->namalengkap;
            $profile->telepon = $request->telepon;
            $profile->biodata = $request->biodata;
            $profile->save();


            return redirect('/profile')->with('success','Berhasil Di Update');
        } catch (\Exception $e) {
            return redirect('/profile')->with('fail',$e->getMessage());
        }
    }

}
