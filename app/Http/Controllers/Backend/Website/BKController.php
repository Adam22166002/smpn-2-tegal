<?php
namespace App\Http\Controllers\Backend\Website;

use App\Http\Controllers\Controller;
use App\Models\BKComplaint;
use App\Models\Jurusan;
use App\Models\Kegiatan;
use Illuminate\Http\Request;

class BKController extends Controller
{
    public function index()
    {
        $jurusanM = Jurusan::all();
        $kegiatanM = Kegiatan::all(); 
        return view('frontend.bk-complaint.index', compact('jurusanM','kegiatanM'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'nullable|string|max:255',
            'class' => 'required|string|max:10',
            'problem_type' => 'required|string|max:50',
            'description' => 'required|string',
            'urgency' => 'required|in:low,medium,high'
        ]);

        $validated['status'] = 'pending';
        
        BKComplaint::create($validated);

        return redirect()->route('frontend.bk-complaint.index')
            ->with('success', 'Pengaduan Anda telah berhasil dikirim');
    }
}