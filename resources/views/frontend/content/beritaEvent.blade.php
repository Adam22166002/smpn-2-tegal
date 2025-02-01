<div class="news-event-area">
    <div class="container">
        <div class="row">
            <div class="news-box">
                <div class="d-flex justify-content-between align-items-center" style="display: flex; justify-content:space-between; align-items:center;">
                    <div>
                        <h2><span class="text-primary"> Berita</span> Terbaru</h2>
                        <p class="mb-0">Kabar Terbaru Mengenai Sekolah Kami</p>
                    </div>
                    <div>
                        <a href="{{ route('berita') }}" class="text-primary">Selengkapnya <i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>

                <div class="news-carousel position-relative">
                    <div class="row news-track">
                        @foreach ($berita as $beritas)
                        <div class="col-md-6 mb-4">
                            <div class="card news-card h-100">
                                <div class="position-relative" style="margin: 0;">
                                    <a href="{{ route('detail.berita', $beritas->slug) }}">
                                        <img src="{{ asset('storage/images/berita/' . $beritas->thumbnail) }}" 
                                             class="card-img-top" 
                                             alt="news"
                                             style="object-fit: cover; height: 250px; margin:0px;">
                                    </a>
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">
                                        <a href="{{ route('detail.berita', $beritas->slug) }}" class="text-dark text-decoration-none">
                                            {{ $beritas->title }}
                                        </a><span class="small">{{ Carbon\Carbon::parse($beritas->created_at)->format('d F Y') }}</span>
                                    </h5>
                                    <p class="card-text">{{ Str::limit($beritas->content, 150) }}</p>
                                    <a href="{{ route('detail.berita', $beritas->slug) }}" class="text-primary text-decoration-none mt-0">
                                            Baca Detail →
                                        </a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="news-dots text-center mt-4"></div>
                </div>
            </div>

            <div class="col-xs-12 event-inner-area" style="margin-bottom: 5rem;">
                <div class="d-flex justify-content-between align-items-center mb-4" style="display: flex; justify-content:space-between; align-items:center;">
                    <div>
                        <h2 class=""><span class="text-primary">Events</span> Terbaru</h2>
                        <p class="mb-0">Event-event Terbaru Mengenai SMPN Tegal</p>
                    </div>
                    <div>
                        <a href="{{ route('event') }}" class="text-primary">Lihat Semua Event <i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>

                <div class="row">
                    @foreach ($event->take(4) as $events)
                    <div class="col-md-6 mb-4 wow bounceInUp" data-wow-duration="2s" data-wow-delay=".1s">
                        <div class="card shadow-sm border-light rounded-3 h-100">
                            <div class="card-body p-0">
                                <div class="row g-0">
                                    <div class="col-4">
                                        <a href="{{ route('detail.event', $events->slug) }}">
                                            <img src="{{ asset('storage/images/event/' . $events->thumbnail) }}" 
                                                 class="img-fluid rounded-start h-100" 
                                                 alt="event-thumbnail"
                                                 style="object-fit: cover; min-height: 200px;">
                                        </a>
                                    </div>
                                    <div class="col-8">
                                        <div class="card-body">
                                            <h3 class="h5 mb-3">
                                                <a href="{{ route('detail.event', $events->slug) }}" 
                                                   class="text-decoration-none text-dark">
                                                    {{ $events->title }}
                                                </a>
                                            </h3>
                                            <div class="d-flex flex-column gap-2 mb-3">
                                                <div class="text-muted">
                                                    <i class="bi bi-calendar"></i>
                                                    {{ Carbon\Carbon::parse($events->created_at)->format('d F Y') }}
                                                </div>
                                                <div class="text-muted">
                                                    <i class="bi bi-clock"></i>
                                                    {{ Carbon\Carbon::parse($events->acara)->format('h:i') }} - Selesai
                                                </div>
                                                <div class="text-muted">
                                                    <i class="bi bi-geo-alt"></i>
                                                    {{ $events->lokasi }}
                                                </div>
                                            </div>
                                            <p class="text-muted">{{ Str::limit($events->desc, 100) }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div class="container" style="margin-bottom: 5rem; margin: top 5rem;">
        <div class="row">
            <div class="col-md-4 text-center text-white">
                <img src="path-to-akreditasi-icon.png" alt="Akreditasi Icon" class="img-fluid mb-4" width="120">
                <h3 class="mb-3">Terakreditasi "A"</h3>
                <p class="mb-0">SMP Negeri 2 memiliki akreditasi grade A dengan nilai 95 (akreditasi tahun 2019) dari BAN-S/M (Badan Akreditasi Nasional) Sekolah/Madrasah</p>
            </div>
            
            <div class="col-md-4 text-center text-white">
                <img src="path-to-kurikulum-icon.png" alt="Kurikulum Icon" class="img-fluid mb-4" width="120">
                <h3 class="mb-3">Kurikulum Terbaru</h3>
                <p class="mb-0">SMPN 2 TEGAL menggunakan kurikulum SMP 2013</p>
            </div>
            
            <div class="col-md-4 text-center text-white">
                <img src="path-to-fasilitas-icon.png" alt="Fasilitas Icon" class="img-fluid mb-4" width="120">
                <h3 class="mb-3">Fasilitas Unggulan</h3>
                <p class="mb-0">Fasilitas terbaik disiapkan SMPN 2 TEGAL supaya para mahasiswa nyaman dalam mengikuti pelajaran</p>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const newsTrack = document.querySelector('.news-track');
    const newsCards = document.querySelectorAll('.news-card');
    const dotsContainer = document.querySelector('.news-dots');
    
    const totalDots = Math.ceil(newsCards.length / 3);
    for (let i = 0; i < totalDots; i++) {
        const dot = document.createElement('span');
        dot.classList.add('dot');
        dot.style.cssText = `
            display: inline-block;
            width: 10px;
            height: 10px;
            margin: 0 5px;
            border-radius: 50%;
            background-color: #ccc;
            cursor: pointer;
        `;
        if (i === 0) dot.style.backgroundColor = '#007bff';
        dot.addEventListener('click', () => scrollToPage(i));
        dotsContainer.appendChild(dot);
    }

    function scrollToPage(pageIndex) {
        const cardsPerPage = 3;
        const offset = pageIndex * cardsPerPage;
        const cards = document.querySelectorAll('.news-card');
        if (cards[offset]) {
            cards[offset].scrollIntoView({ behavior: 'smooth' });
        }
        
        document.querySelectorAll('.dot').forEach((dot, index) => {
            dot.style.backgroundColor = index === pageIndex ? '#007bff' : '#ccc';
        });
    }
});
</script>

<style>
    .news-carousel {
        overflow-x: hidden;
    }

    .news-track {
        display: flex;
        transition: transform 0.5s ease;
    }

    .news-card {
        flex: 0 0 auto;
    }

    .dot:hover {
        background-color: #007bff !important;
    }
</style>