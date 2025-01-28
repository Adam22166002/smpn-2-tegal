<?php

namespace App\Http\Controllers\Backend\Website;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index()
    {
        // Menampilkan semua galeri
        $galleries = Gallery::all();
        return view('frontend.content.gallery', compact('galleries'));
    }

    public function create()
    {
        return view('backend.website.gallery.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpg,jpeg,png,gif',
            'category' => 'required|string|max:50',
            'description' => 'nullable|string',
        ]);

        $imagePath = $request->file('image')->store('gallery', 'public');

        Gallery::create([
            'title' => $request->title,
            'image' => $imagePath,
            'category' => $request->category,
            'description' => $request->description,
        ]);

        return redirect()->route('backend.website.gallery.index')->with('success', 'Foto berhasil ditambahkan');
    }
}

