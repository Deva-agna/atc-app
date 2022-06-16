<?php

namespace App\Http\Controllers;

use App\Models\Atc;
use App\Models\Biodata;
use App\Models\Pengujian;
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
            'birth' => 'required',
            'nationality' => 'required',
            'sex' => 'required',
            'address' => 'required',
        ]);

        $password = date('d-m-Y', strtotime($request->birth));

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($password),
            'role' => 'user',
            'slug' => Str::of($request->name . '-' . time())->slug('-'),
        ]);

        Biodata::create([
            'user_id' => $user->id,
            'license_number_one' => $request->license_number_one,
            'effected_since_one' => $request->effected_since_one,
            'license_number_two' => $request->license_number_two,
            'effected_since_two' => $request->effected_since_two,
            'birth' => $request->birth,
            'nationality' => $request->nationality,
            'sex' => $request->sex,
            'address' => $request->address,
            'rating_one' => $request->rating_one,
            'rating_two' => $request->rating_two,
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
            'birth' => 'required',
            'nationality' => 'required',
            'sex' => 'required',
            'address' => 'required',
        ]);

        $user = User::where('id', $request->id)->first();

        if ($user->email != $request->email) {
            $request->validate([
                'email' => 'required|email:dns|unique:users',
            ]);
        }

        $password = date('d-m-Y', strtotime($request->birth));



        User::where('id', $request->id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($password),
            'role' => 'user',
            'slug' => Str::of($request->name . '-' . time())->slug('-'),
        ]);

        Biodata::where('user_id', $request->id)->update([
            'user_id' => $user->id,
            'license_number_one' => $request->license_number_one,
            'effected_since_one' => $request->effected_since_one,
            'license_number_two' => $request->license_number_two,
            'effected_since_two' => $request->effected_since_two,
            'birth' => $request->birth,
            'nationality' => $request->nationality,
            'sex' => $request->sex,
            'address' => $request->address,
            'rating_one' => $request->rating_one,
            'rating_two' => $request->rating_two,
            'slug' => Str::of($request->name . '-' . time())->slug('-'),
        ]);

        return redirect()->route('user')->with('sukses', 'Data berhasil diubah!');
    }

    public function destroy($slug)
    {
        $user = User::where('slug', $slug)->first();
        $biodata = Biodata::where('user_id', $user->id)->first();
        $atc = Atc::where('user_id', $user->id)->get();
        $pengujian = Pengujian::where('user_id', $user->id)->get();

        if ($atc) {
            Atc::destroy($atc);
        }

        if ($pengujian) {
            Pengujian::destroy($pengujian);
        }
        Biodata::destroy($biodata->id);
        User::destroy($user->id);

        return redirect()->route('user')->with('sukses', 'Data berhasil dihapus!');
    }
}
