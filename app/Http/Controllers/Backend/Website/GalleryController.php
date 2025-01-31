<?php

namespace App\Http\Controllers\Backend\Website;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    protected $messages = [
        'title.required'        => 'Judul galeri tidak boleh kosong.',
        'title.max'             => 'Judul galeri tidak boleh lebih dari 255 karakter.',
        'category.required'     => 'Kategori galeri tidak boleh kosong.',
        'category.max'          => 'Kategori galeri tidak boleh lebih dari 50 karakter.',
        'description.required'  => 'Deskripsi galeri tidak boleh kosong.',
        'image.required'        => 'Kategori galeri gambar tidak boleh kosong.',
        'image.mimes'           => 'Kategori galeri gambar yang dimasukan tidak valid.',
        'image.mimetypes'       => 'Kategori galeri gambar yang dimasukan tidak valid.',
        'image.max'             => 'Maksimal kategori galeri gambar tidak boleh lebih dari 1MB.'
    ];

    public function index()
    {
        // Menampilkan semua galeri
        $galleries = Gallery::all();
        return view('backend.website.content.gallery.index', compact('galleries'));
    }

    public function create()
    {
        return view('backend.website.content.gallery.create');
    }

    public function edit($id)
    {
        $gallery = Gallery::find($id);
        return view('backend.website.content.gallery.edit', compact('gallery'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:255',
            'image' => 'required|mimes:jpeg,png,jpg|mimetypes:image/jpeg,image/png|max:1024',
            'category' => 'required|max:50',
            'description' => 'required',
        ], $this->messages);

        if ($validator->fails()) {
            Session::flash('error', 'Gagal memasukkan data galeri. Mohon masukkan data dengan benar.');
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        } else {

            $image = $request->file('image');
            $nama_image = time() . "_" . $image->getClientOriginalName();

            // Lokasi penyimpanan
            $tujuan_upload = 'public/images/galeri';
            $image->storeAs($tujuan_upload, $nama_image);

            Gallery::create([
                'title' => $request->input('title'),
                'image' => $nama_image,
                'category' => $request->input('category'),
                'description' => $request->input('description'),
            ]);

            return redirect('/backend-gallery')->with('success', 'Data galeri berhasil ditambahkan!');
        }
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:255',
            'image' => 'mimes:jpeg,png,jpg|mimetypes:image/jpeg,image/png|max:1024',
            'category' => 'required|max:50',
            'description' => 'required',
        ], $this->messages);

        if ($validator->fails()) {
            Session::flash('error', 'Gagal memasukkan data galeri. Mohon masukkan data dengan benar.');
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        } else {

            $gallery = Gallery::findOrFail($id);
            $gallery->title       = $request->input('title');
            $gallery->category    = $request->input('category');
            $gallery->description = $request->input('description');

            // Cek jika ada file gambar baru
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $nama_image = time() . "_" . $image->getClientOriginalName();

                // Lokasi penyimpanan di disk "public"
                $tujuan_upload = 'images/galeri';
                $image->storeAs($tujuan_upload, $nama_image, 'public');

                // Hapus file lama jika ada
                if ($gallery->image) {
                    Storage::disk('public')->delete("images/galeri/{$gallery->image}");
                }

                // Update image dengan file baru
                $gallery->image = $nama_image;
            }

            $gallery->save();
            Session::flash('success', 'Data galeri berhasil di update!');
            return redirect('/backend-gallery');
        }
    }

    public function destroy($id)
    {
        $gallery = Gallery::find($id);
        $destinationPath = public_path('storage/images/galeri/');
        unlink($destinationPath . $gallery->image);

        $gallery->delete();
        Session::flash('success', 'Data galeri berhasil di hapus!');
        return redirect('/backend-gallery');
    }
}
