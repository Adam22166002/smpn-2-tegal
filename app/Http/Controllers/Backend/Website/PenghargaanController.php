<?php

namespace App\Http\Controllers\Backend\Website;

use App\Http\Controllers\Controller;
use App\Models\Penghargaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class PenghargaanController extends Controller
{
    protected $messages = [
        'nama.required'      => 'Nama penghargaan wajib diisi.',
        'tahun.required'     => 'Tahun penghargaan wajib diisi.',
        'penyelenggara.required' => 'Penyelenggara penghargaan wajib diisi.',
        'deskripsi.required' => 'Deskripsi penghargaan wajib diisi.',
        'image.required'     => 'Gambar tidak boleh kosong.',
        'image.mimes'        => 'Gambar yang dimasukan tidak valid.',
        'image.mimetypes'    => 'Gambar yang dimasukan tidak valid.',
        'image.max'          => 'Ukuran file gambar hanya bisa 1MB.'
    ];

    /**
     * Menampilkan data penghargaan.
     */
    public function index()
    {
        $penghargaan = Penghargaan::all();
        return view('backend.website.penghargaan.index', compact('penghargaan'));
    }

    /**
     * Menampilkan form untuk membuat penghargaan baru.
     */
    public function create()
    {
        return view('backend.website.penghargaan.create');
    }

    /**
     * Menyimpan data penghargaan baru.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama'         => 'required|string|max:255',
            'tahun'        => 'required|integer',
            'penyelenggara'=> 'required|string|max:255',
            'deskripsi'    => 'required|string',
            'image'        => 'required|mimes:jpeg,png,jpg|mimetypes:image/jpeg,image/png|max:1024',
        ], $this->messages);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $image = $request->file('image');
        $imageName = time() . "_" . $image->getClientOriginalName();
        $folderPath = 'images/penghargaan';
        $image->storeAs($folderPath, $imageName, 'public');

        $penghargaan = new Penghargaan();
        $penghargaan->nama = $request->input('nama');
        $penghargaan->tahun = $request->input('tahun');
        $penghargaan->penyelenggara = $request->input('penyelenggara');
        $penghargaan->deskripsi = $request->input('deskripsi');
        $penghargaan->image = $imageName;
        $penghargaan->save();

        Session::flash('success', 'Penghargaan berhasil ditambahkan!');
        return redirect()->route('backend-penghargaan.index');
    }
    public function show($id)
    {
        $penghargaan = Penghargaan::findOrFail($id);
        return view('backend.website.penghargaan.edit', compact('penghargaan'));
    }


    /**
     * Menampilkan form untuk mengedit penghargaan.
     */
    public function edit($id)
    {
        $penghargaan = Penghargaan::findOrFail($id);
        return view('backend.website.penghargaan.edit', compact('penghargaan'));
    }

    /**
     * Memperbarui data penghargaan.
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'nama'         => 'required|string|max:255',
            'tahun'        => 'required|integer',
            'penyelenggara'=> 'required|string|max:255',
            'deskripsi'    => 'required|string',
            'image'        => 'nullable|mimes:jpeg,png,jpg|mimetypes:image/jpeg,image/png|max:1024',
        ], $this->messages);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $penghargaan = Penghargaan::findOrFail($id);
        $penghargaan->nama = $request->input('nama');
        $penghargaan->tahun = $request->input('tahun');
        $penghargaan->penyelenggara = $request->input('penyelenggara');
        $penghargaan->deskripsi = $request->input('deskripsi');

        // Jika ada file gambar yang diunggah
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . "_" . $image->getClientOriginalName();
            $folderPath = 'images/penghargaan';
            $image->storeAs($folderPath, $imageName, 'public');

            // Hapus gambar lama
            if ($penghargaan->image) {
                Storage::disk('public')->delete("images/penghargaan/{$penghargaan->image}");
            }

            $penghargaan->image = $imageName;
        }

        $penghargaan->save();
        Session::flash('success', 'Penghargaan berhasil diupdate!');
        return redirect()->route('backend-penghargaan.index');
    }

    /**
     * Menghapus data penghargaan.
     */
    public function destroy($id)
    {
        $penghargaan = Penghargaan::findOrFail($id);
        
        // Hapus gambar dari storage
        if ($penghargaan->image) {
            Storage::disk('public')->delete("images/penghargaan/{$penghargaan->image}");
        }

        $penghargaan->delete();
        Session::flash('success', 'Penghargaan berhasil dihapus!');
        return redirect()->route('backend-penghargaan.index');
    }
}
