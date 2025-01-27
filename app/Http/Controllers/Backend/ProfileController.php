<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\ChangePasswordRequest;
use ErrorException;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profile = User::whereId(Auth::id())->first();
        return view('backend.profile.index', compact('profile'));
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
        //
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
        // Validasi input menggunakan Validator
        $validator = Validator::make(
            $request->all(),
            [
                'name'          => 'required|max:255',
                'username'      => 'required|max:50',
                'email'         => 'required|email',
                'foto_profile'  => 'mimes:jpeg,png,jpg|mimetypes:image/jpeg,image/png|max:1024',
            ],
            [
                'name.required'         => 'Nama tidak boleh kosong.',
                'name.max'              => 'Nama tidak boleh lebih dari 255 karakter.',
                'username.required'     => 'Username tidak boleh kosong.',
                'username.max'          => 'Username tidak boleh lebih dari 50 karakter.',
                'email.required'        => 'Email tidak boleh kosong.',
                'email.email'           => 'Format email tidak valid.',
                'foto_profile.mimes'    => 'Foto profile yang dimasukkan tidak valid.',
                'foto_profile.mimetypes' => 'Foto profile yang dimasukkan tidak valid.',
                'foto_profile.max'      => 'Ukuran foto profile tidak boleh lebih dari 1MB.',
            ]
        );

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        } else {

            $profile = User::findOrFail($id);
            $profile->name = $request->name;
            $profile->username = $request->username;
            $profile->email = $request->email;

            // Proses upload foto profil jika ada
            if ($request->hasFile('foto_profile')) {

                // Hapus file lama jika ada
                // if ($profile->foto_profile) {
                //     Storage::delete('public/images/profile/' . $profile->foto_profile);
                // }

                // Upload file baru
                $image = $request->file('foto_profile');
                $nama_image = time() . "_" . $image->getClientOriginalName();
                $tujuan_upload = 'public/images/profile';
                $image->storeAs($tujuan_upload, $nama_image);
                $profile->foto_profile = $nama_image;
            }

            // Reset email_verified_at jika email diubah
            // if ($request->email !== $profile->email) {
            //     $profile->email_verified_at = null;
            // }

            $profile->save();

            Session::flash('success', 'Profile berhasil di update!');
            return redirect()->back();
        }
    }

    // Ubah Password
    public function changePassword(Request $request, $id)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'password' => 'required|min:8|confirmed',
                'password_confirmation' => 'required',
            ],
            [
                'password.required'  => 'Password tidak boleh kosong.',
                'password.min'       => 'Password harus memiliki minimal 8 karakter.',
                'password.confirmed' => 'Konfirmasi password tidak cocok.',
                'password_confirmation.required' => 'Konfirmasi password harus di isi.'
            ]
        );

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        } else {

            $profile = User::findOrFail($id);
            $profile->password = bcrypt($request->password);
            $profile->save();

            Session::flash('success', 'Password berhasil di update!');
            return redirect()->back();
        }
    }
}
