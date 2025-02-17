<?php

namespace App\Http\Controllers\Backend\Website;

use App\Http\Controllers\Controller;
use App\Models\Informasi;
use Illuminate\Http\Request;

class InformasiController extends Controller
{
    public function index()
    {
        $informasi = Informasi::all();
        return view('backend.website.informasi.index', compact('informasi'));
    }

    // Menampilkan form untuk membuat pengumuman baru
    public function create()
    {
        return view('backend.website.informasi.create');
    }

    // Menyimpan pengumuman baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
            'kategori' => 'required',
        ], [
    'judul.required' => 'Judul harus diisi.',
    'deskripsi.required' => 'Deskripsi harus diisi.',
    'kategori.required' => 'Kategori harus diisi.',
]);

        Informasi::create($validated);

        return redirect()->route('backend-informasi.index');
    }

    // Menampilkan form untuk mengedit pengumuman
    public function edit($id)
    {
        $informasi = Informasi::find($id);
        return view('backend.website.informasi.edit', compact('informasi'));
    }

    // Memperbarui pengumuman
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
            'kategori' => 'required',
        ], [
    'judul.required' => 'Judul harus diisi.',
    'deskripsi.required' => 'Deskripsi harus diisi.',
    'kategori.required' => 'Kategori harus diisi.',
]);

        Informasi::whereId($id)->update($validated);

        return redirect()->route('backend-informasi.index');
    }

    // Menghapus pengumuman
    public function destroy($id)
    {
        Informasi::destroy($id);
        return redirect()->route('backend-informasi.index');
    }
}
