<?php

namespace App\Http\Controllers\Backend\Website;

use App\Http\Controllers\Controller;
use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $video = Video::all();
        return view('backend.website.content.video.index', compact('video'));
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
            'title'     => 'required|max:255',
            'desc'      => 'required',
            'url'       => 'required|url',
            'is_active' => 'required|boolean',
        ], [
            'title.required'    => 'Judul harus diisi.',
            'title.max'         => 'Judul tidak boleh lebih dari 255 karakter.',
            'desc.required'     => 'Deskripsi harus diisi.',
            'url.required'      => 'URL harus diisi.',
            'url.url'           => 'URL harus berupa link yang valid.',
            'is_active.required' => 'Status aktif harus diisi.',
            'is_active.boolean'  => 'Status aktif tidak valid.',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        } else {

            // Simpan data video baru
            $video = new Video;
            $video->title       = $request->title;
            $video->desc        = $request->desc;
            $video->url         = $request->url;
            $video->is_active   = $request->is_active;
            $video->save();

            Session::flash('success', 'Video berhasil di tambah!');
            return redirect()->route('backend-video.index');
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
        $video = Video::find($id);
        return view('backend.website.content.video.edit', compact('video'));
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
            'title'     => 'required|max:255',
            'desc'      => 'required',
            'url'       => 'required|url',
            'is_active' => 'required|boolean',
        ], [
            'title.required'    => 'Judul harus diisi.',
            'title.max'         => 'Judul tidak boleh lebih dari 255 karakter.',
            'desc.required'     => 'Deskripsi harus diisi.',
            'url.required'      => 'URL harus diisi.',
            'url.url'           => 'URL harus berupa link yang valid.',
            'is_active.required' => 'Status aktif harus diisi.',
            'is_active.boolean'  => 'Status aktif tidak valid.',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        } else {

            $video = Video::findOrFail($id);
            $video->title       = $request->title;
            $video->desc        = $request->desc;
            $video->url         = $request->url;
            $video->is_active   = $request->is_active;
            $video->save();

            Session::flash('success', 'Video berhasil di update!');
            return redirect()->route('backend-video.index');
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
        $video = Video::find($id);
        $video->delete();

        Session::flash('success', 'Video berhasil di hapus!');
        return redirect()->route('backend-video.index');
    }
}
