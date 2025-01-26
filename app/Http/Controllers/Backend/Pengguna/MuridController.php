<?php

namespace App\Http\Controllers\Backend\Pengguna;

use App\Http\Controllers\Controller;
use App\Models\dataMurid;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use ErrorException;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class MuridController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $murid = User::whereIn('role', ['Guest', 'Murid'])->get();
        return view('backend.pengguna.murid.index', compact('murid'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pengguna.murid.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validasi menggunakan Validator
        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required|max:255',
                'email' => 'required|email|unique:users',
                'nisn' => 'required|unique:data_murids',
                'foto_profile' => 'required|mimes:jpeg,png,jpg|mimetypes:image/jpeg,image/png|max:1024'
            ],
            [
                'name.required' => 'Nama tidak boleh kosong.',
                'email.required' => 'Email tidak boleh kosong.',
                'email.unique' => 'Email sudah pernah digunakan.',
                'nisn.required' => 'NISN tidak boleh kosong.',
                'nisn.unique' => 'NISN sudah pernah digunakan.',
                'email.email' => 'Email yang dimasukkan tidak valid.',
                'foto_profile.required' => 'Foto profil harus diunggah.',
                'foto_profile.mimes'    => 'Foto profil yang di masukkan tidak valid.',
                'foto_profile.mimetypes' => 'Foto profil yang di masukkan tidak valid.',
                'foto_profile.max'      => 'Ukuran foto profil tidak boleh lebih dari 1MB.'
            ]
        );

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        } else {

            if ($request->hasFile('foto_profile')) {
                $image = $request->file('foto_profile');
                $nama_img = time() . "_" . $image->getClientOriginalName();
                $image->move(public_path('Assets/Frontend/img/'), $nama_img);
            }

            // Ambil username dari kalimat pertama nama
            $username = explode(" ", $request->name)[0];

            // Simpan data user
            $murid = new User();
            $murid->name = $request->name;
            $murid->username = $username;
            $murid->email = $request->email;
            $murid->password = bcrypt($request->password);
            $murid->foto_profile = $nama_img;
            $murid->role = 'Murid';
            $murid->save();

            // Simpan data murid
            $detail = new dataMurid();
            $detail->user_id = $murid->id;
            $detail->nisn = $request->nisn;
            $detail->jenis_kelamin = $request->jenis_kelamin;
            $detail->save();

            $murid->assignRole($murid->role);

            Session::flash('success', 'Calon Murid Berhasil disimpan!');
            return redirect()->route('backend-pengguna-murid.index');
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
        $murid = User::whereIn('role', ['Guest', 'Murid'])->find($id);
        return view('backend.pengguna.murid.edit', compact('murid'));
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

        $validator = Validator::make(
            $request->all(),
            [
                'name'      => 'required|max:255',
                'email'     => 'required',
                'status'    => ['required', Rule::in(['Aktif', 'Tidak Aktif'])],
                'role'      => ['required', Rule::in(['Murid', 'Guest'])],
            ],
            [
                'name.required'     => 'Nama tidak boleh kosong.',
                'email.required'    => 'Email tidak boleh kosong.',
                'email.email'       => 'Email yang dimasukan tidak valid.',
                'status.required'   => 'Status Murid harus dipilih.',
                'status.in'         => 'Status yang dipilih tidak valid.',
                'role.required'     => 'Role Murid harus dipilih.',
                'role.in'           => 'Role yang dipilih tidak valid.'
            ]
        );

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        } else {

            $murid = User::find($id);
            $murid->name            = $request->name;
            $murid->email           = $request->email;
            $murid->role            = $request->role;
            $murid->status          = $request->status;
            $murid->update();

            DB::table('model_has_roles')->where('model_id', $id)->delete();
            $murid->assignRole($request->role);

            Session::flash('success', 'Calon Murid Berhasil di update!');
            return redirect()->route('backend-pengguna-murid.index');
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
        $user = User::find($id);
        $user->delete();

        Session::flash('success', 'Calon Murid Berhasil di hapus!');
        return redirect()->route('backend-pengguna-murid.index');
    }
}
