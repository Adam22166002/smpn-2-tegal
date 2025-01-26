<?php

namespace App\Http\Controllers\Backend\Website;

use App\Http\Controllers\Controller;
use App\Models\Events;
use Illuminate\Http\Request;
use App\Http\Requests\EventRequest;
use Illuminate\Console\Scheduling\Event;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class EventsController extends Controller
{
    protected $messages = [
        'title.required'     => 'Nama acara tidak boleh kosong.',
        'title.max'          => 'Nama acara tidak boleh lebih dari 255 karakter.',
        'acara.required'     => 'Jam acara tidak boleh kosong.',
        'acara.date_format'  => 'Jam acara tidak valid.',
        'desc.required'      => 'Deskripsi singkat tidak boleh kosong.',
        'content.required'   => 'Content tidak boleh kosong.',
        'lokasi.required'    => 'Lokasi tidak boleh kosong.',
        'lokasi.max'         => 'Lokasi tidak boleh lebih dari 255 karakter.',
        'thumbnail.required' => 'Gambar thumbnail tidak boleh kosong.',
        'thumbnail.mimes'    => 'Gambar thumbnail yang dimasukan tidak valid.',
        'thumbnail.mimetypes' => 'Gambar thumbnail yang dimasukan tidak valid.',
        'thumbnail.max'       => 'Maksimal gambar thumbnail tidak boleh lebih dari 1MB.'
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $event = Events::all();
        return view('backend.website.content.event.index', compact('event'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.website.content.event.create');
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
            'title'     => 'required|max:255',
            'desc'      => 'required',
            'content'   => 'required',
            'thumbnail' => 'required|mimes:jpeg,png,jpg|mimetypes:image/jpeg,image/png|max:1024',
            'acara'     => 'required|date_format:Y-m-d\TH:i',
            'lokasi'    => 'required|max:255',
        ], $this->messages);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        } else {

            $image = $request->file('thumbnail');
            $nama_image = time() . "_" . $image->getClientOriginalName();
            $tujuan_upload = 'public/images/event';
            $image->storeAs($tujuan_upload, $nama_image);

            // Buat slug berdasarkan title
            $slug = Str::slug($request->title);

            // Simpan data event
            $event = new Events;
            $event->title       = $request->title;
            $event->slug        = $slug;
            $event->desc        = $request->desc;
            $event->content     = $request->content;
            $event->thumbnail   = $nama_image;
            $event->acara       = $request->acara;
            $event->lokasi      = $request->lokasi;
            $event->save();

            Session::flash('success', 'Acara berhasil di tambah!');
            return redirect()->route('backend-event.index');
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
        $event = Events::find($id);
        return view('backend.website.content.event.edit', compact('event'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EventRequest $request, $id)
    {

        $validator = Validator::make($request->all(), [
            'title'     => 'required|max:255',
            'desc'      => 'required',
            'content'   => 'required',
            'thumbnail' => 'mimes:jpeg,png,jpg|mimetypes:image/jpeg,image/png|max:1024',
            'acara'     => 'required|date_format:Y-m-d\TH:i',
            'lokasi'    => 'required|max:255',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        } else {

            $event = Events::findOrFail($id);
            $event->title       = $request->title;
            $event->desc        = $request->desc;
            $event->content     = $request->content;
            $event->acara       = $request->acara;
            $event->is_active   = $request->is_Active;
            $event->lokasi      = $request->lokasi;

            // Proses upload gambar jika ada
            if ($request->hasFile('thumbnail')) {

                // Lokasi penyimpanan di disk "public"
                $folderPath = 'images/event';

                // Hapus file lama jika ada
                if ($event->thumbnail) {
                    Storage::disk('public')->delete("$folderPath/{$event->thumbnail}");
                }

                // Upload gambar baru
                $image = $request->file('thumbnail');
                $nama_image = time() . "_" . $image->getClientOriginalName();
                $image->storeAs($folderPath, $nama_image, 'public');
                $event->thumbnail  = $nama_image;
            }

            $event->save();

            Session::flash('success', 'Acara berhasil di update!');
            return redirect()->route('backend-event.index');
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
        $event = Events::find($id);
        $destinationPath = public_path('storage/images/event/');
        unlink($destinationPath . $event->thumbnail);

        $event->delete();
        Session::flash('success', 'Data acara berhasil di hapus!');
        return redirect()->route('backend-event.index');
    }
}
