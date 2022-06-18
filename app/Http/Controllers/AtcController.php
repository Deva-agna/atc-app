<?php

namespace App\Http\Controllers;

use App\Models\Atc;
use App\Models\Biodata;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AtcController extends Controller
{
    public function index()
    {
        $atcs = Atc::where('user_id', auth()->user()->id)->latest()->get();
        return view('atc.index', compact('atcs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'tgl' => 'required'
        ]);

        $atc = Atc::where('tgl', $request->tgl)->where('user_id', auth()->user()->id)->first();

        if ($atc) {
            return redirect()->back()->with('error', 'tanggal sudah tersedia!');
        }

        Atc::create([
            'user_id' => auth()->user()->id,
            'tgl' => $request->tgl,
            'slug' => Str::of($request->tgl . '-' . time())->slug('-'),
        ]);

        return redirect()->back()->with('sukses', 'Data berhasil ditambah!');
    }

    public function edit($slug)
    {
        $atc = Atc::where('slug', $slug)->first();
        return view('atc.kelola-atc', compact('atc'));
    }

    public function update(Request $request)
    {
        Atc::where('id', $request->id)->update([
            'morning_ctr' => $request->morning_ctr,
            'morning_ass' => $request->morning_ass,
            'morning_rest' => $request->morning_rest,
            'afternoon_ctr' => $request->afternoon_ctr,
            'afternoon_ass' => $request->afternoon_ass,
            'afternoon_rest' => $request->afternoon_rest,
            'night_ctr' => $request->night_ctr,
            'night_ass' => $request->night_ass,
            'night_rest' => $request->night_rest,
            'unit' => $request->unit,
            'remark' => $request->remark,
        ]);

        return redirect()->route('atc')->with('sukses', 'ATC Berhasil dikelola!');
    }

    public function destroy($slug)
    {
        $atc = Atc::where('slug', $slug)->first();
        Atc::destroy($atc->id);

        return redirect()->route('atc')->with('sukses', 'Data berhasil dihapus!');
    }

    public function printAtc()
    {
        $atcs = Atc::where('user_id', auth()->user()->id)->get();

        if (request('cari')) {
            $atcs = Atc::where('tgl', 'like', '%' . request('cari') . '%')->where('user_id', auth()->user()->id)->get();
        }

        return view('atc.print-atc', compact('atcs'));
    }

    public function printAllAtc()
    {
        $atcs = Atc::get();

        if (request('cari')) {
            $atcs = Atc::where('tgl', 'like', '%' . request('cari') . '%')->orderBy('user_id')->get();
        }

        return view('atc.print-all-atc', compact('atcs'));
    }

    public function atcList()
    {
        $atcs = Atc::latest()->get();
        return view('atc.atc-list', compact('atcs'));
    }
}
