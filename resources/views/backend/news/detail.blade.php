@extends('backend.layout.master')

@section('title', 'news Submit')

@push('styles')
<link rel="stylesheet" href="{{ asset('backend/components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">

@endpush

@section('content')

<section class="content-header">
    <h1>
        Bài viết
        <small>Từ : {{$news->name}}</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{route('dashboard')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{route('admin.news.index')}}">Bài viết</a></li>
        <li class="active">Chi tiết</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">

    <!-- Default box -->
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">{{$news->title}}</h3>
        </div>
        <div class="box-body">
            <div class="row" style="font-size: large;">
                <div class="col-xs-3">
                    <p><b>Link Bài viết</b></p>
                </div>
                <div class="col-xs-9">
                    <p><a href="{{ route('page.article',$news->slug) }}">{{ route('page.article',$news->slug) }}</a></p>
                </div>
            </div>
            <div class="row" style="font-size: large;">
                <div class="col-xs-3">
                    <p><b>Tiêu đề</b></p>
                </div>
                <div class="col-xs-9">
                    <p>{{$news->title}}</p>
                </div>
            </div>
            <div class="row" style="font-size: large;">
                <div class="col-xs-3">
                    <p><b>Địa chỉ</b></p>
                </div>
                <div class="col-xs-9">
                    <p>{{$news->address}}</p>
                </div>
            </div>
            <div class="row" style="font-size: large;">
                <div class="col-xs-3">
                    <p><b>Tiêu đề</b></p>
                </div>
                <div class="col-xs-9">
                    <p>{{$news->category->name}}</p>
                </div>
            </div>
            <div class="row" style="font-size: large;">
                <div class="col-xs-3">
                    <p><b>Tỉnh (thành phố)</b></p>
                </div>
                <div class="col-xs-9">
                    <p>{{$news->district->name}}</p>
                </div>
            </div>
            <div class="row" style="font-size: large;">
                <div class="col-xs-3">
                    <p><b>Trạng thái</b></p>
                </div>
                <div class="col-xs-9">
                    <p>{{$news->statuses->name}}</p>
                </div>
            </div>
            <div class="row" style="font-size: large;">
                <div class="col-xs-3">
                    <p><b>Nội dung</b></p>
                </div>
                <div class="col-xs-9">
                    <p>{!!$news->details!!}</p>
                </div>
            </div>
            <div class="row" style="font-size: large;">
                <div class="col-xs-3">
                    <p><b>Giá</b></p>
                </div>
                <div class="col-xs-9">
                    <p>{{number_format($news->price)}} yên</p>
                </div>
            </div>
            <div class="row" style="font-size: large;">
                <div class="col-xs-3">
                    <p><b>Diện tích</b></p>
                </div>
                <div class="col-xs-9">
                    <p>{{$news->acreage}}</p>
                </div>
            </div>
            <div class="row" style="font-size: large;">
                <div class="col-xs-3">
                    <p><b>Số tầng</b></p>
                </div>
                <div class="col-xs-9">
                    <p>{{$news->floor_amount}}</p>
                </div>
            </div>
            <div class="row" style="font-size: large;">
                <div class="col-xs-3">
                    <p><b>Số phòng</b></p>
                </div>
                <div class="col-xs-9">
                    <p>{{$news->room_amount}}</p>
                </div>
            </div>
            <div class="row" style="font-size: large;">
                <div class="col-xs-3">
                    <p><b>Số phòng tắm</b></p>
                </div>
                <div class="col-xs-9">
                    <p>{{$news->bathroom_amount}}</p>
                </div>
            </div>
            <div class="row" style="font-size: large;">
                <div class="col-xs-3">
                    <p><b>Số phòng ngủ</b></p>
                </div>
                <div class="col-xs-9">
                    <p>{{$news->bed_amount}}</p>
                </div>
            </div>
            <div class="row" style="font-size: large;">
                <div class="col-xs-3">
                    <p><b>Tên chủ nhà</b></p>
                </div>
                <div class="col-xs-9">
                    <p>{{$news->host_name}}</p>
                </div>
            </div>
            <div class="row" style="font-size: large;">
                <div class="col-xs-3">
                    <p><b>Số điện thoại</b></p>
                </div>
                <div class="col-xs-9">
                    <p>{{$news->phone_number}}</p>
                </div>
            </div>
            <div class="row" style="font-size: large;">
                <div class="col-xs-3">
                    <p><b>Thông tin thêm</b></p>
                </div>
                <div class="col-xs-9">
                    <p>{{$news->note}}</p>
                </div>
            </div>
            <div class="row" style="font-size: large;">
                <div class="col-xs-3">
                    <p><b>Toạ độ</b></p>
                </div>
                <div class="col-xs-9">
                    <p>{{$news->coords}}</p>
                    <iframe style="width:100%; height: 300px;" frameborder="0" style="border:0"
                        src="https://www.google.com/maps?key=AIzaSyCaSX5Unj1CfP5GrRbTcCZyMel7VYS8aSY&q=Space+Needle,Seattle+WA&q={{$news->coords}}&hl=ja&z=14&amp;output=embed"
                        allowfullscreen>
                    </iframe>
                </div>
            </div>
            <div class="row" style="font-size: large;">
                <div class="col-xs-3">
                    <p><b>tags</b></p>
                </div>
                <div class="col-xs-9">
                    <p>{{$news->tags}}</p>
                </div>
            </div>
            <div class="row" style="font-size: large;">
                <div class="col-xs-3">
                    <p><b>Hình ảnh</b></p>
                </div>
                <div class="col-xs-9">
                    <div class="row">
                        <div class="col-xs-3">
                            <img src="{{url('images/'.$news->image)}}" alt=""
                                style="width: 100%;height:auto;margin:10px">
                        </div>
                        @foreach ($news->gallerylist as $gallery)
                        <div class="col-xs-3">
                            <img src="{{ url('images/'.$gallery->path) }}" alt=""
                                style="width: 100%;height:auto;margin:10px">
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            @foreach ($news->attributelist as $attribute)
            <div class="row" style="font-size: large;">
                <div class="col-xs-3">
                    <p><b>{{$attribute->name}}</b></p>
                </div>
                <div class="col-xs-9">
                    <p>{{$attribute->value}}</p>
                </div>
            </div>
            @endforeach
            <div class="row" style="font-size: large;">
                <div class="col-xs-3">
                    <p><b>tình trạng</b></p>
                </div>
                <div class="col-xs-9">
                    <p>{{ $news->status ? 'Công khai' : 'Không công khai' }}</p>
                </div>
            </div>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
        </div>

    </div>
    <!-- /.box -->

</section>
<!-- /.content -->


@endsection

@push('scripts')
<script src="{{ asset('backend/components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('backend/components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
<script>
    $(function() {
        
       
    })

</script>
@endpush