<?php

namespace App\Http\Controllers\Backend\Website;

use App\Http\Controllers\Controller;
use App\Models\Kegiatan;
use Illuminate\Http\Request;
use App\Http\Requests\KegiatanRequest;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class KegiatanController extends Controller
{

    protected $messages = [
        'nama.required'      => 'Ekstrakurikuler tidak boleh kosong.',
        'nama.unique'        => 'Ekstrakurikuler sudah pernah dibuat.',
        'content.required'   => 'Content tidak boleh kosong.',
        'image.required'     => 'Gambar tidak boleh kosong.',
        'image.mimes'        => 'Gambar yang dimasukan tidak valid.',
        'image.mimetypes'    => 'Gambar yang dimasukan tidak valid.',
        'image.max'          => 'Ukuran file gambar hanya bisa 1MB.'
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kegiatan = Kegiatan::all();
        return view('backend.website.kegiatan.index', compact('kegiatan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.website.kegiatan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(KegiatanRequest $request)
    {

        $validator = Validator::make($request->all(), [
            'nama'    => 'required|string|max:255',
            'content' => 'required|string',
            'image'   => 'required|mimes:jpeg,png,jpg|mimetypes:image/jpeg,image/png|max:1024'
        ], $this->messages);

        if ($validator->fails()) {
            return redirect('backend-kegiatan/create')
                ->withErrors($validator)
                ->withInput();
        } else {

            $nama_img = null;
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $nama_img = time() . "_" . $image->getClientOriginalName();

                $tujuan_upload = 'public/images/kegiatan';
                $image->storeAs($tujuan_upload, $nama_img);
            }

            // Buat slug dari nama kegiatan
            $url = Str::of($request->input('nama'))->slug('-');

            // Simpan data ke tabel kegiatan
            $kegiatan = new Kegiatan();
            $kegiatan->nama    = $request->input('nama');
            $kegiatan->slug    = $url;
            $kegiatan->image   = $nama_img;
            $kegiatan->content = $request->input('content');
            $kegiatan->save();

            Session::flash('success', 'Ekstrakurikuler berhasil di tambah!');
            return redirect()->route('backend-kegiatan.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {}

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kegiatan = Kegiatan::find($id);
        return view('backend.website.kegiatan.edit', compact('kegiatan'));
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
            'nama'    => 'required|string|max:255',
            'content' => 'required|string',
            'image'   => 'nullable|mimes:jpeg,png,jpg|mimetypes:image/jpeg,image/png|max:1024',
            'is_active' => 'required',
        ], $this->messages);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        } else {

            // Update data kegiatan
            $url = Str::of($request->input('nama'))->slug('-');
            $kegiatan = Kegiatan::findOrFail($id);
            $kegiatan->nama         = $request->input('nama');
            $kegiatan->slug         = $url;
            $kegiatan->is_active    = $request->input('is_active');
            $kegiatan->content      = $request->input('content');

            // Cek apakah ada file gambar
            if ($request->hasFile('image')) {

                // Jika ada lakukan simpan file
                $image = $request->file('image');
                $nama_img = time() . "_" . $image->getClientOriginalName();

                // Lokasi penyimpanan di disk "public"
                $folderPath = 'images/kegiatan';

                // Hapus file lama jika ada
                if ($kegiatan->image) {
                    Storage::disk('public')->delete("$folderPath/{$kegiatan->image}");
                }

                // Simpan file baru
                $image->storeAs($folderPath, $nama_img, 'public');
                $kegiatan->image = $nama_img;
            }

            $kegiatan->save();

            Session::flash('success', 'Ekstrakurikuler berhasil di update!');
            return redirect()->route('backend-kegiatan.index');
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
        $kegiatan = Kegiatan::find($id);
        $destinationPath = public_path('storage/images/kegiatan/');
        unlink($destinationPath . $kegiatan->image);
        $kegiatan->delete();

        Session::flash('success', 'Ekstrakurikuler berhasil di hapus!');
        return redirect()->route('backend-kegiatan.index');
    }
}
