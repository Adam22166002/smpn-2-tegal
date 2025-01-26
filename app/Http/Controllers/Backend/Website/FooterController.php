<?php

namespace App\Http\Controllers\Backend\Website;

use App\Http\Controllers\Controller;
use App\Models\Footer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;

class FooterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $footer = Footer::first();
        return view('backend.website.content.footer.index', compact('footer'));
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
            'school_name' => 'required',
            'school_address' => 'required',
            'logo'      => 'required|mimes:jpeg,png,jpg|mimetypes:image/jpeg,image/png|max:1024',
            'facebook'  => 'nullable|url',
            'instagram' => 'nullable|url',
            'twitter'   => 'nullable|url',
            'youtube'   => 'nullable|url',
            'email'     => 'required|email|max:255',
            'telp'      => 'required|max:20',
            'whatsapp'  => 'required|max:20',
            'desc'      => 'required',
        ], [
            'school_name.required' => 'Nama sekolah tidak boleh kosong.',
            'school_address.required' => 'Alamat sekolah tidak boleh kosong.',
            'logo.required'  => 'Logo harus diunggah.',
            'logo.mimes'     => 'Logo harus berupa file gambar.',
            'logo.mimetypes' => 'Logo harus berupa file gambar.',
            'logo.max'       => 'Ukuran logo tidak boleh lebih dari 1MB.',
            'facebook.url'   => 'Facebook harus berupa URL yang valid.',
            'instagram.url'  => 'Instagram harus berupa URL yang valid.',
            'twitter.url'    => 'Twitter harus berupa URL yang valid.',
            'youtube.url'    => 'YouTube harus berupa URL yang valid.',
            'email.required' => 'Email tidak boleh kosong.',
            'email.email'    => 'Email harus berupa alamat email yang valid.',
            'email.max'      => 'Email tidak boleh lebih dari 255 karakter.',
            'telp.required'  => 'Nomor telepon tidak boleh kosong.',
            'telp.max'       => 'Nomor telepon tidak boleh lebih dari 20 karakter.',
            'telp.numeric'   => 'Nomor telepon harus berupa angka.',
            'whatsapp.required' => 'Nomor WhatsApp tidak boleh kosong.',
            'whatsapp.max'   => 'Nomor WhatsApp tidak boleh lebih dari 20 karakter.',
            'whatsapp.numeric' => 'Nomor WhatsApp harus berupa angka.',
            'desc.required'  => 'Deskripsi tidak boleh kosong.',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        } else {

            $image = $request->file('logo');
            $nama_image = time() . "_" . $image->getClientOriginalName();
            $tujuan_upload = 'public/images/logo';

            // Simpan data ke database
            $footer = new Footer;
            $footer->facebook       = $request->facebook;
            $footer->school_name    = $request->school_name;
            $footer->school_address = $request->school_address;
            $footer->instagram      = $request->instagram;
            $footer->twitter        = $request->twitter;
            $footer->youtube        = $request->youtube;
            $footer->logo           = $nama_image;
            $footer->email          = $request->email;
            $footer->telp           = $request->telp;
            $footer->whatsapp       = $request->whatsapp;
            $footer->desc           = $request->desc;
            $footer->save();

            $image->storeAs($tujuan_upload, $nama_image);
            Session::flash('success', 'Data footer di tambah!');
            return redirect()->route('backend-footer.index');
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
            'school_name' => 'required',
            'school_address' => 'required',
            'logo'      => 'mimes:jpeg,png,jpg|mimetypes:image/jpeg,image/png|max:1024',
            'facebook'  => 'nullable|url',
            'instagram' => 'nullable|url',
            'twitter'   => 'nullable|url',
            'youtube'   => 'nullable|url',
            'email'     => 'required|email|max:255',
            'telp'      => 'required|max:20',
            'whatsapp'  => 'required|max:20',
            'desc'      => 'required',
        ], [
            'school_name.required' => 'Nama sekolah tidak boleh kosong.',
            'school_address.required' => 'Alamat sekolah tidak boleh kosong.',
            'logo.mimes'     => 'Logo harus berupa file gambar.',
            'logo.mimetypes' => 'Logo harus berupa file gambar.',
            'logo.max'       => 'Ukuran logo tidak boleh lebih dari 1MB.',
            'facebook.url'   => 'Facebook harus berupa URL yang valid.',
            'instagram.url'  => 'Instagram harus berupa URL yang valid.',
            'twitter.url'    => 'Twitter harus berupa URL yang valid.',
            'youtube.url'    => 'YouTube harus berupa URL yang valid.',
            'email.required' => 'Email tidak boleh kosong.',
            'email.email'    => 'Email harus berupa alamat email yang valid.',
            'email.max'      => 'Email tidak boleh lebih dari 255 karakter.',
            'telp.required'  => 'Nomor telepon tidak boleh kosong.',
            'telp.max'       => 'Nomor telepon tidak boleh lebih dari 20 karakter.',
            'telp.numeric'   => 'Nomor telepon harus berupa angka.',
            'whatsapp.required' => 'Nomor WhatsApp tidak boleh kosong.',
            'whatsapp.max'   => 'Nomor WhatsApp tidak boleh lebih dari 20 karakter.',
            'whatsapp.numeric' => 'Nomor WhatsApp harus berupa angka.',
            'desc.required'  => 'Deskripsi tidak boleh kosong.',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        } else {

            $footer = Footer::findOrFail($id);
            $footer->school_name   = $request->school_name;
            $footer->school_address = $request->school_address;
            $footer->facebook   = $request->facebook;
            $footer->instagram  = $request->instagram;
            $footer->twitter    = $request->twitter;
            $footer->youtube    = $request->youtube;
            $footer->email      = $request->email;
            $footer->telp       = $request->telp;
            $footer->whatsapp   = $request->whatsapp;
            $footer->desc       = $request->desc;

            if ($request->hasFile('logo')) {

                // Hapus file lama jika ada
                if ($footer->logo) {
                    Storage::delete('public/images/logo/' . $footer->logo);
                }

                // Proses upload file logo baru
                $image = $request->file('logo');
                $nama_image = time() . "_" . $image->getClientOriginalName();
                $tujuan_upload = 'public/images/logo';
                $image->storeAs($tujuan_upload, $nama_image);

                $footer->logo = $nama_image;
            }

            $footer->save();

            Session::flash('success', 'Data footer berhasil di update!');
            return redirect()->route('backend-footer.index');
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
