<?php
namespace App\Http\Controllers\Backend\Website;

use App\Http\Controllers\Controller;
use App\Models\dataMurid;
use App\Models\BKComplaint;
use App\Models\Kelas;
use App\Models\User;
use Illuminate\Http\Request;

class BKController extends Controller
{
    public function index()
    {
        $complaints = BKComplaint::with('kelas')->latest()->get();
        return view('backend.website.bk.bkComplaint', compact('complaints'));
    }

    public function updateStatus(Request $request, BKComplaint $complaint)
    {
        $validated = $request->validate([
            'status' => 'required|in:pending,in_progress,resolved'
        ]);

        $complaint->update(['status' => $validated['status']]);
        return redirect()->back()->with('success', 'Status pengaduan berhasil diperbarui');
    }
    public function daftarKelas()
    {
        $kelas = Kelas::select(
            'kelas.id',
            'kelas.kelas',
            'kelas.nama_kelas'
        )
            ->orderBy('kelas', 'asc')
            ->get();
        return view('backend.website.bk.daftar_kelas', compact('kelas'));
    }
    public function daftarMurid()
    {
        $murid = User::whereHas('dataMurid') // Hanya user yang punya data murid
                ->with('dataMurid') // Ambil relasi dataMurid
                ->get();

        return view('backend.website.bk.daftar_siswa', compact('murid'));
    }
}