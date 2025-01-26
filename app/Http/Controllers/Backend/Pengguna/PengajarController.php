<?php

namespace App\Http\Controllers\Backend\Pengguna;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UsersDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;

class PengajarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pengajar = User::with('userDetail')->where('role', 'Guru')->get();
        return view('backend.pengguna.pengajar.index', compact('pengajar'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pengguna.pengajar.create');
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
            'name'          => 'required|max:255',
            'email'         => 'required|unique:users',
            'mengajar'      => 'required|max:255',
            'nip'           => 'required|numeric|unique:users_details',
            'foto_profile'  => 'required|mimes:jpeg,png,jpg|mimetypes:image/jpeg,image/png|max:1024'
        ], [
            'name.required'         => 'Nama tidak boleh kosong.',
            'name.max'              => 'Nama tidak boleh lebhi dari 255 karakter.',
            'email.required'        => 'Email tidak boleh kosong.',
            'email.email'           => 'Format email tidak valid.',
            'email.unique'          => 'Email sudah terdaftar.',
            'mengajar.required'     => 'Bidang mengajar harus diisi.',
            'mengajar.max'          => 'Mengajar tidak boleh lebhi dari 255 karakter.',
            'nip.required'          => 'NIP tidak boleh kosong.',
            'nip.numeric'           => 'NIP harus berupa angka.',
            'nip.unique'            => 'NIP sudah terdaftar.',
            'foto_profile.required' => 'Foto profil harus diunggah.',
            'foto_profile.mimes'    => 'Foto profil yang di masukkan tidak valid.',
            'foto_profile.mimetypes' => 'Foto profil yang di masukkan tidak valid.',
            'foto_profile.max'      => 'Ukuran foto profil tidak boleh lebih dari 1MB.',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        } else {

            $image = $request->file('foto_profile');
            $nama_img = time() . "_" . $image->getClientOriginalName();
            $tujuan_upload = 'Assets/Frontend/img/';

            $username = strtolower(implode(" ", array_slice(explode(" ", $request->name), 0, 1))) . date("s");

            $user = User::create([
                'name'         => $request->name,
                'email'        => $request->email,
                'username'     => $username,
                'role'         => 'Guru',
                'status'       => 'Aktif',
                'foto_profile' => $nama_img,
                'password'     => bcrypt('12345678'),
            ]);

            if ($user) {
                $userDetail = new UsersDetail();
                $userDetail->user_id      = $user->id;
                $userDetail->role         = $user->role;
                $userDetail->mengajar     = $request->mengajar;
                $userDetail->nip          = $request->nip;
                $userDetail->is_active = 1;
                $userDetail->save();
            }

            $user->assignRole($user->role);

            $image->move($tujuan_upload, $nama_img);
            Session::flash('success', 'Pengajar berhasil di tambah!');
            return redirect()->route('backend-pengguna-pengajar.index');
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
        $pengajar = User::with('userDetail')->where('role', 'Guru')->find($id);
        return view('backend.pengguna.pengajar.edit', compact('pengajar'));
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
            'name'          => 'required|max:255',
            'email'         => 'required',
            'mengajar'      => 'required|max:255',
            'nip'           => 'required|numeric',
            'foto_profile'  => 'mimes:jpeg,png,jpg|mimetypes:image/jpeg,image/png|max:1024'
        ], [
            'name.required'         => 'Nama tidak boleh kosong.',
            'name.max'              => 'Nama tidak boleh lebhi dari 255 karakter.',
            'email.required'        => 'Email tidak boleh kosong.',
            'email.email'           => 'Format email tidak valid.',
            'mengajar.required'     => 'Bidang mengajar harus diisi.',
            'mengajar.max'          => 'Mengajar tidak boleh lebhi dari 255 karakter.',
            'nip.required'          => 'NIP tidak boleh kosong.',
            'nip.numeric'           => 'NIP harus berupa angka.',
            'foto_profile.required' => 'Foto profil harus diunggah.',
            'foto_profile.mimes'    => 'Foto profil yang di masukkan tidak valid.',
            'foto_profile.mimetypes' => 'Foto profil yang di masukkan tidak valid.',
            'foto_profile.max'      => 'Ukuran foto profil tidak boleh lebih dari 2MB.',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->status = $request->status;
        $user->password = bcrypt('12345678');

        // Cek apakah ada file baru diunggah
        if ($request->hasFile('foto_profile')) {

            if ($user->foto_profil) {
                Storage::delete('public/images/profile/' . $user->foto_profile);
            }

            // Upload file baru
            $image = $request->file('foto_profile');
            $nama_img = time() . "_" . $image->getClientOriginalName();
            $image->storeAs('public/images/profile', $nama_img);

            // Simpan nama file baru ke dalam database
            $user->foto_profile = $nama_img;
        }

        $user->save();

        if ($user) {
            $userDetail = UsersDetail::where('user_id', $id)->first();
            $userDetail->user_id      = $user->id;
            $userDetail->is_active    = $user->status == 'Aktif' ? '0' : '1';
            $userDetail->mengajar     = $request->mengajar;
            $userDetail->nip          = $request->nip;
            $userDetail->email        = $request->email;
            $userDetail->linkidln     = $request->linkidln;
            $userDetail->instagram    = $request->instagram;
            $userDetail->website      = $request->website;
            $userDetail->facebook     = $request->facebook;
            $userDetail->twitter      = $request->twitter;
            $userDetail->youtube      = $request->youtube;
            $userDetail->save();
        }

        Session::flash('success', 'Data pengajar berhasil di update!');
        return redirect()->route('backend-pengguna-pengajar.index');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pengajar = User::find($id);
        UsersDetail::where('user_id', $pengajar->id)->delete();

        $pengajar->delete();

        Session::flash('success', 'Data pengajar berhasil di hapus!');
        return redirect()->route('backend-pengguna-pengajar.index');
    }
}
