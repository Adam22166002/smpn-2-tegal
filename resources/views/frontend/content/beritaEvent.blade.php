<div class="news-event-area">
    <div class="container">
        <div class="row">
            <div class="news-box col-xs-12">
                <h2 class="title-default-left">Berita Terbaru</h2>
                <div class="container mt-5">
                    <div class="news-carousel">
                        <div class="news-track">
                            @foreach ($berita_test as $beritas)
                            <div class="card news-card position-relative">
                                <div class="news-img-holder">
                                    <a href="{{route('detail.berita', $beritas->slug)}}"><img src="{{asset('storage/images/berita/' .$beritas->thumbnail)}}" class="img-responsive" alt="news" style="max-height: 100px; max-weidth:100px"></a>
                                </div>

                                    <a href="{{route('berita')}}">Lihat Semua</a>

                                <div class="news-content-holder">
                                    <h3><a href="{{route('detail.berita', $beritas->slug)}}">{{$beritas->title}}</a></h3>
                                    <div class="post-date">{{Carbon\Carbon::parse($beritas->created_at)->format('d F Y')}}</div>
                                </div>
                            </div>
                            @endforeach

                        </div>
                        @endforeach
                    </div>
                </div>

            </div>

            {{-- Event --}}
            <div class="col-xs-12 event-inner-area">
                <h2 class="title-default-left">Events Terbaru</h2>
                <div style="display: flex; justify-content: center; gap: 20px; overflow-x: auto; max-width: 1200px; margin: 0 auto;">
                    <ul class="event-wrapper" style="display: flex; list-style-type: none; padding: 0; gap: 100px;">
                        @foreach ($event_test as $events)
                            <li class="wow bounceInUp" data-wow-duration="2s" data-wow-delay=".1s" style="flex: 0 0 300px; border: 1px solid #ddd; padding: 15px; box-shadow: 0 4px 6px rgba(0,0,0,0.1); border-radius: 8px;">
                                <div class="event-calender-wrapper">
                                    <div class="event-calender-holder">
                                        <h3>{{Carbon\Carbon::parse($events->acara)->format('d')}}</h3>
                                        <p>{{Carbon\Carbon::parse($events->acara)->format('M')}}</p>
                                        <span>{{Carbon\Carbon::parse($events->acara)->format('Y')}}</span>
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
