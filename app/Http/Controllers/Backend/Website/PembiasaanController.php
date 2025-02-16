<?php

namespace App\Http\Controllers\Backend\Website;

use App\Http\Controllers\Controller;
use App\Models\PembiasaanSiswa;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class PembiasaanController extends Controller
{
    // Menampilkan data pembiasaan siswa
    public function index()
    {
        $pembiasaanSiswa = PembiasaanSiswa::all();
        return view('backend.website.pembiasaan.index', compact('pembiasaanSiswa'));
    }

    // Menampilkan form untuk membuat data baru
    public function create()
    {
        return view('backend.website.pembiasaan.create');
    }

    // Menyimpan data baru pembiasaan siswa
    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
        ]);

        PembiasaanSiswa::create($validated);

        Session::flash('success', 'Data Pembiasaan Siswa berhasil ditambahkan');
        return redirect()->route('backend-pembiasaan.index')->with('success', 'Data Pembiasaan Siswa berhasil ditambahkan');
    }

    // Menampilkan form untuk mengedit data
    public function edit($id)
    {
        $pembiasaanSiswa = PembiasaanSiswa::find($id);
        return view('backend.website.pembiasaan.edit', compact('pembiasaanSiswa'));
    }

    // Memperbarui data pembiasaan siswa
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
        ]);

        PembiasaanSiswa::whereId($id)->update($validated);

        session::flash('success', 'Data Pembiasaan Siswa berhasil diperbaharui');
        return redirect()->route('backend-pembiasaan.index')->with('success', 'Data Pembiasaan Siswa berhasil diperbaharui');
    }

    // Menghapus data pembiasaan siswa
    public function destroy($id)
    {
        PembiasaanSiswa::destroy($id);

        session::flash('success', 'Data Pembiasaan Siswa berhasil dihapus');
        return redirect()->route('backend-pembiasaan.index')->with('success', 'Data Pembiasaan Siswa berhasil dihapus');
    }
}

