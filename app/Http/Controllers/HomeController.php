<?php

namespace App\Http\Controllers;

use App\Models\dataMurid;
use App\Models\Events;
use App\Models\User;
use App\Models\Berita;
use App\Models\BKComplaint;
use App\Models\Kelas;
use App\Models\UsersDetail;
use Carbon\Carbon;
use App\Models\Visitor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Modules\Perpustakaan\Entities\Book;
use Modules\Perpustakaan\Entities\Borrowing;
use Modules\Perpustakaan\Entities\Member;

class HomeController extends Controller
{
  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function __construct()
  {
    $this->middleware('auth');
  }

  /**
   * Show the application dashboard.
   *
   * @return \Illuminate\Contracts\Support\Renderable
   */
  public function index()
  {
    $role = Auth::user()->role;

    if (Auth::check()) {
      // DASHBOARD ADMIN \\
      if ($role == 'Admin') {

        $guru = User::where('role', 'Guru')->where('status', 'Aktif')->count();
        $murid = User::where('role', 'Murid')->where('status', 'Aktif')->count();
        $alumni = User::where('role', 'Alumni')->where('status', 'Aktif')->count();
        $berita = Berita::select('id')->count();
        $acara = Events::where('is_active', '0')->count();
        // $event = Events::where('is_active', '0')->orderBy('created_at', 'desc')->first();
        $book = Book::sum('stock');
        $borrow = Borrowing::whereNull('lateness')->count();
        $member = Member::where('is_active', 0)->count();

        return view('backend.website.home', compact('guru', 'murid', 'alumni', 'acara', 'book', 'borrow', 'member', 'berita'));
      }
      // DASHBOARD MURID \\
      elseif ($role == 'Murid') {
        $auth = Auth::id();

        $event = Events::where('is_active', '0')->first();
        $lateness = Borrowing::with('members')
          ->when(isset($auth), function ($q) use ($auth) {
            $q->whereHas('members', function ($a) use ($auth) {
              switch ($auth) {
                case $auth:
                  $a->where('user_id', Auth::id());
                  break;
              }
            });
          })
          ->whereNull('lateness')
          ->count();


        $pinjam = Borrowing::with('members')
          ->when(isset($auth), function ($q) use ($auth) {
            $q->whereHas('members', function ($a) use ($auth) {
              switch ($auth) {
                case $auth:
                  $a->where('user_id', Auth::id());
                  break;
              }
            });
          })
          ->count();

        return view('murid::index', compact('event', 'lateness', 'pinjam'));
      } elseif ($role == 'Guru' || $role == 'BK') {

        $user_id = Auth::user()->id;
        $totalKelas = DB::table('kelas')->count();
        $murid = User::where('role', 'Murid')->where('status', 'Aktif')->count();
        $pendingComplaints = BKComplaint::where('status', 'pending')->count();
        $pendingAppointments = BKComplaint::where('status', 'pending')->count();

        $mengajarKelas = UsersDetail::select(
          'users_details.kelas',
          'users_details.nama_kelas'
        )
          ->where('user_id', $user_id)->first();

        $event = Events::where('is_active', '0')->first();

        return view('backend.website.home', compact('event', 'murid', 'totalKelas', 'mengajarKelas', 'pendingComplaints', 'pendingAppointments'));
      }
      // DASHBOARD PPDB & PENDAFTAR \\
      elseif ($role == 'Guest' || $role == 'PPDB') {

        $register = dataMurid::whereNotIn('proses', ['Murid', 'Ditolak'])->whereYear('created_at', Carbon::now())->count();
        $needVerif = dataMurid::whereNotNull(['tempat_lahir', 'tgl_lahir', 'agama'])->whereNull('nisn')->count();
        return view('ppdb::backend.index', compact('register', 'needVerif'));
      }
      // DASHBOARD PERPUSTAKAAN \\
      elseif ($role == 'Perpustakaan') {

        $book = Book::sum('stock');
        $borrow = Borrowing::whereNull('lateness')->count();
        $member = Member::where('is_active', 0)->count();
        $members = Member::count();
        return view('perpustakaan::index', compact('book', 'borrow', 'member', 'members'));
      }

      // DASHBOARD BENDAHARA \\
      elseif ($role == 'Bendahara') {
        return view('spp::index');
      }
    }
  }

  public function visitors()
  {
    $data = Visitor::selectRaw('DATE(created_at) as date, COUNT(*) as count')
      ->groupBy('date')
      ->get();

    return response()->json($data);
  }
}
