<?php
namespace App\Http\Controllers\Backend\Website;
use App\Http\Controllers\Controller;
use App\Models\BKAppointment;
use Illuminate\Http\Request;

class BKAppointmentController extends Controller
{
    // Admin methods
    public function index()
    {
        $appointments = BKAppointment::with(['kelas', 'counselor'])
            ->latest()
            ->get();
        return view('backend.website.bk.bkAppointment', compact('appointments'));
    }

    public function updateStatus(Request $request, BKAppointment $appointment)
    {
        $validated = $request->validate([
            'status' => 'required|in:pending,approved,completed,cancelled',
            'meeting_link' => 'required_if:status,approved|nullable|url'
        ]);

        $appointment->update([
            'status' => $validated['status'],
            'meeting_link' => $validated['meeting_link']
        ]);

        return redirect()->back()->with('success', 'Status janji konsultasi berhasil diperbarui');
    }
}