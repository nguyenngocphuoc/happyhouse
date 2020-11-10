@extends('frontend.master')
@section('style')
<link rel="stylesheet" href="{{url('css/detail-style.css')}}">
<style>
    table.recruit {
        margin: 10px auto;
        border-collapse: collapse;
        border: none;
        width: 100%;
        font-size: 12px;
        table-layout: fixed;
        font-family: Verdana, Meiryo, メイリオ, Osaka, 'MS P Gothic', sans-serif;
        max-width: 100%;
        background-color: transparent;
    }

    div.sticky {
        position: -webkit-sticky;
        position: sticky;
        top: 0;
        padding-top: 70px;
        padding-bottom: 100px;
    }

    .blog_details img {
        max-width: 100%;
    }

    #commentform input,
    #commentform textarea {
        border: 1px solid;
        border-style: groove;
    }

    .post_tag {
        min-height: 30px;
    }

    .owl-carousel {
        padding-top: 30px
    }

    .owl-carousel .owl-prev,
    .owl-carousel .owl-next {
        width: 38px;
        height: 38px;
        position: absolute;
        top: 50%;
        line-height: 40px;
        text-align: center;
        color: #ffffff;
        left: -0px;
        opacity: 0;
        visibility: hidden;
        margin-top: -19px;
        -webkit-transition-duration: 500ms;
        transition-duration: 500ms;
        background-color: #947054;
        font-size: 13px;
        box-shadow: 0 0 5px rgba(255, 255, 255, 0.15);
    }

    .owl-carousel .owl-prev:hover,
    .owl-carousel .owl-next:hover {
        background-color: #000000;
    }

    .owl-carousel .owl-next {
        left: auto;
        right: -0px;
    }

    .owl-carousel:hover .owl-prev,
    .owl-carousel:hover .owl-next {
        opacity: 1;
        visibility: visible;
    }

    .owl-carousel .owl-controls {
        text-align: center;
        width: 100%;
    }

    .owl-carousel .owl-controls .owl-dot {
        display: inline-block;
        width: 20px;
        height: 20px;
        font-size: 12px;
        color: #ffffff;
        text-align: center;
    }

    .owl-carousel .owl-controls .owl-dots {
        width: 100%;
        position: absolute;
        bottom: 0;
    }

    .owl-carousel .owl-controls .owl-dot.active span {
        background: none repeat scroll 0 0 #e2680a;
    }

    .owl-carousel .owl-controls .owl-dot span {
        background: none repeat scroll 0 0 gray;
        border-radius: 20px;
        /*display: block;*/
        height: 12px;
        margin: 5px 7px;
        opacity: 0.5;
        width: 12px;
    }

    .owl-item img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        cursor: pointer;
    }

    .post_tag {
        min-height: 60px;
    }

    .maxwidth {
        max-width: 100%;
    }

    .img-responsive,
    .thumbnail>img,
    .thumbnail a>img,
    .carousel-inner>.item>img,
    .carousel-inner>.item>a>img {
        display: block;
        max-width: 100%;
        height: auto;
    }

    .owl-thumb-item img {
        width: 40px;
        height: 40px;
        left: 0px;
        top: 0px;
        cursor: pointer;
    }

    .owl-thumbs {
        padding-top: 30px;
    }

    .owl-thumb-item {
        margin: 3px
    }

    .row {
        margin-right: 0px !important;
    }

    .row .col-md-9,
    .row .col-md-3 {
        padding-right: 0px !important;
    }
</style>
@endsection
@section('content')

@include('frontend.partials.banner', ['title' => App\Setting::getTitle(), 'content'=>
config('properties.text.slogan'),
'tab'=>$newssingle->title])

<!--  Blog Area -->
<section class="blog_area single-post-area p_120">
    <div class="container main">
        <div class="row mt-80">
            <div class="col-md-3 hidden-md-down">
                <div id="sidebar">
                    @foreach ($download_files as $download_file)
                    <p><a href="{{url("file/".$download_file->file)}}" download><img class="maxwidth"
                                src="{{url("file/".$download_file->image)}}" alt="{{$download_file->title}}"></a></p>
                    @endforeach
                    <form method="get" action="{{route('page.property')}}">
                        <h3>{{config('properties.text.district')}}</h3>
                        <div class="form-group">
                            <select name="district" class="app-select form-control" required>
                                <option data-display="{{config('properties.text.district')}}">
                                    {{config('properties.text.district')}}</option>
                                @foreach($districts as $district)
                                <option value="{{ $district->romanji_name }}" @if($district->romanji_name ==
                                    app('request')->input('district'))
                                    {{'selected'}}
                                    @endif)>
                                    {{ $district->name }}
                                </option>
                                @endforeach
                            </select>
                        </div>

                        <h3>{{config('properties.text.type')}}</h3>
                        <div class="form-group">
                            <select name="category" class="app-select form-control" required>
                                <option data-display="{{config('properties.text.type')}}">
                                    {{config('properties.text.type')}}
                                </option>
                                @foreach($categories as $category)
                                <option value="{{ $category->id }}" @if($category->id ==
                                    app('request')->input('category'))
                                    {{'selected'}}
                                    @endif)>
                                    {{ $category->name }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <h3>{{config('properties.text.price_range')}} ({{config('properties.text.yen')}})</h3>
                        <div class="form-group range-wrap">
                            <input type="text" id="range" value="" name="price" />
                        </div>

                        <h3>{{config('properties.text.area_range')}}</h3>
                        <div class="form-group range-wrap">
                            <input type="text" id="range2" value="" name="acreage" />
                        </div>
                        <br>
                        <div class="form-group">
                            <button class="btn btn-danger form-control"
                                type="submit">{{config('properties.text.search')}}</button>
                        </div>
                    </form>
                    <div class="sideWidget" id="text-5">
                        <div class="textwidget">
                            {!!App\Setting::getFeeds()!!}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div id="contents">
                    <div id="post-18249145"
                        class="post-18249145 post type-post status-publish format-standard hentry category-vacancy tag-tatemono03811001_001824_10-jpg">
                        <h1 class="entryPostTitle">
                            {{$newssingle->title}}
                        </h1>
                        <div class="entry-content post-content">
                            <div class="result-box">
                                <div class="row result-name panel-body">
                                    <div class="col-md-10">
                                    </div>
                                </div><!-- /.row -->
                                <div class="row result-spec">
                                    <div class="col-md-2">
                                        <img src="{{ url('images/'.$newssingle->image) }}" alt=""
                                            class="list-photo img-responsive">
                                    </div>
                                    <div class="col-md-10 table-responsive">
                                        <table border="0" cellspacing="0" class="table table-bordered list-spec">
                                            <tbody>
                                                <tr class="success">
                                                    <th class="koukokuritu" scope="col">
                                                        {{config('properties.text.status')}}</th>
                                                    <th class="tinryo" scope="col">{{config('properties.text.price')}}
                                                    </th>
                                                    <th class="syozaiti" scope="col">
                                                        {{config('properties.text.address')}}
                                                    </th>
                                                    <th class="kotu" scope="col">{{config('properties.text.category')}}
                                                    </th>
                                                    <th class="menseki" scope="col">
                                                        {{config('properties.text.district')}}</th>
                                                </tr>
                                                <tr>
                                                    <td class="koukokuritu">
                                                        {{$newssingle->statuses->name}} </td>
                                                    <td class="tinryo">
                                                        <span class="tinryo-kingaku">
                                                            {{number_format($newssingle->price)}}
                                                        </span>{{config('properties.text.yen')}}<br>
                                                    </td>
                                                    <td class="syozaiti">
                                                        {{$newssingle->address}}
                                                    </td>
                                                    <td class="kotu">{{$newssingle->category->name}}</td>
                                                    <td class="menseki">{{$newssingle->district->name}}
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div><!-- /.result-spec -->
                            </div><!-- /.result-box -->

                            <div>
                                <div>
                                    <div role="tabpanel" class="tab-pane active" id="details">
                                        <div class="row">
                                            <div class="col-md-7">
                                                <div id="owl-example" class="owl-carousel" data-slider-id="1">
                                                    @foreach ($newssingle->gallerylist as $gallery)
                                                    <div class=" feature-img">
                                                        <img class="img-fluid"
                                                            src="{{ url('images/'.$gallery->path) }}">
                                                    </div>
                                                    @endforeach
                                                </div>
                                                <div class="owl-thumbs" data-slider-id="1" style="display: none">
                                                    @foreach ($newssingle->gallerylist as $gallery)
                                                    <div class="owl-thumb-item thumbnail">
                                                        <img class="img-fluid"
                                                            src="{{ url('images/'.$gallery->path) }}">
                                                    </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                            <div class="col-md-5">
                                                <p>
                                                    <img src="{{ url('images/'.$newssingle->image) }}"
                                                        class="size-medium img-responsive hidden-md-down">
                                                </p>
                                                <p>
                                                    <br>
                                                    <button type="button"
                                                        onclick="window.location.href='{{route('page.contact')}}?news_id={{$newssingle->id}}'"
                                                        class="btn submit_btn btn-primary form-control">{{config('properties.text.make_an_appointment')}}</button>
                                                </p>

                                                <p>
                                                    <br>
                                                    <button type="button" style="margin-bottom: 15px;"
                                                        onclick="window.location.href='{{route('page.contact')}}'"
                                                        class="btn submit_btn btn-success form-control">{{config('properties.text.contract_now')}}</button>
                                                </p>
                                            </div>
                                        </div><!-- /.row -->
                                        <br>
                                        <h3>{{config('properties.text.asset_detail')}}</h3>
                                        <table class="table bukken-info">
                                            <tbody>
                                                <tr>
                                                    <th>{{config('properties.text.price')}}</th>
                                                    <td>{{number_format($newssingle->price) }} 円</td>
                                                    <th>{{config('properties.text.acreage')}}</th>
                                                    <td class="madori">{{$newssingle->acreage}} m²</td>
                                                </tr>
                                                <tr>
                                                    <th>{{config('properties.text.floors')}}</th>
                                                    <td>
                                                        {{$newssingle->floor_amount}} </td>
                                                    <th>{{config('properties.text.rooms')}}</th>
                                                    <td>{{$newssingle->room_amount}}</td>
                                                </tr>
                                                <tr>
                                                    <th>{{config('properties.text.bathrooms')}}</th>
                                                    <td>{{$newssingle->bathroom_amount}}</td>
                                                    <th>{{config('properties.text.bedrooms')}}</th>
                                                    <td>{{$newssingle->bed_amount}} </td>
                                                </tr>

                                                <tr>
                                                    <th>{{config('properties.text.host_name')}}</th>
                                                    <td colspan="3" class="koukokuryo">{{$newssingle->host_name}}</td>
                                                </tr>
                                                @foreach ($newssingle->attributelist as $attribute)
                                                <tr>
                                                    <th>{{$attribute->name}}</th>
                                                    <td>
                                                        {{$attribute->value}}
                                                    </td>
                                                </tr>
                                                @endforeach
                                                <tr>
                                                    <th>{{config('properties.text.tags_cloud')}}</th>
                                                    <td colspan="3">
                                                        @foreach(explode(',',$newssingle->tags) as $tag)
                                                        <span class="setsubi-label">
                                                            @if(!ctype_space($tag))
                                                            <a
                                                                href="{{route('page.property') . '?tags=' .urlencode( $tag)}}">#{{ $tag }}
                                                            </a>
                                                            @endif
                                                        </span>
                                                        @endforeach
                                                </tr>
                                                <tr>
                                                    <th>{{config('properties.text.created_at')}}</th>
                                                    <td>{{
                                                        $newssingle->created_at->format('Y').'年 '.
                                                        $newssingle->created_at->format('m').'月 '.
                                                        $newssingle->created_at->format('d').'日'}}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>{{config('properties.text.writer')}}</th>
                                                    <td>{{$newssingle->user->name}}</td>
                                                </tr>
                                            </tbody>
                                        </table>

                                        <h4>{{config('properties.text.map')}}</h4>
                                        <div class="map-embed">
                                            <iframe style="width:100%; height: 500%;" frameborder="0" style="border:0"
                                                src="https://www.google.com/maps?key=AIzaSyCaSX5Unj1CfP5GrRbTcCZyMel7VYS8aSY&q=Space+Needle,Seattle+WA&q={{$newssingle->coords}}&hl=ja&z=14&amp;output=embed"
                                                allowfullscreen>
                                            </iframe>
                                        </div>
                                    </div>
                                    <div role="tabpanel" class="tab-pane" id="preview">
                                        <h4>{{config('properties.text.description')}}</h4>
                                        <div role="form" class="wpcf7" id="wpcf7-f280-p18249145-o1" lang="en-US"
                                            dir="ltr">
                                            {!! $newssingle->details !!}
                                        </div>
                                        @if($newssingle->conmmentlist->count()>0)
                                        <div class="comments-area">
                                            <h4 class="mb-5 font-weight-bold">{{\count($newssingle->conmmentlist)}}
                                                {{config('properties.text.comments')}}</h4>
                                            @foreach($newssingle->conmmentlist as $comment)
                                            <div class="comment-list">
                                                <div class="single-comment justify-content-between d-flex">
                                                    <div class="user justify-content-between d-flex">
                                                        <div class="thumb">
                                                            <img src="https://www.shareicon.net/data/512x512/2017/01/06/868320_people_512x512.png"
                                                                width="64" height="64" alt="{{$comment->name}}">
                                                        </div>
                                                        <div class="desc">
                                                            <h5><a href="#">{{$comment->name}}</a></h5>
                                                            {{
                                                                $comment->created_at->format('Y').'年 '.
                                                                $comment->created_at->format('m').'月 '.
                                                                $comment->created_at->format('d').'日 '.
                                                                $comment->created_at->format('H:i:s')}}
                                                            <p class="date">{{$comment->created_at->diffForHumans()}}
                                                            </p>
                                                            <p class="comment">
                                                                {{$comment->content}}
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                        @endif
                                        <div class="comment-form">
                                            <h4>{{config('properties.text.leave_a_reply')}}</h4>
                                            <form action="{{route('comments.store')}}" method="POST" id="commentform">
                                                @csrf
                                                <input type="hidden" class="form-control" name="news_id" id="news_id"
                                                    value="{{$newssingle->id}}">
                                                <div class="form-group form-inline">
                                                    <div class="form-group col-lg-6 col-md-6 name">
                                                        <input type="text"
                                                            placeholder="{{config('properties.text.enter_your_name_here')}}*"
                                                            class="form-control" name="name" id="name" required>
                                                    </div>
                                                    <div class="form-group col-lg-6 col-md-6 email">
                                                        <input type="email"
                                                            placeholder="{{config('properties.text.enter_your_email_here')}}*"
                                                            class="form-control" name="email" id="email" required>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <input type="url"
                                                        placeholder="{{config('properties.text.enter_your_website_here')}}"
                                                        class="form-control" name="website" id="website">
                                                </div>
                                                <div class="form-group">
                                                    <textarea name="content" id="message" cols="30" rows="10"
                                                        placeholder="{{config('properties.text.enter_your_comment_here')}} *"
                                                        class="form-control mb-10" maxlength="191" required></textarea>
                                                </div>
                                                <input id="submitcmt" type="submit"
                                                    value="{{config('properties.text.post_comment')}}"
                                                    class="btn submit_btn py-3 px-4 btn-primary">
                                            </form>
                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div><!-- .entry-content -->

                    </div>


                </div><!-- /#contents -->
            </div>
        </div>
    </div>

</section>
<!--  Blog Area -->
@endsection
@php
$priceRange = explode(";", app('request')->input('price'));
$price_min = app('request')->has('price') && count($priceRange) >= 2 ? $priceRange[0] :
config('properties.priceRange.min');
$price_max = app('request')->has('price') && count($priceRange) >= 2 ? $priceRange[1] :
config('properties.priceRange.max');
$acreageRange = explode(";", app('request')->input('acreage'));
$acreage_min = app('request')->has('acreage') && count($acreageRange) >= 2 ? $acreageRange[0] :
config('properties.acreageRange.min');
$acreage_max = app('request')->has('acreage') && count($acreageRange) >= 2 ? $acreageRange[1] :
config('properties.acreageRange.max');
@endphp
@section('scripts')
<script>
    $(document).ready(function() {
        $(".owl-carousel").owlCarousel({
            items: 1,
            margin: 0,
            loop: true,
            smartSpeed: 1000,
            nav: true,
            thumbs: true,
            thumbImage: true,
            thumbsPrerendered: true,
            // Class that will be used on the thumbnail container
            thumbContainerClass: 'owl-thumbs',
            // Class that will be used on the thumbnail item's
            thumbItemClass: 'owl-thumb-item',
            navText: ['<', '>']
        });
        $(".feature-img").on('click', function () {
            openFullscreen();
        });
        function openFullscreen() {
            var elem = document.getElementById("owl-example");
            if (elem.requestFullscreen) {
                elem.requestFullscreen();
            } else if (elem.mozRequestFullScreen) { /* Firefox */
                elem.mozRequestFullScreen();
            } else if (elem.webkitRequestFullscreen) { /* Chrome, Safari & Opera */
                elem.webkitRequestFullscreen();
            } else if (elem.msRequestFullscreen) { /* IE/Edge */
                elem.msRequestFullscreen();
            }
        }
        function closeFullscreen() {
            if (document.exitFullscreen) {
                document.exitFullscreen();
            } else if (document.mozCancelFullScreen) { /* Firefox */
                document.mozCancelFullScreen();
            } else if (document.webkitExitFullscreen) { /* Chrome, Safari and Opera */
                document.webkitExitFullscreen();
            } else if (document.msExitFullscreen) { /* IE/Edge */
                document.msExitFullscreen();
            }
        }
    });
    $("#range").ionRangeSlider({
		hide_min_max: true,
		keyboard: true,
		min: {{config('properties.priceRange.min')}},
		max: {{config('properties.priceRange.max')}},
		from: {{$price_min}},
		to: {{$price_max}},
		type: 'double',
		step: 1,
		prefix: "円 ",
		grid: true
	});
	$("#range2").ionRangeSlider({
		hide_min_max: true,
		keyboard: true,
		min: {{config('properties.acreageRange.min')}},
		max: {{config('properties.acreageRange.max')}},
		from: {{$acreage_min}},
		to: {{$acreage_max}},
		type: 'double',
		step: 1,
		prefix: "",
		grid: true
	});
</script>
@endsection