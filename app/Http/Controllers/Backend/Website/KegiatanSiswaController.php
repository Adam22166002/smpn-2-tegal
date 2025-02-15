<?php

namespace App\Http\Controllers\Backend\Website;

use App\Http\Controllers\Controller;
use App\Models\Kegiatan;
use Illuminate\Http\Request;
use App\Http\Requests\KegiatanRequest;
use App\Models\KegiatanSiswa;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class KegiatanSiswaController extends Controller
{
    public function index()
    {
        $kegiatan = KegiatanSiswa::latest()->paginate(10);
        return view('backend.website.kegiatan-siswa.index', compact('kegiatan'));
    }

    public function create()
    {
        return view('backend.website.kegiatan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
            'gambar' => 'nullable|image',
            'tanggal' => 'required|date',
        ]);

        $data = $request->all();
        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('kegiatan', 'public');
        }

        KegiatanSiswa::create($data);
        return redirect()->route('backend-kegiatan-siswa.index')->with('success', 'Kegiatan siswa berhasil ditambahkan');
    }

    public function edit($id)
    {
        $kegiatanSiswa = KegiatanSiswa::findOrFail($id);
        return view('backend.website.kegiatan.edit', compact('kegiatanSiswa'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
            'gambar' => 'nullable|image',
            'tanggal' => 'required|date',
        ]);

        $kegiatanSiswa = KegiatanSiswa::findOrFail($id);
        $data = $request->all();

        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('kegiatan', 'public');
        }

        $kegiatanSiswa->update($data);
        return redirect()->route('backend-kegiatan-siswa.index')->with('success', 'Kegiatan siswa berhasil diperbarui');
    }


    public function destroy($id)
    {
        $kegiatanSiswa = KegiatanSiswa::findOrFail($id);
        $kegiatanSiswa->delete();
        
        return redirect()->route('backend-kegiatan-siswa.index')->with('success', 'Kegiatan siswa berhasil dihapus');
    }

}
