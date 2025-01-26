<?php

namespace App\Http\Controllers\Backend\Website;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Models\ImageSlider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;

class ImageSliderController extends Controller
{

    protected $messages = [
        'title.required'    => 'Nama judul slider tidak boleh kosong.',
        'title.max'         => 'Nama judul slider tidak boleh lebih dari 255 karakter.',
        'desc.required'     => 'Deskripsi slider tidak boleh kosong.',
        'urutan.required'   => 'Urutan slider tidak boleh kosong.',
        'urutan.integer'    => 'Urutan slider tidak valid.',
        'image.required'    => 'Gambar tidak boleh kosong.',
        'image.mimes'       => 'Gambar yang dimasukan tidak valid.',
        'image.mimetypes'   => 'Gambar yang dimasukan tidak valid.',
        'image.max'         => 'Maksimal gambar tidak boleh lebih dari 1MB.'
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $image = ImageSlider::all();
        return view('backend.website.content.imageSlider.index', compact('image'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'image'     => 'required|mimes:jpeg,png,jpg|mimetypes:image/jpeg,image/png|max:1024',
            'desc'      => 'required',
            'title'     => 'required|max:255',
            'urutan'    => 'required|integer',
        ], $this->messages);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        } else {

            $image = $request->file('image');
            $nama_image = time() . "_" . $image->getClientOriginalName();
            $tujuan_upload = 'public/images/slider';

            $imageSlider = new ImageSlider;
            $imageSlider->image     = $nama_image;
            $imageSlider->desc      = $request->desc;
            $imageSlider->title     = $request->title;
            $imageSlider->urutan    = $request->urutan;
            $imageSlider->save();

            $image->storeAs($tujuan_upload, $nama_image);
            Session::flash('success', 'Gambar slider berhasil di tambah!');
            return redirect()->route('backend-imageslider.index');
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
        $image = ImageSlider::find($id);
        return view('backend.website.content.imageSlider.edit', compact('image'));
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
            'image'     => 'nullable|mimes:jpeg,png,jpg|mimetypes:image/jpeg,image/png|max:1024',
            'desc'      => 'required',
            'title'     => 'required|max:255',
            'urutan'    => 'required|integer',
            'is_active' => 'required|boolean',
        ], $this->messages);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        } else {

            $imageSlider = ImageSlider::findOrFail($id);
            $imageSlider->title     = $request->input('title');
            $imageSlider->desc      = $request->input('desc');
            $imageSlider->urutan    = $request->input('urutan');
            $imageSlider->is_active = $request->input('is_active');

            // Jika ada file gambar baru yang diupload
            if ($request->hasFile('image')) {

                $image = $request->file('image');
                $nama_image = time() . "_" . $image->getClientOriginalName();

                // Hapus file gambar lama jika ada
                if ($imageSlider->image) {
                    Storage::disk('public')->delete("images/slider/{$imageSlider->image}");
                }

                // Simpan file gambar baru
                $tujuan_upload = 'public/images/slider';
                $image->storeAs($tujuan_upload, $nama_image);
                $imageSlider->image = $nama_image;
            }

            $imageSlider->save();
            Session::flash('success', 'Gambar slider berhasil di update!');
            return redirect()->route('backend-imageslider.index');
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
        $slider = ImageSlider::find($id);
        $destinationPath = public_path('storage/images/slider/');
        unlink($destinationPath . $slider->image);

        $slider->delete();
        Session::flash('success', 'Data slider berhasil di hapus!');
        return redirect()->route('backend-imageslider.index');
    }
}
