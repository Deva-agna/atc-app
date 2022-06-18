<?php

namespace App\Http\Controllers;

use App\Models\AppPractical;
use App\Models\AppTheory;
use App\Models\Pengujian;
use App\Models\TwrPractical;
use App\Models\TwrTheory;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PengujianController extends Controller
{
    public function index()
    {
        $users = User::get();
        $pengujian_s = Pengujian::latest()->get();
        $twr_theory = TwrTheory::get();
        $app_theory = AppTheory::get();
        $twr_practical = TwrPractical::get();
        $app_practical = AppPractical::get();
        return view('pengujian.index', compact('users', 'pengujian_s', 'twr_theory', 'app_theory', 'twr_practical', 'app_practical'));
    }

    public function store(Request $request)
    {
        // return $request;
        $request->validate([
            'id' => 'required',
            'penguji_satu' => 'required',
            'penguji_dua' => 'required',
            'penguji_tiga' => 'required',
            'penguji_empat' => 'required',
        ]);

        if ($request->id != $request->penguji_satu && $request->id != $request->penguji_dua && $request->id != $request->penguji_tiga && $request->id != $request->penguji_empat) {
            $user = User::where('id', $request->id)->first();

            $pengujian = Pengujian::create([
                'user_id' => $request->id,
                'status' => 'false',
                'slug' => Str::of($user->name . '-' . time())->slug('-'),
            ]);

            TwrTheory::create([
                'pengujian_id' => $pengujian->id,
                'user_id' => $request->penguji_satu,
            ]);
            TwrPractical::create([
                'pengujian_id' => $pengujian->id,
                'user_id' => $request->penguji_dua,
            ]);
            AppTheory::create([
                'pengujian_id' => $pengujian->id,
                'user_id' => $request->penguji_tiga,
            ]);
            AppPractical::create([
                'pengujian_id' => $pengujian->id,
                'user_id' => $request->penguji_empat,
            ]);

            return redirect()->back()->with('sukses', 'Data berhasil ditambahkan!');
        } else {
            return redirect()->back()->with('error', 'Salah satu data penguji sama dengan data yang diuji!');
        }
    }

    public function list()
    {
        $pengujian_s = Pengujian::where('status', 'false')->latest()->get();
        return view('pengujian.list-pengujian', compact('pengujian_s'));
    }

    public function edit($slug)
    {

        $pengujian = Pengujian::where('slug', $slug)->first();
        $twrTheory = TwrTheory::where('pengujian_id', $pengujian->id)->first();
        $twrPractical = TwrPractical::where('pengujian_id', $pengujian->id)->first();
        $appTheory = AppTheory::where('pengujian_id', $pengujian->id)->first();
        $appPractical = AppPractical::where('pengujian_id', $pengujian->id)->first();
        return view('pengujian.kelola-pengujian', compact('pengujian', 'twrTheory', 'twrPractical', 'appTheory', 'appPractical'));
    }

    public function update(Request $request)
    {
        if ($request->key_twr_theory) {
            TwrTheory::where('id', $request->twr_theory)->update([
                'theory' => $request->theory_twr,
                'renewed_until' => $request->renewed_until_theory_twr,
                'score' => $request->score_theory_twr,
            ]);
        }

        if ($request->key_twr_practical) {
            TwrPractical::where('id', $request->twr_practical)->update([
                'practical' => $request->practical_twr,
                'renewed_until' => $request->renewed_until_practical_twr,
                'score' => $request->score_practical_twr,
            ]);
        }

        if ($request->key_app_theory) {
            AppTheory::where('id', $request->app_theory)->update([
                'theory' => $request->theory_app,
                'renewed_until' => $request->renewed_until_theory_app,
                'score' => $request->score_theory_app,
            ]);
        }

        if ($request->key_app_practical) {
            AppPractical::where('id', $request->app_practical)->update([
                'practical' => $request->practical_app,
                'renewed_until' => $request->renewed_until_practical_app,
                'score' => $request->score_practical_app,
            ]);
        }

        return redirect()->route('pengujian-list')->with('sukses', 'Data berhasil dikelola!');
    }

    public function verifikasi($slug)
    {
        $pengujian = Pengujian::where('slug', $slug)->first();
        $twrTheory = TwrTheory::where('pengujian_id', $pengujian->id)->first();
        $twrPractical = TwrPractical::where('pengujian_id', $pengujian->id)->first();
        $appTheory = AppTheory::where('pengujian_id', $pengujian->id)->first();
        $appPractical = AppPractical::where('pengujian_id', $pengujian->id)->first();
        if (
            $twrTheory->theory &&
            $twrTheory->renewed_until &&
            $twrTheory->score &&
            $twrPractical->practical &&
            $twrPractical->renewed_until &&
            $twrPractical->score &&
            $appTheory->theory &&
            $appTheory->renewed_until &&
            $appTheory->score &&
            $appPractical->practical &&
            $appPractical->renewed_until &&
            $appPractical->score
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

    public function destroy($slug)
    {
        $pengujian = Pengujian::where('slug', $slug)->first();
        $twrTheory = TwrTheory::where('pengujian_id', $pengujian->id)->first();
        $twrPractical = TwrPractical::where('pengujian_id', $pengujian->id)->first();
        $appTheory = AppTheory::where('pengujian_id', $pengujian->id)->first();
        $appPractical = AppPractical::where('pengujian_id', $pengujian->id)->first();
        TwrTheory::destroy($twrTheory->id);
        TwrPractical::destroy($twrPractical->id);
        AppTheory::destroy($appTheory->id);
        AppPractical::destroy($appPractical->id);
        Pengujian::destroy($pengujian->id);
        return redirect()->route('pengujian')->with('sukses', 'Data berhasil dihapus!');
    }

    public function atcPerformanceCek()
    {
        $pengujian_s = Pengujian::where('user_id', auth()->user()->id)->where('status', 'true')->get();
        return view('pengujian.atc-performance-cek', compact('pengujian_s'));
    }

    public function printAtcPerformanceCek()
    {
        $pengujian_s = Pengujian::where('user_id', auth()->user()->id)->where('status', 'true')->get();
        $user = User::where('id', auth()->user()->id)->first();
        return view('pengujian.print-atc-performance-cek', compact('pengujian_s', 'user'));
    }
}
