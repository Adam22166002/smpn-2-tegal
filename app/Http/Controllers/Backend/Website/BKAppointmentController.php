<?php
namespace App\Http\Controllers\Backend\Website;
use App\Http\Controllers\Controller;
use App\Models\BKAppointment;
use Illuminate\Http\Request;

class BKAppointmentController extends Controller
{
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|string|max:255',
            'class' => 'required|string|max:10',
            'phone' => 'required|string|max:20',
            'appointment_date' => 'required|date|after_or_equal:today',
            'appointment_time' => 'required|string',
            'consultation_topic' => 'required|string|max:50',
            'description' => 'nullable|string',
            'type' => 'required|in:online,offline',
        ];

        // Tambahan validasi untuk appointment online
        if ($request->type === 'online') {
            $rules['email'] = 'required|email';
            $rules['platform'] = 'required|in:google_meet,zoom,whatsapp';
        }

        // Tambahan validasi untuk appointment offline
        if ($request->type === 'offline') {
            $rules['counselor_id'] = 'nullable|exists:counselors,id';
        }

        $validated = $request->validate($rules);
        $validated['status'] = 'pending';

        BKAppointment::create($validated);

        return redirect()->route('bk-complaint.index')
            ->with('success', 'Janji konsultasi Anda telah berhasil dibuat');
    }
}