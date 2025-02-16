<?php

use App\Http\Controllers\Backend\SettingController;
use App\Http\Controllers\Backend\Pengguna\MuridController;
use App\Http\Controllers\Backend\Pengguna\PengajarController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Backend\Website\BKAppointmentController;
use App\Http\Controllers\Backend\Website\BKController;
use App\Http\Controllers\Backend\Website\KelasController;
use App\Http\Controllers\Backend\Website\MataPelajaranController;
use App\Http\Controllers\Frontend\IndexController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Http\Middleware\EnsureRoleIsTeacher;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// ======= FRONTEND ======= \\

Route::get('/', 'Frontend\IndexController@index');

///// MENU \\\\\
//// PROFILE SEKOLAH \\\\
Route::get('profile-sekolah', [App\Http\Controllers\Frontend\IndexController::class, 'profileSekolah'])->name('profile.sekolah');

//// VISI dan MISI
Route::get('visi-dan-misi', [App\Http\Controllers\Frontend\IndexController::class, 'visimisi'])->name('visimisi.sekolah');
Route::get('sejarah-singkat', [App\Http\Controllers\Frontend\IndexController::class, 'sejarahSingkat'])->name('sejarah.sekolah');
Route::get('sarana-prasarana', [App\Http\Controllers\Frontend\IndexController::class, 'saranaPrasarana'])->name('sarpras');
Route::get('penghargaan', [App\Http\Controllers\Frontend\IndexController::class, 'penghargaan'])->name('penghargaan.sekolah');
Route::get('guru-tenaga-kependidikan', [App\Http\Controllers\Frontend\IndexController::class, 'guruTendik'])->name('gtk.sekolah');
Route::get('kurikulum-sekolah', [App\Http\Controllers\Frontend\IndexController::class, 'kurikulum'])->name('kurikulum.sekolah');
Route::get('pembiasaan-siswa', [App\Http\Controllers\Frontend\IndexController::class, 'pembiasaan'])->name('pembiasaan.sekolah');
Route::get('kaldik', [App\Http\Controllers\Frontend\IndexController::class, 'kaldik'])->name('kaldik.sekolah');
Route::get('info-ATS-AAS-ANBK', [App\Http\Controllers\Frontend\IndexController::class, 'info'])->name('info.sekolah');
// KEGIATASN SISWA
Route::get('kegiatan-siswa', [App\Http\Controllers\Frontend\IndexController::class, 'kegiatanSiswa'])->name('kegiatanSiswa.sekolah');
// PRESTASI SISWA
Route::get('prestasi-siswa', [App\Http\Controllers\Frontend\IndexController::class, 'PrestasiSiswa'])->name('prestasi.sekolah');
//// PROGRAM STUDI \\\\
Route::get('program/{slug}', [App\Http\Controllers\Frontend\MenuController::class, 'programStudi']);
//// PROGRAM STUDI \\\\
Route::get('kegiatan/{slug}', [App\Http\Controllers\Frontend\MenuController::class, 'kegiatan']);

/// BERITA \\\
Route::get('berita', [App\Http\Controllers\Frontend\IndexController::class, 'berita'])->name('berita');
Route::get('berita/{slug}', [App\Http\Controllers\Frontend\IndexController::class, 'detailBerita'])->name('detail.berita');

/// EVENT \\\
Route::get('event/{slug}', [App\Http\Controllers\Frontend\IndexController::class, 'detailEvent'])->name('detail.event');
Route::get('event', [App\Http\Controllers\Frontend\IndexController::class, 'events'])->name('event');

/// GALERI \\\
Route::get('gallery', [App\Http\Controllers\Frontend\IndexController::class, 'gallery'])->name('gallery');

/// RAPOT \\\
Route::get('rapot', [App\Http\Controllers\Frontend\IndexController::class, 'rapot'])->name('rapot');

/// CETAK RAPOT \\\
Route::get('cetakRapot', [App\Http\Controllers\Frontend\IndexController::class, 'cetakRapot'])->name('cetakRapot');

Route::get('cekRapot', [App\Http\Controllers\Frontend\IndexController::class, 'cekRapot'])->name('cekRapot');

/// KONSPERO \\\
Route::get('konspero', [App\Http\Controllers\Frontend\IndexController::class, 'konspero'])->name('konspero');

/// PERPUS DIGITAL \\\
Route::get('perpus', [App\Http\Controllers\Frontend\IndexController::class, 'perpus'])->name('perpus');
Route::post('/konsultasi', [App\Http\Controllers\Frontend\IndexController::class, 'storeKonspero'])->name('storeKonspero');

Auth::routes(['register' => false]);

// ======= BACKEND ======= \\
Route::middleware('guest')->group(function () {
    Route::get('/forgot-password', function () {
        return view('auth.forgot-password');
    })->name('password.request');

    Route::post('/forgot-password', function (Request $request) {

        function statusFunction($status)
        {
            return $status;
        }

        $request->validate(['email' => 'required|email']);

        $status = Password::sendResetLink(
            $request->only('email')
        );

        return $status === Password::RESET_LINK_SENT
            ? back()->with(['status' => __(statusFunction('Link reset password telah berhasil dikirim melalui email. Silakan periksa email Anda.'))])
            : back()->withErrors(['email' => __(statusFunction('Email tidak ada.'))]);
    })->name('password.email');

    Route::get('/reset-password/{token}', function ($token) {
        return view('auth.reset-password', ['token' => $token]);
    })->name('password.reset');

    Route::post('/reset-password', function (Request $request) {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed',
            'password_confirmation' => 'required',
        ], [
            'password.required' => 'Password harus di isi.',
            'password.min' => 'Password setidaknya minimal 8 karakter.',
            'password.confirmed' => 'Konfirmasi password tidak cocok.',
            'password_confirmation.required' => 'Konfirmasi password harus di isi.',
        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->setRememberToken(Str::random(60));

                $user->save();

                event(new PasswordReset($user));
            }
        );

        return $status === Password::PASSWORD_RESET
            ? redirect()->route('login')->with('status', __($status))
            : back()->withErrors(['email' => [__($status)]]);
    })->name('password.update');
});


Route::middleware('auth')->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    /// PROFILE \\\
    Route::resource('profile-settings', Backend\ProfileController::class);
    /// SETTINGS \\\
    Route::prefix('settings')->group(function () {
        // BANK
        Route::get('/', [App\Http\Controllers\Backend\SettingController::class, 'index'])->name('settings');
        // TAMBAH BANK
        Route::post('add-bank', [App\Http\Controllers\Backend\SettingController::class, 'addBank'])->name('settings.add.bank');
        // NOTIFICATIONS
        Route::put('notifications/{id}', [SettingController::class, 'notifications']);
    });


    /// CHANGE PASSWORD
    Route::put('profile-settings/change-password/{id}', [App\Http\Controllers\Backend\ProfileController::class, 'changePassword'])->name('profile.change-password');



    Route::middleware('layanan.bk')->group(function () {
        Route::resources([
            'complaints' => Backend\Website\BKController::class,
            'appointments' => Backend\Website\BKAppointmentController::class,
        ]);
        Route::put('complaints/{complaint}/status', [BKController::class, 'updateStatus'])->name('complaints.update-status');
        Route::put('appointments/{appointment}/status', [BKAppointmentController::class, 'updateStatus'])->name('appointments.update-status');
        Route::get('daftar-kelas', [BKController::class, 'daftarKelas']);
        Route::get('daftar-siswa', [BKController::class, 'daftarMurid']);
    });


    // Guru
    Route::middleware([EnsureRoleIsTeacher::class])->group(function () {

        // GROUPS -> AKAN BENTROK -> SOLVED -> NON GROUPS
        Route::get('/murid-ajar', [App\Http\Controllers\Backend\Pengguna\PengajarController::class, 'murid_ajar']);
        Route::get('/absensi', [App\Http\Controllers\Backend\Pengguna\PengajarController::class, 'absensi_murid']);
        Route::get('/penilaian', [App\Http\Controllers\Backend\Pengguna\PengajarController::class, 'penilaian_murid']);
        Route::post('/proses-tambah-absensi', [App\Http\Controllers\Backend\Pengguna\PengajarController::class, 'proses_tambah_absensi']);
        Route::post('/proses-update-absensi', [App\Http\Controllers\Backend\Pengguna\PengajarController::class, 'proses_update_absensi']);
        Route::post('/proses-tambah-penilaian', [App\Http\Controllers\Backend\Pengguna\PengajarController::class, 'proses_tambah_penilaian']);
        Route::post('/proses-update-penilaian', [App\Http\Controllers\Backend\Pengguna\PengajarController::class, 'proses_update_penilaian']);

        Route::get('/exportPenilaianPerHariIni', [App\Http\Controllers\Backend\Pengguna\PengajarController::class, 'exportPenilaianPerHariIni']);
        Route::get('/exportSemuaPenilaian', [App\Http\Controllers\Backend\Pengguna\PengajarController::class, 'exportSemuaPenilaian']);

        Route::get('/exportAbsenPerHariIni', [App\Http\Controllers\Backend\Pengguna\PengajarController::class, 'exportAbsenPerHariIni']);
        Route::get('/exportSemuaAbsen', [App\Http\Controllers\Backend\Pengguna\PengajarController::class, 'exportSemuaAbsen']);
    });

    Route::prefix('/')->middleware('role:Admin')->group(function () {


        ///// WEBSITE \\\\\
        Route::resources([
            /// PROFILE SEKOLAH \\
            'backend-profile-sekolah'   => Backend\Website\ProfilSekolahController::class,
            /// VISI & MISI \\\
            'backend-visimisi'  => Backend\Website\VisidanMisiController::class,
            // SARPRAS
            'backend-sarpras'   => Backend\Website\SarprasController::class,
            // PENGHARGAAN
            'backend-penghargaan'  => Backend\Website\PenghargaanController::class,
            //// PROGRAM KELAS \\\\
            'backend-kelas' =>  Backend\Website\KelasController::class,
            /// KEGIATAN \\\
            'backend-kegiatan' => Backend\Website\KegiatanController::class,
            // kegiatan siswa
            'backend-kegiatan-siswa' => Backend\Website\KegiatanSiswaController::class,
            // prestasi
            'backend-prestasi' => Backend\Website\PrestasiController::class,
            // kurikulum
            'backend-kurikulum' => Backend\Website\KurikulumController::class,
            // pembiasaan siswa
            'backend-pembiasaan' => Backend\Website\PembiasaanController::class,
            // kaldik
            'backend-kaldik' => Backend\Website\KaldikController::class,
            // informasi ATS, AAS, ANBK
            'backend-informasi' => Backend\Website\InformasiController::class,
            /// IMAGE SLIDER \\\
            'backend-imageslider' => Backend\Website\ImageSliderController::class,
            /// ABOUT \\\
            'backend-about' => Backend\Website\AboutController::class,
            /// VIDEO \\\
            'backend-video' => Backend\Website\VideoController::class,
            /// KATEGORI BERITA \\\
            'backend-kategori-berita'   => Backend\Website\KategoriBeritaController::class,
            /// BERITA \\\
            'backend-berita' => Backend\Website\BeritaController::class,
            /// EVENT \\\
            'backend-event' => Backend\Website\EventsController::class,
            /// FOOTER \\\
            'backend-footer'    => Backend\Website\FooterController::class,

            'backend-gallery'    => Backend\Website\GalleryController::class,

            'backend-mata-pelajaran' => Backend\Website\MataPelajaranController::class
        ]);

        ///// PENGGUNA \\\\\
        Route::resources([
            /// PENGAJAR \\\
            'backend-pengguna-pengajar' => Backend\Pengguna\PengajarController::class,
            /// STAF \\\
            'backend-pengguna-bk' => Backend\Pengguna\StafController::class,
            /// MURID \\\
            'backend-pengguna-murid' => Backend\Pengguna\MuridController::class,
            /// PPDB \\\
            'backend-pengguna-ppdb' => Backend\Pengguna\PPDBController::class,
            /// PERPUSTAKAAN \\\
            'backend-pengguna-perpus' => Backend\Pengguna\PerpusController::class,
            /// BENDAHARA \\\
            'backend-pengguna-bendahara'  => Backend\Pengguna\BendaharaController::class,

        ]);

        Route::get('/visitors', [App\Http\Controllers\HomeController::class, 'visitors']);

        Route::post('/importExcelMurid', [MuridController::class, 'importExcelMurid']);
        Route::post('/importExcelKelas', [KelasController::class, 'importExcelKelas']);
        Route::post('/importExcelMataPelajaran', [MataPelajaranController::class, 'importExcelMataPelajaran']);
    });
});

Route::prefix('/')->group(function () {
    // Halaman utama pengaduan BK
    Route::get('/bk', [IndexController::class, 'bk'])->name('bk-complaint.index');

    // Route untuk pengaduan notes
    Route::post('/bk/store', [IndexController::class, 'store'])->name('bk-complaint.store');

    // Route untuk appointment (online & offline)
    Route::post('/appointment/store', [IndexController::class, 'storeAppointment'])->name('bk-appointment.store');
});
