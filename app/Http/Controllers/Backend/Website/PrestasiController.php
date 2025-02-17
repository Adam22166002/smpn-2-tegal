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
        ], [
            'nama_siswa.required' => 'Nama siswa harus diisi.',
            'nama_siswa.string' => 'Nama siswa harus berupa teks.',
            'nama_siswa.max' => 'Nama siswa maksimal 255 karakter.',
            'prestasi.required' => 'Prestasi harus diisi.',
            'prestasi.string' => 'Prestasi harus berupa teks.',
            'prestasi.max' => 'Prestasi maksimal 255 karakter.',
            'deskripsi.string' => 'Deskripsi harus berupa teks.',
            'tingkat.required' => 'Tingkat harus diisi.',
            'tingkat.string' => 'Tingkat harus berupa teks.',
            'gambar.image' => 'Gambar harus berupa file gambar.',
            'gambar.mimes' => 'Gambar harus memiliki format jpeg, png, jpg, gif, atau svg.',
            'gambar.max' => 'Ukuran gambar maksimal 2MB.',
            'tanggal.required' => 'Tanggal harus diisi.',
            'tanggal.date' => 'Tanggal harus berupa format tanggal yang valid.',
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
    ], [
        'nama_siswa.required' => 'Nama siswa harus diisi.',
        'nama_siswa.string' => 'Nama siswa harus berupa teks.',
        'nama_siswa.max' => 'Nama siswa maksimal 255 karakter.',
        'prestasi.required' => 'Prestasi harus diisi.',
        'prestasi.string' => 'Prestasi harus berupa teks.',
        'prestasi.max' => 'Prestasi maksimal 255 karakter.',
        'deskripsi.string' => 'Deskripsi harus berupa teks.',
        'tingkat.required' => 'Tingkat harus diisi.',
        'tingkat.string' => 'Tingkat harus berupa teks.',
        'gambar.image' => 'Gambar harus berupa file gambar.',
        'gambar.mimes' => 'Gambar harus memiliki format jpeg, png, jpg, gif, atau svg.',
        'gambar.max' => 'Ukuran gambar maksimal 2MB.',
        'tanggal.required' => 'Tanggal harus diisi.',
        'tanggal.date' => 'Tanggal harus berupa format tanggal yang valid.',
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
