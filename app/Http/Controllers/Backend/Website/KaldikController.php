<?php

namespace App\Http\Controllers\Backend\Website;

use App\Http\Controllers\Controller;
use App\Models\Kaldik;
use Carbon\Carbon;
use Illuminate\Http\Request;

class KaldikController extends Controller
{
    public function index()
    {
        $kaldik = Kaldik::all()->map(function($item) {
            $item->tanggal = Carbon::parse($item->tanggal);
            return $item;
        });
        return view('backend.website.kaldik.index', compact('kaldik'));
    }
    public function create()
    {
        return view('backend.website.kaldik.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_kegiatan' => 'required',
            'tanggal' => 'required|date',
            'deskripsi' => 'required',
        ], [
        'nama_kegiatan.required' => 'Nama kegiatan harus diisi.',
        'tanggal.required' => 'Tanggal harus diisi.',
        'tanggal.date' => 'Tanggal harus dalam format yang valid.',
        'deskripsi.required' => 'Deskripsi harus diisi.',
        ]);

        Kaldik::create($validated);

        return redirect()->route('backend-kaldik.index')->with('succes', 'kalender pendidik berhasil ditambah');
    }

    public function edit($id)
    {
        $kaldik = Kaldik::find($id);
        return view('backend.website.kaldik.edit', compact('kaldik'));
    }
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nama_kegiatan' => 'required',
            'tanggal' => 'required|date',
            'deskripsi' => 'required',
        ], [
        'nama_kegiatan.required' => 'Nama kegiatan harus diisi.',
        'tanggal.required' => 'Tanggal harus diisi.',
        'tanggal.date' => 'Tanggal harus dalam format yang valid.',
        'deskripsi.required' => 'Deskripsi harus diisi.',
        ]);

        Kaldik::whereId($id)->update($validated);

        return redirect()->route('backend-kaldik.index')->with('succes', 'kalender pendidik berhasil diperbaharui');
    }

    public function destroy($id)
    {
        Kaldik::destroy($id);
        return redirect()->route('backend-kaldik.index')->with('succes', 'kalender pendidik berhasil dihapus');
    }
}
