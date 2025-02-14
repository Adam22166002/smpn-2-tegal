<?php

namespace App\Http\Controllers\Backend\Website;

use App\Http\Controllers\Controller;
use App\Models\Prestasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PrestasiController extends Controller
{
    public function index()
    {
        $prestasi = Prestasi::all();
        return view('backend.website.prestasi.index', compact('prestasi'));
    }

    public function create()
    {
        return view('backend.website.prestasi.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_siswa' => 'required|string|max:255',
            'prestasi' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'tingkat' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'tanggal' => 'required|date',
        ]);

        $path = $request->file('gambar')->store('public/images/prestasi');
        $imageName = str_replace('public/', '', $path);

        Prestasi::create([
            'nama_siswa' => $request->nama_siswa,
            'prestasi' => $request->prestasi,
            'deskripsi' => $request->deskripsi,
            'tingkat' => $request->tingkat,
            'gambar' => $imageName,
            'tanggal' => $request->tanggal
        ]);


        return redirect()->route('backend-prestasi.index')->with('success', 'Prestasi berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $prestasi = Prestasi::findOrFail($id);
        return view('backend.website.prestasi.edit', compact('prestasi'));
    }

    public function update(Request $request, $id)
{
    $prestasi = Prestasi::findOrFail($id);

    $request->validate([
        'nama_siswa' => 'required|string|max:255',
        'prestasi' => 'required|string|max:255',
        'deskripsi' => 'nullable|string',
        'tingkat' => 'required|string',
        'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'tanggal' => 'required|date',
    ]);

    if ($request->hasFile('gambar')) {
        Storage::delete('public/' . $prestasi->gambar);
        $path = $request->file('gambar')->store('public/images/prestasi');
        $prestasi->gambar = str_replace('public/', '', $path);
    }

    $prestasi->update([
        'nama_siswa' => $request->nama_siswa,
        'prestasi' => $request->prestasi,
        'deskripsi' => $request->deskripsi,
        'tingkat' => $request->tingkat,
        'tanggal' => $request->tanggal
    ]);

    return redirect()->route('backend-prestasi.index')->with('success', 'Prestasi berhasil diperbarui!');
}


    public function destroy($id)
    {
        $prestasi = Prestasi::findOrFail($id);
        Storage::delete('public/' . $prestasi->image);
        $prestasi->delete();

        return redirect()->route('backend-prestasi.index')->with('success', 'Prestasi berhasil dihapus!');
    }
}
