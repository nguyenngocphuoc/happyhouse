@extends('backend.layout.master')

@section('title', 'Info Submit')

@push('styles')
<link rel="stylesheet" href="{{ asset('backend/components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
<style>
    .star {
        visibility: hidden;
        font-size: 30px;
        cursor: pointer;
    }

    .star:before {
        content: "\2605";
        position: absolute;
        visibility: visible;
    }

    .star:checked:before {
        content: "\2606";
        position: absolute;
    }
</style>
@endpush

@section('content')

<section class="content-header">
    <h1>
        Liên Hệ
        <small>Từ : {{$info->name}}</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{route('dashboard')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{route('admin.info-submit.index')}}">Liên hệ</a></li>
        <li class="active">Chi tiết</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">

    <!-- Default box -->
    <div class="box">
        <form action="{{route('admin.info-submit.update', $info->id)}}" method="POST" enctype="multipart/form-data"
            role="form">
            @csrf
            @method('PUT')
            <div class="box-header with-border">
                <h3 class="box-title">{{isset($info->news) ? $info->news->title : $info->orders}}</h3>
            </div>
            <div class="box-body">
                <input type="hidden" name="name" value="{{$info->name}}">
                <input type="hidden" name="email" value="{{$info->email}}">
                <input type="hidden" name="message" value="{{$info->message}}">
                <input type="hidden" name="phone" value="{{$info->phone}}">
                <input type="hidden" id="orders" name="orders" value="{{$info->orders}}">
                <input type="hidden" name="order_code" value="{{$info->order_code}}">
                <input type="hidden" name="appoinment" value="{{$info->appoinment}}">
                <div class="row" style="font-size: large;">
                    <div class="col-xs-3">
                        <p><b>Mã đặt hàng</b></p>
                    </div>
                    <div class="col-xs-9">
                        <p>{{$info->order_code}}</p>
                    </div>
                </div>
                <div class="row" style="font-size: large;">
                    <div class="col-xs-3">
                        <p><b>Tên</b></p>
                    </div>
                    <div class="col-xs-9">
                        <p>{{$info->name}}</p>
                    </div>
                </div>
                <div class="row" style="font-size: large;">
                    <div class="col-xs-3">
                        <p><b>email</b></p>
                    </div>
                    <div class="col-xs-9">
                        <p>{{$info->email}}</p>
                    </div>
                </div>
                <div class="row" style="font-size: large;">
                    <div class="col-xs-3">
                        <p><b>Lời nhắn</b></p>
                    </div>
                    <div class="col-xs-9">
                        <p>{{$info->message}}</p>
                    </div>
                </div>
                <div class="row" style="font-size: large;">
                    <div class="col-xs-3">
                        <p><b>Tiêu đề</b></p>
                    </div>
                    <div class="col-xs-9">
                        <p>{{isset($info->news) ? $info->news->title : $info->orders}}</p>
                    </div>
                </div>
                <div class="row" style="font-size: large;">
                    <div class="col-xs-3">
                        <p><b>Ngày Hẹn</b></p>
                    </div>
                    <div class="col-xs-9">
                        <p>{{Carbon\Carbon::parse($info->appoinment)->format('H:i:s  d/m/Y ')}}({{Carbon\Carbon::parse($info->appoinment)->diffForHumans()}})
                        </p>
                    </div>
                </div>
                <div class="row" style="font-size: large;">
                    <div class="col-xs-3">
                        <p><b>Gắn dấu sao</b></p>
                    </div>
                    <div class="col-xs-9">
                        <input class="" type="checkbox" name="star" {{ $info->star ? 'checked' : '' }}>
                    </div>
                    <br>
                    <br>
                </div>
                <div class="row" style="font-size: large;">
                    <div class="col-xs-3">
                        <p><b>Tài sản yêu cầu</b></p>
                    </div>
                    <div class="col-xs-9">
                        @if (isset($info->news))
                        <p><a
                                href="{{ route('page.article',$info->news->slug) }}">{{ route('page.article',$info->news->slug) }}</a>
                        </p>
                        @endif
                        <div class="form-group">
                            <label>Chọn tài sản @if (isset($info->news))khác @endif</label>
                            <select class="form-control select2" style="width: 100%;" id="selectNews"
                                onchange="changeFunc()">
                                <option value="-1"></option>
                                @if (isset($info->news))
                                <option value="-2">Bỏ chọn</option>
                                @endif
                                @foreach($news as $new)
                                <!-- 
                                    @php
                                    $orders = $info->orders
                                    @endphp
                                -->
                                <option value="{{ $new->id }}" @if($new->id == $orders)
                                    {{'selected'}}
                                    @endif)>
                                    {{ $new->title }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>



            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <div class="row @if($errors->has('note'))has-error @endif" style="font-size: large;">
                    <div class="col-xs-3">
                        <p><b>Note</b></p>
                    </div>
                    <!-- 
                        @php
                        $note = old('note') ? old('note') : $info->note
                        @endphp
                    -->
                    <div class="col-xs-9">
                        <textarea id="editor1" name="note" placeholder="Nhập nội dung tại đây..."
                            style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{$note}}</textarea>
                        <span class="help-block">{{ $errors->first('note') }}</span>
                    </div>
                </div>
                <select class="form-control" name="stage">
                    @foreach (config('properties.stage') as $key => $stage)
                    <option value="{{ $key }}" @if($key==$info->stage)
                        {{'selected'}}
                        @endif>
                        {{ $stage }}
                    </option>
                    @endforeach
                </select>
                <br>
                <button class="btn btn-primary btn-flat" type="submit">Cập nhật trạng thái</button>
            </div>
            <!-- /.box-footer-->
        </form>
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
        
        CKEDITOR.replace( 'editor1' );
    })
    function changeFunc() {
        var selectBox = document.getElementById("selectNews");
        var selectedValue = selectBox.options[selectBox.selectedIndex].value;
        if(selectedValue == "-1"){
            $("#orders").val("{{$info->orders}}");
        }
        else if(selectedValue == "-2") $("#orders").val("Chưa chọn tài sản");
        else $("#orders").val(selectedValue);
        
    }
</script>
@endpush