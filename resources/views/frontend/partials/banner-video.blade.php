<section class="city-area">
    <div class="banner-container">
        <video autoplay="" muted="" loop="" id="banner-video">
            <source src="{{ url('video/'. App\Setting::getVideo()) }}" type="video/mp4">
        </video>

        <div class="banner-content">
            <h1>{{$title}}</h1>
            <p>{{$content}}</p>
        </div>
    </div>
</section>