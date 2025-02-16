<?php

namespace App\Http\Controllers\Backend\Website;

use App\Http\Controllers\Controller;
use App\Models\kurikulum;
use Illuminate\Http\Request;

class KurikulumController extends Controller
{
    // Menampilkan form untuk menambah atau mengupdate data kurikulum
    public function index()
    {
        // Cek apakah ada data kurikulum yang sudah ada
        $kurikulum = Kurikulum::first(); // Ambil satu data pertama (jika ada)
        
        return view('backend.website.kurikulum.index', compact('kurikulum'));
    }

    // Menyimpan atau memperbarui data kurikulum
    public function store(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
            'dokumen' => 'nullable|file|mimes:pdf,docx',
        ]);

        // Cek apakah dokumen ada dan proses upload
        $dokumenPath = $request->file('dokumen') ? $request->file('dokumen')->store('public/images/dokumen') : null;

        // Simpan data kurikulum, jika sudah ada maka update, jika belum simpan baru
        $kurikulum = Kurikulum::first(); // Ambil data pertama atau buat baru
        if ($kurikulum) {
            // Jika data sudah ada, update
            $kurikulum->update([
                'judul' => $validated['judul'],
                'deskripsi' => $validated['deskripsi'],
                'dokumen' => $dokumenPath,
            ]);
        } else {
            // Jika belum ada, buat data baru
            Kurikulum::create([
                'judul' => $validated['judul'],
                'deskripsi' => $validated['deskripsi'],
                'dokumen' => $dokumenPath,
            ]);
        }

        // Redirect dengan pesan sukses
        return redirect()->route('backend-kurikulum.index')->with('success', 'Kurikulum berhasil disimpan atau diperbarui');
    }
}