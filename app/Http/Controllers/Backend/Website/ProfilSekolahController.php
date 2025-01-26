<?php

namespace App\Http\Controllers\Backend\Website;

use App\Http\Controllers\Controller;
use App\Models\ProfileSekolah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;

class ProfilSekolahController extends Controller
{
    protected $messages = [
        'title.required'    => 'Nama judul sekolah tidak boleh kosong.',
        'image.required'    => 'Gambar tidak boleh kosong.',
        'image.mimes'       => 'Gambar yang dimasukan tidak valid.',
        'image.mimetypes'   => 'Gambar yang dimasukan tidak valid.',
        'image.max'         => 'Maksimal gambar tidak boleh lebih dari 1MB.',
        'content.required'  => 'Content tidak boleh kosong.'
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profile = ProfileSekolah::first();
        return view('backend.website.tentang.index', compact('profile'));
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
            'title'   => 'required|max:255',
            'content' => 'required',
            'image'   => 'required|mimes:jpeg,png,jpg|mimetypes:image/jpeg,image/png|max:1024'
        ], $this->messages);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        } else {

            $tujuan_upload = 'public/images/profileSekolah';
            $image = $request->file('image');
            $nama_img = time() . "_" . $image->getClientOriginalName();

            $profile = new ProfileSekolah();
            $profile->title   = strtoupper($request->title);
            $profile->content = $request->content;

            $profile->image   = $nama_img;
            $profile->save();
            $image->storeAs($tujuan_upload, $nama_img);

            Session::flash('success', 'Profile Sekolah berhasil di buat!');
            return redirect()->route('backend-profile-sekolah.index');
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
            'title'   => 'required|string|max:255',
            'content' => 'required|string',
            'image'   => 'mimes:jpeg,png,jpg|mimetypes:image/jpeg,image/png|max:1024',
        ], $this->messages);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        } else {
            $profile = ProfileSekolah::findOrFail($id);
            $profile->title   = strtoupper($request->input('title'));
            $profile->content = $request->input('content');

            // Cek jika ada request file gambar
            if ($request->hasFile('image')) {

                // Lakukan simpan file
                $image = $request->file('image');
                $nama_img = time() . "_" . $image->getClientOriginalName();

                // Lokasi penyimpanan di disk "public"
                $folderPath = 'images/profileSekolah';

                // Temukan data profile berdasarkan ID
                $profile = ProfileSekolah::findOrFail($id);

                // Hapus file lama jika ada
                if ($profile->image) {
                    Storage::disk('public')->delete("$folderPath/{$profile->image}");
                }

                // Simpan file baru
                $image->storeAs($folderPath, $nama_img, 'public');
                $profile->image   = $nama_img;
            }

            $profile->save();

            Session::flash('success', 'Profile Sekolah berhasil di update!');
            return redirect()->route('backend-profile-sekolah.index');
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
