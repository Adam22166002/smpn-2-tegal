<?php

namespace App\Http\Controllers\Backend\Website;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use App\Models\KategoriBerita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class BeritaController extends Controller
{

    protected $messages = [
        'title.required'        => 'Judul berita tidak boleh kosong.',
        'title.max'             => 'Judul berita tidak boleh lebih dari 255 karakter.',
        'kategori_id.required'  => 'Kategori berita tidak boleh kosong.',
        'thumbnail.required'    => 'Gambar thumbnail tidak boleh kosong.',
        'thumbnail.mimes'       => 'Gambar thumbnail yang dimasukan tidak valid.',
        'thumbnail.mimetypes'   => 'Gambar thumbnail yang dimasukan tidak valid.',
        'thumbnail.max'         => 'Maksimal gambar thumbnail tidak boleh lebih dari 1MB.',
        'content.required'      => 'Content tidak boleh kosong.',
        'is_active.required'    => 'Status tidak boleh kosong.'
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Cek kategori
        $kategori = KategoriBerita::where('is_Active', '0')->get();

        //Berita
        $berita = Berita::all();
        return view('backend.website.content.berita.index', compact('kategori', 'berita'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategori = KategoriBerita::where('is_Active', '0')->get();
        return view('backend.website.content.berita.create', compact('kategori'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title'        => 'required|max:255',
            'content'      => 'required',
            'kategori_id'  => 'required',
            'thumbnail'    => 'required|mimes:jpeg,png,jpg|mimetypes:image/jpeg,image/png|max:1024',
        ], $this->messages);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        } else {

            $image = $request->file('thumbnail');
            $nama_image = time() . "_" . $image->getClientOriginalName();

            // Lokasi penyimpanan
            $tujuan_upload = 'public/images/berita';
            $image->storeAs($tujuan_upload, $nama_image);

            // Create buat slug judul
            $slug = Str::slug($request->title);

            // Simpan data berita
            $berita = new Berita;
            $berita->title          = $request->title;
            $berita->slug           = $slug;
            $berita->content        = $request->content;
            $berita->kategori_id    = $request->kategori_id;
            $berita->thumbnail      = $nama_image;
            $berita->created_by     = Auth::id();
            $berita->is_active      = '0';
            $berita->save();

            Session::flash('success', 'Berita berhasil di tambah!');
            return redirect()->route('backend-berita.index');
        }
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kategori = KategoriBerita::where('is_Active', '0')->get();
        $berita = Berita::find($id);
        return view('backend.website.content.berita.edit', compact('kategori', 'berita'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'title'       => 'required|max:255',
            'content'     => 'required',
            'kategori_id' => 'required',
            'thumbnail'   => 'nullable|mimes:jpeg,png,jpg|mimetypes:image/jpeg,image/png|max:1024',
            'is_active'   => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        } else {

            $berita = Berita::findOrFail($id);
            $berita->title       = $request->input('title');
            $berita->slug        = Str::slug($request->input('title'));
            $berita->content     = $request->input('content');
            $berita->kategori_id = $request->input('kategori_id');
            $berita->is_active   = $request->input('is_active');

            // Cek jika ada file thumbnail baru
            if ($request->hasFile('thumbnail')) {
                $image = $request->file('thumbnail');
                $nama_image = time() . "_" . $image->getClientOriginalName();

                // Lokasi penyimpanan di disk "public"
                $tujuan_upload = 'images/berita';
                $image->storeAs($tujuan_upload, $nama_image, 'public');

                // Hapus file lama jika ada
                if ($berita->thumbnail) {
                    Storage::disk('public')->delete("images/berita/{$berita->thumbnail}");
                }

                // Update thumbnail dengan file baru
                $berita->thumbnail = $nama_image;
            }

            $berita->save();
            Session::flash('success', 'Berita berhasil di update!');
            return redirect()->route('backend-berita.index');
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $berita = Berita::find($id);
        $destinationPath = public_path('storage/images/berita/');
        unlink($destinationPath . $berita->thumbnail);

        $berita->delete();
        Session::flash('success', 'Data berita berhasil di hapus!');
        return redirect()->route('backend-berita.index');
    }
}
