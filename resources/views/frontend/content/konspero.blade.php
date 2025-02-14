@extends('layouts.Frontend.app')
@section('title')
Konspero
@endsection
@section('content')
    @section('about')
    <style>
        /* Reset CSS */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            color: #333;
            background-color: #f5f5f5;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        .logo {
            font-size: 1.8rem;
            font-weight: bold;
        }

        /* Hero Section */
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

        .btn {
            display: inline-block;
            padding: 0.8rem 2rem;
            background-color: #2563eb;
            color: white;
            text-decoration: none;
            border-radius: 9999px;
            transition: background-color 0.3s;
        }

        .btn:hover {
            background-color: #1d4ed8;
        }

        /* Services Section */
        .services {
            padding: 4rem 0;
        }

        .section-title {
            text-align: center;
            font-size: 2rem;
            margin-bottom: 3rem;
            color: #1f2937;
        }

        .services-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
        }

        .service-card {
            background: white;
            padding: 2rem;
            border-radius: 0.5rem;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }

        .service-icon {
            width: 48px;
            height: 48px;
            background: #e0e7ff;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 1rem;
        }

        .service-icon svg {
            width: 24px;
            height: 24px;
            color: #2563eb;
        }

        /* Form Styles */
        .consultation-form {
            background: #f9fafb;
            padding: 4rem 0;
        }

        .form-container {
            max-width: 600px;
            margin: 0 auto;
            background: white;
            padding: 2rem;
            border-radius: 0.5rem;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            color: #4b5563;
        }

        .form-control {
            width: 100%;
            padding: 0.75rem;
            border: 1px solid #d1d5db;
            border-radius: 0.375rem;
            font-size: 1rem;
        }

        textarea.form-control {
            min-height: 120px;
            resize: vertical;
        }


        /* Responsive Design */
        @media (max-width: 768px) {
            .menu-button {
                display: block;
            }

            nav ul {
                display: none;
                position: absolute;
                top: 100%;
                left: 0;
                right: 0;
                background: #2563eb;
                flex-direction: column;
                padding: 1rem;
            }

            nav ul.active {
                display: flex;
            }

            nav li {
                margin: 0.5rem 0;
            }

            .hero h2 {
                font-size: 2rem;
            }

            .services-grid,
            .articles-grid,
            .footer-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
<body>

    <!-- Hero Section -->
    <section class="hero">
        <div class="container">
            <h1>Layanan Konsultasi dan Bimbingan<span class="text-primary"> SMPN 2 Tegal</span></h1>
            <p>Kami hadir untuk membantu Anda dalam pengembangan akademik, pribadi, sosial, dan karier.</p>
            <a href="#konsultasi" class="btn">Mulai Konsultasi</a>
        </div>
    </section>

    <!-- Services Section -->
    <section class="services" id="layanan">
        <div class="container">
            <h2 class="section-title">Layanan Kami</h2>
            <div class="services-grid">
                <!-- Service 1 -->
                <div class="service-card">
                    <div class="service-icon">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                        </svg>
                    </div>
                    <h3>Konsultasi Online</h3>
                    <p>Konsultasikan masalah Anda secara online dengan guru BK atau konselor sekolah.</p>
                </div>

                <!-- Service 2 -->
                <div class="service-card">
                    <div class="service-icon">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                        </svg>
                    </div>
                    <h3>Tes Minat Bakat</h3>
                    <p>Temukan potensi dan bakat Anda melalui tes minat bakat interaktif.</p>
                </div>

                <!-- Service 3 -->
                <div class="service-card">
                    <div class="service-icon">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2v4l-4-4H9a1.994 1.994 0 01-1.414-.586m0 0L11 14h4a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2v4l.586-.586z"></path>
                        </svg>
                    </div>
                    <h3>Forum Diskusi</h3>
                    <p>Diskusikan berbagai topik dengan sesama siswa dan guru BK.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Consultation Form -->
    <section class="consultation-form" id="konsultasi">
        <div class="container">
            <div class="form-container">
                <h2 class="section-title">Form Konsultasi</h2>
                <form>
                    <div class="form-group">
                        <label>Nama (Opsional)</label>
                        <input type="text" class="form-control" placeholder="Masukkan nama Anda">
                    </div>
                    <div class="form-group">
                        <label>Kategori Konsultasi</label>
                        <select class="form-control">
                            <option>Akademik</option>
                            <option>Sosial</option>
                            <option>Pribadi</option>
                            <option>Karier</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Pesan</label>
                        <textarea class="form-control" placeholder="Tuliskan pesan Anda"></textarea>
                    </div>
                    <button type="submit" class="btn">Kirim Pesan</button>
                </form>
            </div>
        </div>
    </section>

    <script>
        // Mobile menu toggle
        const menuButton = document.querySelector('.menu-button');
        const nav = document.querySelector('nav ul');

        menuButton.addEventListener('click', () => {
            nav.classList.toggle('active');
        });
    </script>
</body>


    @endsection
@endsection
