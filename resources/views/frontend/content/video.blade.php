<div class="video-area overlay-video bg-common-style" style="background-image: url('{{asset('Assets/Frontend/img/banner/video.webp')}}');">
    @if ($video != NULL)
        <div class="container">
            <div class="video-content w-25">
            <a class="play-btn popup-youtube wow bounceInUp" style="margin-bottom: 2rem;" data-wow-duration="2s" data-wow-delay=".1s" href="{{$video->url}}"><i class="fa fa-play" aria-hidden="true"></i></a>
                <h2 class="video-title">Video {{$video->title}}</h2>
                <p class="video-sub-title"> {{$video->desc}} </p>
            </div>
        </div>
    @endif
</div>
