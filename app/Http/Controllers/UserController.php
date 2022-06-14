<?php

namespace App\Http\Controllers;

use App\Models\Atc;
use App\Models\Biodata;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function index()
    {
        $users = User::where('role', 'user')->latest()->get();
        return view('user.index', compact('users'));
    }

    public function create()
    {
        return view('user.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email:dns|unique:users',
            'tanggal_lahir' => 'required',
            'jenis_kelamin' => 'required',
            'alamat' => 'required',
        ]);

        $password = date('d-m-Y', strtotime($request->tanggal_lahir));

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($password),
            'role' => 'user',
            'slug' => Str::of($request->name . '-' . time())->slug('-'),
        ]);

        Biodata::create([
            'user_id' => $user->id,
            'tanggal_lahir' => $request->tanggal_lahir,
            'jenis_kelamin' => $request->jenis_kelamin,
            'alamat' => $request->alamat,
            'slug' => Str::of($request->name . '-' . time())->slug('-'),
        ]);

        return redirect()->route('user')->with('sukses', 'Data berhasil ditambahkan!');
    }

    public function edit($slug)
    {
        $user = User::where('slug', $slug)->first();
        return view('user.edit', compact('user'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'tanggal_lahir' => 'required',
            'jenis_kelamin' => 'required',
            'alamat' => 'required',
        ]);

        $user = User::where('id', $request->id)->first();

        if ($user->email != $request->email) {
            $request->validate([
                'email' => 'required|email:dns|unique:users',
            ]);
        }

        $password = date('d-m-Y', strtotime($request->tanggal_lahir));



        User::where('id', $request->id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($password),
            'role' => 'user',
            'slug' => Str::of($request->name . '-' . time())->slug('-'),
        ]);

        Biodata::where('user_id', $request->id)->update([
            'tanggal_lahir' => $request->tanggal_lahir,
            'jenis_kelamin' => $request->jenis_kelamin,
            'alamat' => $request->alamat,
            'slug' => Str::of($request->name . '-' . time())->slug('-'),
        ]);

        return redirect()->route('user')->with('sukses', 'Data berhasil diubah!');
    }

    public function destroy($slug)
    {
        $user = User::where('slug', $slug)->first();
        $biodata = Biodata::where('user_id', $user->id)->first();
        $atc = Atc::where('user_id', $user->id)->get();

        if ($atc) {
            Atc::destroy($atc);
        }
        Biodata::destroy($biodata->id);
        User::destroy($user->id);

        return redirect()->route('user')->with('sukses', 'Data berhasil dihapus!');
    }
}
