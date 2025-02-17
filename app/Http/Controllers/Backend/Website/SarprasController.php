<?php

namespace App\Http\Controllers\Backend\Website;

use App\Http\Controllers\Controller;
use App\Models\Sarpras;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class SarprasController extends Controller
{
    protected $messages = [
        'nama.required'      => 'Nama sarana dan prasarana wajib diisi.',
        'deskripsi.required' => 'Deskripsi wajib diisi.',
        'image.required'     => 'Gambar tidak boleh kosong.',
        'image.mimes'        => 'Gambar yang dimasukan tidak valid.',
        'image.mimetypes'    => 'Gambar yang dimasukan tidak valid.',
        'image.max'          => 'Ukuran file gambar hanya bisa 1MB.'
    ];

    public function index()
    {
        $sarpras = Sarpras::all();
        return view('backend.website.tentang.sarpras', compact('sarpras'));
    }

    
    public function create()
    {
        return view('backend.website.tentang.sarpras.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama'        => 'required|max:255',
            'deskripsi'   => 'required',
            'image'       => 'required|mimes:jpeg,png,jpg|mimetypes:image/jpeg,image/png|max:1024',
        ], $this->messages);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        } else {
            $image = $request->file('image');
            $imageName = time() . "_" . $image->getClientOriginalName();
            $image->storeAs('images/sarpras', $imageName, 'public');

            $sarpras = new Sarpras();
            $sarpras->nama = $request->input('nama');
            $sarpras->deskripsi = $request->input('deskripsi');
            $sarpras->image = $imageName;
            $sarpras->save();

            Session::flash('success', 'Sarana dan prasarana berhasil ditambahkan!');
            return redirect()->route('backend-sarpras.index');
        }
    }
    public function edit($id)
    {
        $sarpras = Sarpras::findOrFail($id);
        return view('backend.website.tentang.sarpras.edit', compact('sarpras'));
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'nama'        => 'required|max:255',
            'deskripsi'   => 'required',
            'image'       => 'nullable|mimes:jpeg,png,jpg|mimetypes:image/jpeg,image/png|max:1024',
        ], $this->messages);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        } else {
            $sarpras = Sarpras::findOrFail($id);
            $sarpras->nama = $request->input('nama');
            $sarpras->deskripsi = $request->input('deskripsi');

            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = time() . "_" . $image->getClientOriginalName();
                $image->storeAs('images/sarpras', $imageName, 'public');

                // Hapus gambar lama dari storage jika ada
                if ($sarpras->image) {
                    Storage::disk('public')->delete('images/sarpras/' . $sarpras->image);
                }

                $sarpras->image = $imageName;
            }

            $sarpras->save();

            Session::flash('success', 'Sarana dan prasarana berhasil diperbarui!');
            return redirect()->route('backend-sarpras.index');
        }
    }

    // Menghapus sarana dan prasarana
    public function destroy($id)
    {
        $sarpras = Sarpras::findOrFail($id);

        // Hapus gambar dari storage jika ada
        if ($sarpras->image) {
            Storage::disk('public')->delete('images/sarpras/' . $sarpras->image);
        }

        $sarpras->delete();

        Session::flash('success', 'Sarana dan prasarana berhasil dihapus!');
        return redirect()->route('backend-sarpras.index');
    }
}
