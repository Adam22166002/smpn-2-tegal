<?php

namespace App\Http\Controllers\Backend\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MataPelajaran;
use App\Imports\MataPelajaranImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class MataPelajaranController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mata_pelajaran = MataPelajaran::all();
        return view('backend.website.mata-pelajaran.index', compact('mata_pelajaran'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.website.mata-pelajaran.create');
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
            'nama' => 'required',
            'kode' => 'required|max:10|unique:mata_pelajaran',
            'waktu_masuk' => 'required|date_format:H:i',
            'waktu_selesai' => 'required|date_format:H:i'
        ], [
            'nama.required' => 'Nama mata pelajaran tidak boleh kosong.',
            'kode.required' => 'Kode mata pelajaran tidak boleh kosong.',
            'kode.max' => 'Kode mata pelajaran tidak boleh lebih dari 10 karakter.',
            'kode.unique' => 'Kode mata pelajaran sudah di gunakan.',
            'waktu_masuk.required' => 'Waktu masuk tidak boleh kosong.',
            'waktu_selesai.required' => 'Waktu selesai tidak boleh kosong.',
            'waktu_masuk.date_format' => 'Jam waktu masuk tidak valid.',
            'waktu_selesai.date_format' => 'Jam waktu selesai tidak valid.'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        } else {

            $request_nama_mata_pelajaran = trim($request->input('nama'));
            $request_kode_mata_pelajaran = trim(ucwords($request->input('kode')));
            $request_waktu_masuk = $request->input('waktu_masuk');
            $request_waktu_selesai = $request->input('waktu_selesai');

            MataPelajaran::create([
                'nama' => $request_nama_mata_pelajaran,
                'kode' => $request_kode_mata_pelajaran,
                'waktu_masuk' => $request_waktu_masuk,
                'waktu_selesai' => $request_waktu_selesai
            ]);

            Session::flash('success', 'Data mata pelajaran berhasil di tambahkan!');
            return redirect()->route('backend-mata-pelajaran.index');
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
        $mata_pelajaran = MataPelajaran::find($id);

        return view('backend.website.mata-pelajaran.edit', compact('mata_pelajaran'));
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
            'nama' => 'required',
            'kode' => 'required|max:10',
            'waktu_masuk' => 'required|date_format:H:i',
            'waktu_selesai' => 'required|date_format:H:i'
        ], [
            'nama.required' => 'Nama mata pelajaran tidak boleh kosong.',
            'kode.required' => 'Kode mata pelajaran tidak boleh kosong.',
            'kode.max' => 'Kode mata pelajaran tidak boleh lebih dari 10 karakter.',
            'waktu_masuk.required' => 'Waktu masuk tidak boleh kosong.',
            'waktu_selesai.required' => 'Waktu selesai tidak boleh kosong.',
            'waktu_masuk.date_format' => 'Jam waktu masuk tidak valid.',
            'waktu_selesai.date_format' => 'Jam waktu selesai tidak valid.'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        } else {

            $request_nama_mata_pelajaran = trim($request->input('nama'));
            $request_kode_mata_pelajaran = trim(ucwords($request->input('kode')));
            $request_waktu_masuk = $request->input('waktu_masuk');
            $request_waktu_selesai = $request->input('waktu_selesai');

            $mata_pelajaran = MataPelajaran::find($id);
            $mata_pelajaran->nama = $request_nama_mata_pelajaran;
            $mata_pelajaran->kode = $request_kode_mata_pelajaran;
            $mata_pelajaran->waktu_masuk = $request_waktu_masuk;
            $mata_pelajaran->waktu_selesai = $request_waktu_selesai;
            $mata_pelajaran->save();

            Session::flash('success', 'Data mata pelajaran berhasil di update!');
            return redirect()->route('backend-mata-pelajaran.index');
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
        $mata_pelajaran = MataPelajaran::find($id);
        $mata_pelajaran->delete();
        Session::flash('success', 'Data mata pelajaran berhasil di hapus.');
        return redirect()->back();
    }

    public function importExcelMataPelajaran(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'file' => 'required|mimes:xlsx,csv'
            ],
            [
                'file.required'     => 'File Excel harus di unggah.',
                'file.mimes'        => 'Format file Excel tidak valid.'
            ]
        );

        if ($validator->fails()) {
            Session::flash('error', 'File Excel gagal di unggah. Pastikan memasukkan format file Excel dengan benar.');
            return redirect()->back();
        } else {

            // Melakukan import menggunakan import class yang sudah dibuat
            Excel::import(new MataPelajaranImport, $request->file('file'));

            Session::flash('success', 'File Excel berhasil di unggah.');
            return redirect()->back();
        }
    }
}
