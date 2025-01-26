<?php

namespace App\Http\Controllers\Backend\Website;

use App\Http\Controllers\Controller;
use App\Models\KategoriBerita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;

class KategoriBeritaController extends Controller
{

    protected $messages = [
        'nama.required'      => 'Nama kategori berita tidak boleh kosong.',
        'nama.unique'        => 'Nama kategori berita sudah ada.',
        'nama.max'           => 'Nama kategori berita tidak boleh lebih dari 255 karakter.',
        'is_active.required' => 'Status tidak boleh kosong.'
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kategori = KategoriBerita::all();
        return view('backend.website.content.kategoriBerita.index', compact('kategori'));
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
            'nama'      => 'required|max:255|unique:kategori_beritas',
            'is_active' => 'required',
        ], $this->messages);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        } else {

            $kategori = new KategoriBerita();
            $kategori->nama      = $request->input('nama');
            $kategori->is_active = $request->input('is_active');
            $kategori->save();

            Session::flash('success', 'Kategori berita berhasil di tambah!');
            return redirect()->route('backend-kategori-berita.index');
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
        $kategori = KategoriBerita::find($id);
        return view('backend.website.content.kategoriBerita.edit', compact('kategori'));
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
            'is_active' => 'required',
        ], $this->messages);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        } else {

            $kategori = KategoriBerita::findOrFail($id);
            $kategori->nama      = $request->input('nama');
            $kategori->is_active = $request->input('is_active');
            $kategori->save();

            Session::flash('success', 'Kategori berita berhasil di update!');
            return redirect()->route('backend-kategori-berita.index');
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
        $kategori = KategoriBerita::find($id);
        $kategori->delete();
        Session::flash('success', 'Kategori berita berhasil di hapus!');
        return redirect()->route('backend-kategori-berita.index');
    }
}
