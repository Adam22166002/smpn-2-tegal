<?php

namespace App\Http\Controllers\Backend\Website;

use App\Http\Controllers\Controller;
use App\Models\Visimisi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class VisidanMisiController extends Controller
{

    protected $messages = [
        'visi.required'      => 'Visi wajib diisi.',
        'misi.required'      => 'Misi wajib diisi.',
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
        $visimisi = Visimisi::first();
        return view('backend.website.tentang.visiMisi', compact('visimisi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'visi'   => 'required|max:255',
            'misi'   => 'required',
            'image'  => 'required|mimes:jpeg,png,jpg|mimetypes:image/jpeg,image/png|max:1024',
        ], $this->messages);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        } else {

            $image = $request->file('image');
            $nama_img = time() . "_" . $image->getClientOriginalName();

            $folderPath = 'images/visimisi';
            $image->storeAs($folderPath, $nama_img, 'public');

            // Simpan data ke database
            $visimisi = new Visimisi();
            $visimisi->visi  = $request->input('visi');
            $visimisi->misi  = $request->input('misi');
            $visimisi->image = $nama_img;
            $visimisi->save();

            Session::flash('success', 'Visi dan Misi berhasil di tambah!');
            return redirect()->route('backend-visimisi.index');
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
        //
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
            'visi'   => 'required|string|max:255',
            'misi'   => 'required|string',
            'image'  => 'nullable|mimes:jpeg,png,jpg|mimetypes:image/jpeg,image/png|max:1024',
        ], $this->messages);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        } else {

            $visimisi = Visimisi::findOrFail($id);
            $visimisi->visi  = $request->input('visi');
            $visimisi->misi  = $request->input('misi');

            // Jika ada file gambar yang diunggah
            if ($request->hasFile('image')) {

                // Lakukan simpan file
                $image = $request->file('image');
                $nama_img = time() . "_" . $image->getClientOriginalName();

                // Lokasi penyimpanan di disk "public"
                $folderPath = 'images/visimisi';
                $image->storeAs($folderPath, $nama_img, 'public');

                // Hapus gambar lama dari storage jika ada
                if ($visimisi->image) {
                    Storage::disk('public')->delete("images/visimisi/{$visimisi->image}");
                }

                $visimisi->image = $nama_img;
            }

            $visimisi->save();
            Session::flash('success', 'Visi dan Misi berhasil di update!');
            return redirect()->route('backend-visimisi.index');
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
        //
    }
}
