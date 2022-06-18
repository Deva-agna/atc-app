<?php

namespace App\Http\Controllers;

use App\Models\AppPractical;
use App\Models\AppTheory;
use App\Models\Atc;
use App\Models\Biodata;
use App\Models\Pengujian;
use App\Models\TwrPractical;
use App\Models\TwrTheory;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function index()
    {
        $users = User::latest()->get();
        return view('user.index', compact('users'));
    }

    public function create()
    {
        return view('user.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'license_number_one' => 'required|unique:users',
            'name' => 'required',
            'birth' => 'required',
            'nationality' => 'required',
            'sex' => 'required',
            'address' => 'required',
            'role' => 'required',
        ]);

        $password = date('d-m-Y', strtotime($request->birth));

        $imgName = '';

        if ($request->image) {
            $imgName = $request->image->getClientOriginalName() . '.' . time() . '.' . $request->image->extension();
            $request->image->move(public_path('img'), $imgName);
        }

        $user = User::create([
            'name' => $request->name,
            'license_number_one' => $request->license_number_one,
            'effected_since_one' => $request->effected_since_one,
            'password' => bcrypt($password),
            'role' => $request->role,
            'slug' => Str::of($request->name . '-' . time())->slug('-'),
        ]);

        Biodata::create([
            'user_id' => $user->id,
            'license_number_two' => $request->license_number_two,
            'effected_since_two' => $request->effected_since_two,
            'birth' => $request->birth,
            'nationality' => $request->nationality,
            'sex' => $request->sex,
            'address' => $request->address,
            'rating_one' => $request->rating_one,
            'rating_two' => $request->rating_two,
            'image' => $imgName,
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
            'license_number_one' => 'required',
            'name' => 'required',
            'birth' => 'required',
            'nationality' => 'required',
            'sex' => 'required',
            'address' => 'required',
            'role' => 'required',
        ]);

        $user = User::where('id', $request->id)->first();

        if ($user->license_number_one != $request->license_number_one) {
            $request->validate([
                'license_number_one' => 'required|unique:users',
            ]);
        }

        $password = date('d-m-Y', strtotime($request->birth));

        if ($request->image) {
            $file = public_path('img/') . $request->imgOld;
            if (file_exists($file)) {
                @unlink($file);
            }

            $imgName = $request->image->getClientOriginalName() . '.' . time() . '.' . $request->image->extension();
            $request->image->move(public_path('img'), $imgName);

            Biodata::where('user_id', $request->id)->update([
                'image' => $imgName,
            ]);
        }

        User::where('id', $request->id)->update([
            'name' => $request->name,
            'license_number_one' => $request->license_number_one,
            'effected_since_one' => $request->effected_since_one,
            'password' => bcrypt($password),
            'role' => $request->role,
            'slug' => Str::of($request->name . '-' . time())->slug('-'),
        ]);

        Biodata::where('user_id', $request->id)->update([
            'user_id' => $user->id,
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

        $pengujian = Pengujian::where('user_id', $user->id)->first();
        $twrTheory = TwrTheory::where('user_id', $user->id)->first();
        $twrPractical = TwrPractical::where('user_id', $user->id)->first();
        $appTheory = AppTheory::where('user_id', $user->id)->first();
        $appPractical = AppPractical::where('user_id', $user->id)->first();

        if ($twrTheory) {
            return redirect()->route('user')->with('error', 'User tidak dapat dihapus karena data user terkait dengan table pengujian!');
        } else if ($twrPractical) {
            return redirect()->route('user')->with('error', 'User tidak dapat dihapus karena data user terkait dengan table pengujian!');
        } else if ($appTheory) {
            return redirect()->route('user')->with('error', 'User tidak dapat dihapus karena data user terkait dengan table pengujian!');
        } else if ($appPractical) {
            return redirect()->route('user')->with('error', 'User tidak dapat dihapus karena data user terkait dengan table pengujian!');
        } else if ($pengujian) {
            return redirect()->route('user')->with('error', 'User tidak dapat dihapus karena data user terkait dengan table pengujian!');
        }

        $file = public_path('img/') . $biodata->image;
        if (file_exists($file)) {
            @unlink($file);
        }

        if ($atc) {
            Atc::destroy($atc);
        }
        Biodata::destroy($biodata->id);
        User::destroy($user->id);

        return redirect()->route('user')->with('sukses', 'Data berhasil dihapus!');
    }
}
