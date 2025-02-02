<?php

namespace App\Http\Controllers\Backend\Website;

use App\Http\Controllers\Controller;
use App\Models\Kelas;
use Illuminate\Http\Request;
use App\Imports\KelasImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class KelasController extends Controller
{

    protected $messages = [
        'kelas.required'           => 'Kelas tidak boleh kosong.',
        'kelas.max'                => 'Kelas tidak boleh lebih dari 10 karakter.',
        'nama_kelas.required'      => 'Nama kelas tidak boleh kosong.',
        'nama_kelas.max'           => 'Nama kelas tidak boleh lebih dari 10 karakter.'
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kelas = Kelas::select(
            'kelas.id',
            'kelas.kelas',
            'kelas.nama_kelas'
        )
            ->orderBy('kelas', 'asc')
            ->get();
        return view('backend.website.kelas.index', compact('kelas'));
    }

    public function create()
    {
        return view('backend.website.kelas.create');
    }

    // /**
    //  * Store a newly created resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @return \Illuminate\Http\Response
    //  */
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'kelas'     => 'required|max:10',
            'nama_kelas' => 'required|max:10'
        ], $this->messages);

        if ($validator->fails()) {
            return redirect('backend-kelas/create')
                ->withErrors($validator)
                ->withInput();
        } else {

            $kelas = trim($request->input('kelas'));
            $nama_kelas = trim(ucwords($request->input('nama_kelas')));

            Kelas::create([
                'kelas' => $kelas,
                'nama_kelas' => $nama_kelas
            ]);

            Session::flash('success', 'Data kelas berhasil di tambah!');
            return redirect()->route('backend-kelas.index');
        }
    }

    // /**
    //  * Display the specified resource.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    public function show($id)
    {
        //
    }

    // /**
    //  * Show the form for editing the specified resource.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    public function edit($id)
    {
        $kelas = Kelas::find($id);
        return view('backend.website.kelas.edit', compact('kelas'));
    }

    // /**
    //  * Update the specified resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    public function update(Request $request, $id)
    {

        $validator = Validator::make($request->all(), [
            'kelas'     => 'required|max:10',
            'nama_kelas' => 'required|max:10'
        ], $this->messages);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        } else {

            $request_kelas = trim($request->input('kelas'));
            $request_nama_kelas = trim(ucwords($request->input('nama_kelas')));

            $kelas = Kelas::find($id);
            $kelas->kelas = $request_kelas;
            $kelas->nama_kelas = $request_nama_kelas;
            $kelas->save();

            Session::flash('success', 'Data kelas berhasil di update!');
            return redirect()->route('backend-kelas.index');
        }
    }

    public function destroy($id)
    {
        $kelas = Kelas::find($id);
        $kelas->delete();

        Session::flash('success', 'Data kelas berhasil di hapus!');
        return redirect()->route('backend-kelas.index');
    }

    public function importExcelKelas(Request $request)
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
            Excel::import(new KelasImport, $request->file('file'));

            Session::flash('success', 'File Excel berhasil di unggah.');
            return redirect()->back();
        }
    }
}
