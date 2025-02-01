<div class="news-event-area">
    <div class="container">
        <div class="row">
            <div class="news-box">
                <h2 class="title-default-left">Berita Terbaru</h2>
                <p>Kabar Terbaru Mengenai Sekolah Kami</p>
                <a href="{{route('berita')}}">Selengkapnya</a>
                    <div class="news-carousel">
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
                                <div class="news-content-holder">
                                    <h3><a href="{{route('detail.berita', $beritas->slug)}}">{{$beritas->title}}</a></h3>
                                    <div class="post-date">{{Carbon\Carbon::parse($beritas->created_at)->format('d F Y')}}</div>
                                    <a href="{{route('detail.berita', $beritas->slug)}}">Detail Selengkapnya --></a>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
            </div>
            {{-- Event --}}
            <div class="col-xs-12 event-inner-area">
                <h2 class="title-default-left">Events Terbaru</h2>
                <p>Event Terbaru Di Sekolah Kami</p>
                <div class="container">
                    <div class="row">
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
                                    </h3>
                                    <p> {{$events->desc}} </p>
                                    <p>{{ $events->content }}</p>
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
                <div class="event-btn-holder">
                    <a href="{{route('event')}}" class="view-all-primary-btn">View All</a>
                </div>
            </div>
        </div>
    </div>
</div>
