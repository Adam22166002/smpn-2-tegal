<?php

namespace App\Http\Controllers\Backend\Website;

use App\Http\Controllers\Controller;
use App\Models\Jurusan;
use Illuminate\Http\Request;
use App\Models\DataJurusan;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class ProgramController extends Controller
{

    protected $messages = [
        'nama.required'      => 'Nama jurusan tidak boleh kosong.',
        'nama.unique'        => 'Nama jurusan sudah pernah dibuat.',
        'singkatan.required' => 'Singkatan tidak boleh kosong.',
        'singkatan.unique'   => 'Singkatan sudah pernah dibuat.',
        'content.required'   => 'Content tidak boleh kosong.',
        'is_active.required' => 'Status tidak boleh kosong.',
        'image.required'     => 'Gambar tidak boleh kosong.',
        'image.mimes'        => 'Gambar yang dimasukan tidak valid.',
        'image.mimetypes'    => 'Gambar yang dimasukan tidak valid.',
        'image.max'          => 'Ukuran file gambar hanya bisa 1MB.',
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jurusan = Jurusan::all();
        return view('backend.website.program.index', compact('jurusan'));
    }

    public function create()
    {
        return view('backend.website.program.create');
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
            'nama'      => 'required|max:255',
            'singkatan' => 'required|max:10',
            'content'   => 'required',
            'image'     => 'required|mimes:jpeg,png,jpg|mimetypes:image/jpeg,image/png|max:1024',
        ], $this->messages);

        if ($validator->fails()) {
            return redirect('program-studi/create')
                ->withErrors($validator)
                ->withInput();
        } else {

            // Buat slug dari nama jurusan
            $url = Str::of($request->input('nama'))->slug('-');

            $jurusan = new Jurusan;
            $jurusan->nama      = $request->input('nama');
            $jurusan->slug      = $url;
            $jurusan->singkatan = $request->input('singkatan');
            $jurusan->is_active = '0';
            $jurusan->save();

            if ($jurusan) {

                // Simpan file gambar
                $foto = $request->file('image');
                $nama_foto = time() . "_" . $foto->getClientOriginalName();
                $tujuan_upload = 'public/images/jurusan';
                $foto->storeAs($tujuan_upload, $nama_foto);

                // Simpan data ke tabel data_jurusans
                $dataJurusan = new DataJurusan;
                $dataJurusan->jurusan_id = $jurusan->id;
                $dataJurusan->content    = $request->input('content');
                $dataJurusan->image      = $nama_foto;
                $dataJurusan->save();
            }

            Session::flash('success', 'Data jurusan berhasil di tambah!');
            return redirect()->route('program-studi.index');
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
        $jurusan = Jurusan::with('dataJurusan')->findOrFail($id);
        return view('backend.website.program.edit', compact('jurusan'));
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
            'nama'      => 'required|max:255',
            'singkatan' => 'required|max:10',
            'is_active' => 'required',
            'content'   => 'required',
            'image'     => 'mimes:jpeg,png,jpg|mimetypes:image/jpeg,image/png|max:1024',
        ], $this->messages);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        } else {

            $jurusan = Jurusan::findOrFail($id);
            $jurusan->nama      = $request->input('nama');
            $jurusan->singkatan = $request->input('singkatan');
            $jurusan->is_active = $request->input('is_active');
            $jurusan->save();

            if ($jurusan) {
                $dataJurusan = DataJurusan::where('jurusan_id', $id)->first();

                if ($request->hasFile('image')) {
                    $disk = 'public';
                    $folderPath = 'images/jurusan';
                    $foto = $request->file('image');
                    $nama_foto = time() . "_" . $foto->getClientOriginalName();


                    // Hapus file lama jika ada
                    if ($dataJurusan && $dataJurusan->image) {
                        Storage::disk($disk)->delete("$folderPath/{$dataJurusan->image}");
                    }

                    // Simpan file baru
                    $foto->storeAs($folderPath, $nama_foto, $disk);

                    $dataJurusan->image   = $nama_foto;
                }

                $dataJurusan->content = $request->input('content');
                $dataJurusan->save();
            }

            Session::flash('success', 'Data jurusan berhasil di update!');
            return redirect()->route('program-studi.index');
        }
    }

    public function destroy($id)
    {
        $jurusan = Jurusan::find($id);
        $jurusan_detail = DataJurusan::where('jurusan_id', $jurusan->id)->first();
        $destinationPath = public_path('storage/images/jurusan/');
        unlink($destinationPath . $jurusan_detail->image);

        $jurusan->delete();
        $jurusan_detail->delete();
        Session::flash('success', 'Data jurusan berhasil di hapus!');
        return redirect()->route('program-studi.index');
    }
}
