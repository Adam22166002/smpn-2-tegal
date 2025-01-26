<?php

namespace App\Http\Controllers\Backend\Website;

use App\Http\Controllers\Controller;
use ErrorException;
use App\Models\About;
use Illuminate\Http\Request;
use App\Http\Requests\AboutRequest;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class AboutController extends Controller
{
    protected $messages = [
        'title.required'     => 'Judul tidak boleh kosong.',
        'title.max'          => 'Judul tidak boleh lebih dari 255 karakter.',
        'desc.required'      => 'Deskripsi tidak boleh kosong.',
        'is_active.required' => 'Status tidak boleh kosong',
        'is_active.boolean'  => 'Status tidak valid.',
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
        $about = About::all();
        return view('backend.website.content.about.index', compact('about'));
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
            'image' => 'required|mimes:jpeg,png,jpg|mimetypes:image/jpeg,image/png|max:1024',
            'title' => 'required|max:255',
            'desc' => 'required',
            'is_active' => 'required|boolean',
        ], $this->messages);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        } else {

            $image = $request->file('image');
            $nama_image = time() . "_" . $image->getClientOriginalName();
            $tujuan_upload = 'public/images/about';

            // Menyimpan data About
            $about = new About;
            $about->title       = $request->title;
            $about->desc        = $request->desc;
            $about->is_active   = $request->is_active;
            $about->image       = $nama_image;
            $about->save();

            $image->storeAs($tujuan_upload, $nama_image);
            Session::flash('success', 'About berhasil di tambah!');
            return redirect()->route('backend-about.index');
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
        $about = About::find($id);
        return view('backend.website.content.about.edit', compact('about'));
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
            'image' => 'nullable|mimes:jpeg,png,jpg|mimetypes:image/jpeg,image/png|max:1024',
            'title' => 'required|max:255',
            'desc' => 'required',
            'is_active' => 'required|boolean',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        } else {

            $about = About::find($id);
            $about->title       = $request->title;
            $about->desc        = $request->desc;
            $about->is_active   = $request->is_active;

            // Cek jika ada file baru untuk diupload
            if ($request->hasFile('image')) {

                // Ambil data about untuk mendapatkan nama file lama
                $about = About::find($id);

                // Hapus file lama jika ada
                if ($about->image) {
                    Storage::delete(public_path('storage/images/about/' . $about->image));
                }

                // Proses upload file gambar baru
                $image = $request->file('image');
                $nama_image = time() . "_" . $image->getClientOriginalName();
                $tujuan_upload = 'public/images/about';
                $image->storeAs($tujuan_upload, $nama_image);
                $about->image = $nama_image;
            }

            $about->save();
            Session::flash('success', 'About berhasil di update!');
            return redirect()->route('backend-about.index');
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
        $about = About::find($id);
        $destinationPath = public_path('storage/images/about/');
        unlink($destinationPath . $about->image);

        $about->delete();
        Session::flash('success', 'Data about berhasil di hapus!');
        return redirect()->route('backend-about.index');
    }
}
