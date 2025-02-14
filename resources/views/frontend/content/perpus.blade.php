@extends('layouts.Frontend.app')
@section('title')
Perpus Digital
@endsection
@section('content')
    @section('about')
    <style>

        :root {
            --primary-color: #2563eb;
            --text-color: #333;
            --bg-color: #f5f5f5;
            --card-bg: #ffffff;
            --shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        body {
            background-color: var(--bg-color);
            color: var(--text-color);
        }

        .header {
            background: var(--card-bg);
            padding: 1rem;
            box-shadow: var(--shadow);
        }

        .header-content {
            max-width: 1200px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            font-size: 1.5rem;
            font-weight: bold;
            color: var(--text-color);
        }

        .search-bar {
            position: relative;
            margin: 0 1rem;
        }

        .search-bar input {
            padding: 0.5rem 1rem;
            width: 300px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 0.9rem;
        }

        .login-btn {
            background: var(--primary-color);
            color: white;
            padding: 0.5rem 1rem;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .main-content {
            max-width: 1200px;
            margin: 2rem auto;
            padding: 0 1rem;
        }

        .featured-books {
            margin-bottom: 2rem;
        }

        .section-title {
            font-size: 1.25rem;
            margin-bottom: 1rem;
        }

        .carousel {
            position: relative;
            overflow: hidden;
            padding: 1rem 0;
        }

        .book-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 1.5rem;
        }

        .book-card {
            background: var(--card-bg);
            border-radius: 8px;
            padding: 1rem;
            box-shadow: var(--shadow);
            transition: transform 0.2s;
        }

        .book-card:hover {
            transform: translateY(-4px);
        }

        .book-cover {
            width: 100%;
            height: 200px;
            background: #eee;
            border-radius: 4px;
            margin-bottom: 1rem;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .book-info h3 {
            font-size: 1rem;
            margin-bottom: 0.5rem;
        }

        .book-info p {
            color: #666;
            font-size: 0.9rem;
        }

        .rating {
            color: #f59e0b;
            margin-top: 0.5rem;
        }

        .categories {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            gap: 1rem;
            margin-bottom: 2rem;
        }

        .category-card {
            background: var(--card-bg);
            padding: 1rem;
            border-radius: 8px;
            box-shadow: var(--shadow);
            cursor: pointer;
        }

        .category-card:hover {
            background: #f8f8f8;
        }

        .footer {
            background: var(--card-bg);
            padding: 1.5rem;
            text-align: center;
            color: #666;
            margin-top: 2rem;
        }

        @media (max-width: 768px) {
            .header-content {
                flex-direction: column;
                gap: 1rem;
            }

            .search-bar input {
                width: 100%;
            }

            .book-grid {
                grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            }
        }

        .hero {
            background-color: #f3f4f6;
            background-image: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%239C92AC' fill-opacity='0.1'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
            padding: 5rem 0;
            text-align: center;
        }

        .hero h2 {
            font-size: 2.5rem;
            margin-bottom: 1rem;
            color: #1f2937;
        }

        .hero p {
            font-size: 1.2rem;
            color: #4b5563;
            margin-bottom: 2rem;
        }

    </style>
<body>
    <header class="header">
        <div class="header-content">
            <div class="logo">Perpustakaan Digital</div>
            <div class="search-bar">
                <input type="search" placeholder="Cari buku atau majalah...">
            </div>
        </div>
    </header>

    <section class="hero">
        <div class="container">
            <h1>Perpustakaan Digital<span class="text-primary"> SMPN 2 Tegal</span></h1>
            <p>Menyediakan akses ke buku, jurnal, dan majalah digital bagi siswa dan guru,
                meningkatkan literasi digital dan minat baca siswa.</p>
        </div>
    </section>

    <main class="main-content">
        <section class="featured-books">
            <h2 class="section-title">Buku Unggulan</h2>
            <div class="book-grid">
                <div class="book-card">
                    <div class="book-cover">📚</div>
                    <div class="book-info">
                        <h3>Matematika Kelas X</h3>
                        <p>Tim Pendidikan</p>
                        <div class="rating">★★★★☆ 4.5</div>
                    </div>
                </div>
                <div class="book-card">
                    <div class="book-cover">📖</div>
                    <div class="book-info">
                        <h3>Majalah Sekolah Edisi Jan 2025</h3>
                        <p>OSIS</p>
                        <div class="rating">★★★★★ 4.8</div>
                    </div>
                </div>
                <div class="book-card">
                    <div class="book-cover">📚</div>
                    <div class="book-info">
                        <h3>Ensiklopedia Sains</h3>
                        <p>Dr. Sains</p>
                        <div class="rating">★★★★☆ 4.7</div>
                    </div>
                </div>
            </div>
        </section>

        <section class="categories">
            <div class="category-card">
                <h3>Buku Pelajaran</h3>
                <p>Temukan berbagai buku pelajaran terbaik</p>
            </div>
            <div class="category-card">
                <h3>Novel</h3>
                <p>Koleksi novel dari berbagai genre</p>
            </div>
            <div class="category-card">
                <h3>Ensiklopedia</h3>
                <p>Pelajari berbagai pengetahuan umum</p>
            </div>
            <div class="category-card">
                <h3>Jurnal Ilmiah</h3>
                <p>Akses jurnal penelitian terkini</p>
            </div>
            <div class="category-card">
                <h3>Majalah Sekolah</h3>
                <p>Baca majalah sekolah terbaru</p>
            </div>
        </section>

        <section class="new-books">
            <h2 class="section-title">Baru Ditambahkan</h2>
            <div class="book-grid">
                <div class="book-card">
                    <div class="book-cover">📚</div>
                    <div class="book-info">
                        <h3>Fisika Dasar</h3>
                        <p>Prof. Fisika</p>
                        <div class="rating">★★★★☆ 4.6</div>
                    </div>
                </div>
                <div class="book-card">
                    <div class="book-cover">📖</div>
                    <div class="book-info">
                        <h3>Biologi Modern</h3>
                        <p>Dr. Bio</p>
                        <div class="rating">★★★★★ 4.9</div>
                    </div>
                </div>
                <div class="book-card">
                    <div class="book-cover">📚</div>
                    <div class="book-info">
                        <h3>Sejarah Indonesia</h3>
                        <p>Tim Sejarah</p>
                        <div class="rating">★★★★☆ 4.7</div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</body>
    @endsection
@endsection