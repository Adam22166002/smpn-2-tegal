<div class="news-event-area">
    <div class="container">
        <div class="row">
            <div class="news-box">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <div>
                        <h2><span class="text-primary">Berita</span> Terbaru</h2>
                        <p class="mb-0">Kabar Terbaru Mengenai Sekolah Kami</p>
                    </div>
                    <div>
                        <a href="{{ route('berita') }}" class="text-primary">Lihat Selengkapnya --></a>
                    </div>
                </div>
                    <div class="news-carousel shadow:none">
                        <div class="news-track">
                            @foreach ($berita as $beritas)
                            <div class="card news-card position-relative">
                                <div class="news-img-holder">
                                    <a href="{{ route('detail.berita', $beritas->slug) }}">
                                        <img src="{{ asset('storage/images/berita/' . $beritas->thumbnail) }}"
                                            class="img-responsive"
                                            alt="news"
                                            style="max-height: 100%; max-width: 100%;">
                                    </a>
                                </div>
                                <div class="news-content-holder" style="padding: 10px;">
                                    <h3><a href="{{route('detail.berita', $beritas->slug)}}">{{$beritas->title}}</a></h3>
                                    <p><small>{{ \Str::limit($beritas->content, 150) }}</small></p>
                                    <ul class="event-info-block">
                                        <li><i class="fa fa-calendar" aria-hidden="true"></i> {{ Carbon\Carbon::parse($beritas->created_at)->format('d F Y') }}</li>
                                        <li><a href="{{ route('detail.berita', $beritas->slug) }}">Detail Selengkapnya</a></li>
                                    </ul>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
            </div>
            {{-- Event --}}
            <div class="col-xs-12 event-inner-area">
                <div class="d-flex justify-content-between align-items-center mb-4" style="display: flex; justify-content:space-between; align-items:center;">
                    <div>
                        <h2 class=""><span class="text-primary">Events</span> Terbaru</h2>
                        <p class="mb-0">Event-event Terbaru Mengenai SMPN Tegal</p>
                    </div>
                    <div>
                        <a href="{{ route('event') }}" class="text-primary">Lihat Semua Event <i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
                <div style="display: flex; justify-content: center; overflow-x: auto; max-width: 1200px; margin: 0 auto;">
                    <ul class="event-wrapper" style="display: flex; list-style-type: none; padding: 0; gap: 50px;">
                        @foreach ($event as $events)
                        <div class="event-terbaru col-lg-6 col-md-6 col-sm-12">
                            <div class="single-item">
                                <div class="item-img">
                                    <a href="{{route('detail.event',$events->slug)}}">
                                        <img src="{{asset('storage/images/event/' .$events->thumbnail)}}" alt="event" class="img-responsive">
                                    </a>
                                </div>
                                <div class="item-content">
                                    <h3 class="sidebar-title">
                                        <a href="{{route('detail.event',$events->slug)}}">{{$events->title}}</a>
                                    </h3> <span class="font-weight-semibold">{{ $events->desc}}</span>
                                    <p><small>{{ $events->content }}</small></p>
                                    <ul class="event-info-block">
                                        <li><i class="fa fa-calendar" aria-hidden="true"></i> {{Carbon\Carbon::parse($events->acara)->format('d F, Y')}}</li>
                                        <li><i class="fa fa-map-marker" aria-hidden="true"></i> {{$events->lokasi}}</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                            @endforeach
                    </div>
                </div>
            </div>
             </div>
        </div>
    </div>
</div>
