<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class UpdatePasswordController extends Controller
{
    public function edit()
    {
        return view('user.update-password');
    }

    public function update(Request $request)
    {
        $request->validate([
            'password_lama' => ['required'],
            'password' => ['required', 'min:6', 'confirmed'],
        ]);

        if (Hash::check($request->password_lama, auth()->user()->password)) {
            User::where('id', $request->id)->update([
                'password' => Hash::make($request->password)
            ]);
            return redirect()->route('password')->with('sukses', 'Password Berhasil di Update!');
        }
        throw ValidationException::withMessages([
            'password_lama' => 'password yang kamu masukan tidak sesuai',
        ]);
    }
}
