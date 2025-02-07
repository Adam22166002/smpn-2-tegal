<?php

namespace App\Http\Controllers\Backend\Pengguna;

use App\Http\Controllers\Controller;
use App\Models\dataMurid;
use App\Models\User;
use App\Models\UsersDetail;
use App\Models\Absensi;
use App\Models\Kelas;
use App\Models\MataPelajaran;
use Illuminate\Support\Facades\Auth;
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
        $kelas = Kelas::all();
        return view('backend.pengguna.pengajar.create', compact('kelas'));
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
                'password'     => bcrypt('Guru123'),
            ]);

            if ($user) {
                $userDetail = new UsersDetail();
                $userDetail->user_id      = $user->id;
                $userDetail->role         = $user->role;
                $userDetail->mengajar     = $request->mengajar;
                $userDetail->kelas        = $request->kelas;
                $userDetail->nama_kelas   = $request->nama_kelas;
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
        $kelas = Kelas::all();
        return view('backend.pengguna.pengajar.edit', compact('pengajar', 'kelas'));
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
            $userDetail->kelas        = $request->kelas;
            $userDetail->nama_kelas   = $request->nama_kelas;
            $userDetail->email        = $request->email;
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

    public function murid_ajar()
    {
        $guru_id = Auth::user()->id;
        $guru = User::select('id')->where('id', $guru_id)->first();
        $guruMengajar = UsersDetail::select(
            'users_details.kelas',
            'users_details.nama_kelas'
        )
            ->where('user_id', $guru->id)->first();

        $murid = User::whereHas('dataMurid', function ($query) use ($guruMengajar) {
            $query->where('kelas', $guruMengajar->kelas)
                ->where('nama_kelas', $guruMengajar->nama_kelas);
        })
            ->with('dataMurid')
            ->get();

        return view('backend.pengguna.pengajar.murid-ajar', compact('murid'));
    }

    public function absensi_murid()
    {
        $guru_id = Auth::user()->id;
        $guru = User::select('id')->where('id', $guru_id)->first();
        $guruMengajar = UsersDetail::select(
            'users_details.kelas',
            'users_details.nama_kelas'
        )
            ->where('user_id', $guru->id)->first();

        $absensi = User::select('users.id', 'users.name', 'absensi.status', 'absensi.keterangan', 'absensi.tanggal')
            ->join('data_murids', 'users.id', '=', 'data_murids.user_id')
            ->leftJoin('absensi', 'users.id', '=', 'absensi.murid_id')
            ->where('users.role', 'Murid')
            ->where('data_murids.kelas', $guruMengajar->kelas)
            ->where('data_murids.nama_kelas', $guruMengajar->nama_kelas)
            ->get();

        return view('backend.pengguna.pengajar.absensi', compact('absensi'));
    }

    public function proses_tambah_absensi(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'status' => 'required|max:10',
                'keterangan' => 'max:255'
            ],
            [
                'status.required' => 'Kehadiran tidak boleh kosong.',
                'status.max' => 'Kehadiran tidak boleh lebih dari 10 karakter.',
                'keterangan.max' => 'Keterangan tidak boleh lebih dari 255 karakter.'
            ]
        );

        if ($validator->fails()) {
            Session::flash('error', 'Pengisian kehadiran gagal di lakukan. Mohon coba lagi.');
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        } else {

            $user_id = Auth::user()->id;
            $murid_id = trim($request->input('murid_id'));
            $status = trim($request->input('status'));
            $keterangan = trim($request->input('keterangan'));

            $detail_guru = UsersDetail::select(
                'users_details.user_id',
                'users_details.mengajar'
            )->where('user_id', $user_id)->first();

            $mata_pelajaran_id = MataPelajaran::select('id')->where('nama', $detail_guru->mengajar)->first();

            Absensi::create([
                'status' => $status,
                'keterangan' => ($keterangan != "" ? $keterangan : ""),
                'murid_id' => $murid_id,
                'guru_id' => $detail_guru->user_id,
                'mata_pelajaran_id' => $mata_pelajaran_id->id,
                'tanggal' => date('Y-m-d')
            ]);

            Session::flash('success', 'Berhasil menambahkan kehadiran.');
            return redirect()->back();
        }
    }

    public function proses_update_absensi(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'status' => 'required|max:10',
                'keterangan' => 'max:255'
            ],
            [
                'status.required' => 'Kehadiran tidak boleh kosong.',
                'status.max' => 'Kehadiran tidak boleh lebih dari 10 karakter.',
                'keterangan.max' => 'Keterangan tidak boleh lebih dari 255 karakter.'
            ]
        );

        if ($validator->fails()) {
            Session::flash('error', 'Update kehadiran gagal di lakukan. Mohon coba lagi.');
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        } else {

            $murid_id_old = $request->input('murid_id_old');
            $status = trim($request->input('status'));
            $keterangan = trim($request->input('keterangan'));

            Absensi::where('murid_id', $murid_id_old)->update([
                'status' => $status,
                'keterangan' => $keterangan
            ]);

            Session::flash('success', 'Berhasil mengupdate kehadiran.');
            return redirect()->back();
        }
    }
}
