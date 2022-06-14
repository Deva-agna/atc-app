<?php

namespace App\Http\Controllers;

use App\Models\Pengujian;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PengujianController extends Controller
{
    public function index()
    {
        $users = User::where('role', 'user')->get();
        $pengujian_s = Pengujian::latest()->get();
        return view('pengujian.index', compact('users', 'pengujian_s'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user' => 'required',
        ]);

        $user = User::where('id', $request->user)->first();

        Pengujian::create([
            'user_id' => $request->user,
            'status' => 'false',
            'slug' => Str::of($user->name . '-' . time())->slug('-'),
        ]);

        return redirect()->back()->with('sukses', 'Data berhasil ditambahkan!');
    }

    public function list()
    {
        $pengujian_s = Pengujian::where('status', 'false')->latest()->get();
        return view('pengujian.list-pengujian', compact('pengujian_s'));
    }

    public function edit($slug)
    {
        $pengujian = Pengujian::where('slug', $slug)->first();
        $users = User::where('role', 'user')->get();
        return view('pengujian.kelola-pengujian', compact('pengujian', 'users'));
    }

    public function update(Request $request)
    {
        Pengujian::where('id', $request->id)->update([
            'theory_twr' => $request->theory_twr,
            'renewed_unit_theory_twr' => $request->renewed_unit_theory_twr,
            'examiner_theory_twr' => $request->examiner_theory_twr,
            'score_theory_twr' => $request->score_theory_twr,
            'practical_twr' => $request->practical_twr,
            'renewed_unit_practical_twr' => $request->renewed_unit_practical_twr,
            'examiner_practical_twr' => $request->examiner_practical_twr,
            'score_practical_twr' => $request->score_practical_twr,
            'theory_app' => $request->theory_app,
            'renewed_unit_theory_app' => $request->renewed_unit_theory_app,
            'examiner_theory_app' => $request->examiner_theory_app,
            'score_theory_app' => $request->score_theory_app,
            'practical_app' => $request->practical_app,
            'renewed_unit_practical_app' => $request->renewed_unit_practical_app,
            'examiner_practical_app' => $request->examiner_practical_app,
            'score_practical_app' => $request->score_practical_app,
        ]);

        return redirect()->route('pengujian-list')->with('sukses', 'Data berhasil dikelola!');
    }

    public function verifikasi($slug)
    {
        $pengujian = Pengujian::where('slug', $slug)->first();
        if (
            $pengujian->theory_twr &&
            $pengujian->renewed_unit_theory_twr &&
            $pengujian->examiner_theory_twr &&
            $pengujian->score_theory_twr &&
            $pengujian->practical_twr &&
            $pengujian->renewed_unit_practical_twr &&
            $pengujian->examiner_practical_twr &&
            $pengujian->score_practical_twr &&
            $pengujian->theory_app &&
            $pengujian->renewed_unit_theory_app &&
            $pengujian->examiner_theory_app &&
            $pengujian->score_theory_app &&
            $pengujian->practical_app &&
            $pengujian->renewed_unit_practical_app &&
            $pengujian->examiner_practical_app &&
            $pengujian->score_practical_app
        ) {
            Pengujian::where('slug', $slug)->update([
                'signature_and_stamp' => auth()->user()->name,
                'status' => 'true'
            ]);
            return redirect()->route('pengujian-list')->with('sukses', 'Data berhasil terverifikasi!');
        } else {
            return redirect()->route('pengujian-list')->with('error', 'Harap isi semua data sebelum melakukan verifkasi!');
        }
    }
}
