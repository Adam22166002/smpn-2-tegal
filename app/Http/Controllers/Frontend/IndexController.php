<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Berita;
use App\Models\Events;
use App\Models\Footer;
use App\Models\ImageSlider;
use Illuminate\Http\Request;
use App\Models\Jurusan;
use App\Models\KategoriBerita;
use App\Models\Kegiatan;
use App\Models\ProfileSekolah;
use App\Models\User;
use App\Models\Video;
use App\Models\Visimisi;
use Carbon\Carbon;

class IndexController extends Controller
{
    //Welcome
    public function index()
    {
        // Menu
        $jurusanM = Jurusan::where('is_active','0')->get();
        $kegiatanM = Kegiatan::where('is_active','0')->get();

        // Gambar Slider
        $slider = ImageSlider::where('is_Active','0')->get();

        // About
        $about = About::where('is_Active','0')->first();

        // Video
        $video = Video::where('is_active','0')->first();

        // Pengajar
        $pengajar = User::with('userDetail')->where('status','Aktif')->where('role','Guru')->get();

        //Pengajar Tester
        $pengajar_test = collect([
            (object)[
                'foto_profile' => 'teacher1.jpg',
                'name' => 'John Doe',
                'email' => 'johndoe@example.com',
                'linkedln' => 'johndoe',
                'twitter' => 'johndoe_twitter',
                'facebook' => 'john.doe.official',
                'instagram' => 'johndoe_ig',
                'userDetail' => (object)[
                    'mengajar' => 'Matematika',
                    'website' => 'https://www.johndoe.com',
                ],
            ],
            (object)[
                'foto_profile' => 'teacher2.jpg',
                'name' => 'Jane Smith',
                'email' => 'janesmith@example.com',
                'linkedln' => 'janesmith',
                'twitter' => 'janesmith_twitter',
                'facebook' => 'jane.smith.official',
                'instagram' => 'janesmith_ig',
                'userDetail' => (object)[
                    'mengajar' => 'Fisika',
                    'website' => 'https://www.janesmith.com',
                ],
            ],
            (object)[
                'foto_profile' => 'teacher3.jpg',
                'name' => 'Alice Johnson',
                'email' => 'alicejohnson@example.com',
                'linkedln' => 'alicejohnson',
                'twitter' => 'alicejohnson_twitter',
                'facebook' => 'alice.johnson.official',
                'instagram' => 'alicejohnson_ig',
                'userDetail' => (object)[
                    'mengajar' => 'Biologi',
                    'website' => 'https://www.alicejohnson.com',
                ],
            ],
        ]);

        // Berita
        $berita = Berita::where('is_active','0')->orderBy('created_at','desc')->get();

        // Data berita tester
        $berita_test = collect([
            (object)[
                'slug' => 'berita-1',
                'thumbnail' => 'thumbnail1.jpg',
                'title' => 'Judul Berita 1',
                'created_at' => Carbon::now()->subDays(5),
            ],
            (object)[
                'slug' => 'berita-2',
                'thumbnail' => 'thumbnail2.jpg',
                'title' => 'Judul Berita 2',
                'created_at' => Carbon::now()->subDays(10),
            ],
            (object)[
                'slug' => 'berita-3',
                'thumbnail' => 'thumbnail3.jpg',
                'title' => 'Judul Berita 3',
                'created_at' => Carbon::now()->subDays(3),
            ],
        ]);

        // Event
        $event = Events::where('is_active','0')->orderBy('created_at','desc')->get();

        //Event Tester
        $event_test = collect([
            (object)[
                'slug' => 'event-1',
                'acara' => Carbon::now()->addDays(5), // 5 hari dari sekarang
                'title' => 'Event Pertama',
                'desc' => 'Deskripsi acara pertama.',
                'lokasi' => 'Lokasi 1',
            ],
            (object)[
                'slug' => 'event-2',
                'acara' => Carbon::now()->addDays(10), // 10 hari dari sekarang
                'title' => 'Event Kedua',
                'desc' => 'Deskripsi acara kedua.',
                'lokasi' => 'Lokasi 2',
            ],
            (object)[
                'slug' => 'event-3',
                'acara' => Carbon::now()->addDays(15), // 15 hari dari sekarang
                'title' => 'Event Ketiga',
                'desc' => 'Deskripsi acara ketiga.',
                'lokasi' => 'Lokasi 3',
            ],
        ]);

        // Footer
        $footer = Footer::first();

        return view('frontend.welcome', compact('pengajar_test','event_test','berita_test','jurusanM','kegiatanM','slider','about','video','pengajar','berita','event','footer'));
    }

    // Berita
    public function berita()
    {
         // Menu
         $jurusanM = Jurusan::where('is_active','0')->get();
         $kegiatanM = Kegiatan::where('is_active','0')->get();

         // Footer
        $footer = Footer::first();

         // Kategori
         $kategori = KategoriBerita::where('is_active','0')->orderBy('created_at','desc')->get();

         // Berita
         $berita = Berita::where('is_active','0')->orderBy('created_at','desc')->paginate(10);

         return view('frontend.content.beritaAll', compact('berita','kategori','jurusanM','kegiatanM','footer'));
    }
    // Show Detail Berita
    public function detailBerita($slug)
    {
        // Menu
        $jurusanM = Jurusan::where('is_active','0')->get();
        $kegiatanM = Kegiatan::where('is_active','0')->get();

        // Footer
        $footer = Footer::first();

        // Kategori
        $kategori = KategoriBerita::where('is_active','0')->orderBy('created_at','desc')->get();

        // Berita
        $beritaOther = Berita::where('is_active','0')->orderBy('created_at','desc')->get();

        $berita = Berita::where('slug',$slug)->first();
        return view('frontend.content.showBerita', compact('berita','kategori','beritaOther','jurusanM','kegiatanM','footer'));
    }


    // Events
    public function events()
    {
         // Menu
         $jurusanM = Jurusan::where('is_active','0')->get();
         $kegiatanM = Kegiatan::where('is_active','0')->get();

         // Footer
        $footer = Footer::first();

         // Berita
         $berita = Berita::where('is_active','0')->orderBy('created_at','desc')->get();

         $event = Events::where('is_active','0')->orderBy('created_at','desc')->get();
         return view('frontend.content.event.eventAll', compact('event','berita','jurusanM','kegiatanM','footer'));
    }


    // Detail Event
    public function detailEvent($slug)
    {
        // Menu
        $jurusanM = Jurusan::where('is_active','0')->get();
        $kegiatanM = Kegiatan::where('is_active','0')->get();

         // Footer
        $footer = Footer::first();

         // Berita
         $berita = Berita::where('is_active','0')->orderBy('created_at','desc')->get();

         $event = Events::where('slug',$slug)->first();
         $eventOther = Events::where('is_active','0')->orderBy('created_at','desc')->get();

         return view('frontend.content.event.detailEvent', compact('event','eventOther','berita','jurusanM','kegiatanM','footer'));
    }

    // Profile Sekolah
    public function profileSekolah()
    {
        $jurusanM = Jurusan::where('is_active','0')->get();
        $kegiatanM = Kegiatan::where('is_active','0')->get();

        // Pengajar
        $pengajar = User::with('userDetail')->where('status','Aktif')->where('role','Guru')->get();

        // Footer
        $footer = Footer::first();

        $profile = ProfileSekolah::first();
        return view('frontend.content.profileSekolah', compact('profile','jurusanM','kegiatanM','pengajar','footer'));
    }

    // Visi dan Misi
    public function visimisi()
    {
        $jurusanM = Jurusan::where('is_active','0')->get();
        $kegiatanM = Kegiatan::where('is_active','0')->get();

        // Pengajar
        $pengajar = User::with('userDetail')->where('status','Aktif')->where('role','Guru')->get();

        // Footer
        $footer = Footer::first();

        $visimisi = Visimisi::first();
        return view('frontend.content.visimisi', compact('visimisi','jurusanM','kegiatanM','pengajar','footer'));
    }

}
