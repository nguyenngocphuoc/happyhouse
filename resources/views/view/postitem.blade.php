
@foreach($newslist as $key => $topnews)
<div class="col-md-12">
    <div class="blog-entry ftco-animate d-md-flex fadeInUp ftco-animated">
        <a href="{{ url('news/'.$topnews->slug) }}" class="img img-2" style="background-image: url({{ asset('images/'.$topnews->image) }});"></a>
        <div class="text text-2 pl-md-4">
            <h3 class="mb-2"><a href="{{ url('news/'.$topnews->slug) }}">{{  $topnews->title }}</a></h3>
            <div class="meta-wrap">
                <p class="meta">
                    <span><i class="icon-calendar mr-2"></i>{{$topnews->created_at->diffForHumans()}}</span>
                    <span><a href="{{ url('news/'.$topnews->slug) }}"><i class="icon-folder-o mr-2"></i>{{$topnews->category->name}}</a></span>
                    <span><i class="fa fa-eye"></i> {{ $topnews->view_count }}</span>
                </p>
            </div>
            <p class="mb-4">{!! str_limit(strip_tags($topnews->details), 150) !!}</p>
            <p><a href="{{ url('news/'.$topnews->slug) }}" class="btn-custom">Read More <span class="ion-ios-arrow-forward"></span></a></p>
        </div>
    </div>
</div>
@endforeach