@extends('view.masterPage')
@section('content')
<section class="breadcrumb-area bg-img bg-overlay"
    style="background-image: url('{{url('images/'.$groupCategory->image)}}')">
    <div class=" container h-100">
        <div class="row h-100 align-items-center">
            <div class="col-12">
                <div class="breadcrumb-content">
                    <h2>{{$groupCategory->name}}</h2>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ##### Breadcrumb Area End ##### -->

<!-- ##### Breadcrumb Area Start ##### -->
<div class="mag-breadcrumb py-5">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/"><i class="fa fa-home" aria-hidden="true"></i> Trang
                                chủ</a>
                        </li>
                        {{-- <li class="breadcrumb-item"><a href="#">Feature</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Archive by Category “TRAVEL”</li> --}}
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<!-- ##### Breadcrumb Area End ##### -->

<!-- ##### Archive Post Area Start ##### -->
<div class="archive-post-area">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-xl-8">
                <div class="archive-posts-area bg-white p-30 mb-30 box-shadow">
                    <!-- Single Catagory Post -->
                    @foreach($arr as $value)
                    <div class="breadcrumb-content">
                        <h4 style="text-align: center; padding-bottom: 15px; color: #158351"><b
                                style="text-transform: uppercase;">{{$value['categoryInfo']->name}}</b>
                        </h4>
                    </div>
                    @if(count($value['list'])<=0)
                    <p>chưa có bài viết nào<p>
                    @else
                    @foreach($value['list'] as $rework)
                    <div class="single-catagory-post d-flex flex-wrap">
                        <div class="post-thumbnail bg-img"
                            style="background-image: url('{{url('images/'.$rework->image)}}')">
                            <a href="{{url('rework/'.$rework->slug)}}"><i class="fa fa-play"></i></a>
                        </div>

                        <div class="post-content">
                            <a href="{{url('rework/'.$rework->slug)}}" class="post-title">{{$rework->title}}</a>
                            <div class="post-meta-2">
                                <a href="#"><i class="fa fa-eye" aria-hidden="true"></i> 1034</a>
                                <a href="#"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> 834</a>
                                <a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i> 234</a>
                            </div>
                            <p class="one-line-title">{{str_limit(strip_tags($rework->details) ,200) }}</p>
                        </div>
                    </div>
                    @endforeach
                    @endif
                    @endforeach

                    <!-- Pagination -->
                    {!! $listCategory->links() !!}
                    {{-- <nav>
                        <ul class="pagination">
                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#"><i class="ti-angle-right"></i></a></li>
                        </ul>
                    </nav> --}}

                </div>
            </div>

            @include('view.rightcategorycolumn')
        </div>
    </div>
</div>
@endsection
