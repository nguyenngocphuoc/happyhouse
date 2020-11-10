@extends('backend.layout.master')

@section('title', 'Create map')

@push('styles')
<link rel="stylesheet" href="{{ asset('backend/plugins/iCheck/square/blue.css') }}">
@endpush

@section('content')
<script>
    croppieRatio = 16/7;
</script>
<section class="content-header">
    <h1>
        Tạo mới địa điểm bản đồ
        <small><a href="{{ route('admin.map.index') }}" class="btn btn-block btn-xs btn-warning btn-flat"><i
                    class="fa fa-plus"></i> Quay về</a></small>
    </h1>
</section>

<section class="content">
    <div class="row">

        <form action="{{ route('admin.map.store') }}" method="POST" enctype="multipart/form-data" role="form">
            @csrf

            <div class="col-md-6">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Tạo mới một địa điểm bản đồ</h3>
                    </div>

                    <div class="box-body">
                        <div class="form-group @if($errors->has('district_id'))has-error @endif">
                            <label for="mapname">Nhóm địa điểm bản đồ</label>
                            <select id="district_id" name="district_id"
                                class="form-control has-feedback{{ $errors->has('district_id') ? ' has-error' : '' }}">
                                @foreach($arrDistrict as $key => $district)
                                @if (old('district_id') == $district->id)
                                <option selected value="{{$district->id}}">
                                    {{$district->name . "(" . $district->romanji_name .")"}}
                                </option>
                                @endif
                                @if (old('district_id')!= $district->id)
                                <option value="{{$district->id}}">
                                    {{$district->name . "(" . $district->romanji_name .")"}}
                                </option>
                                @endif
                                @endforeach
                            </select>
                            <span class="help-block">{{ $errors->first('district_id') }}</span>
                        </div>
                        <div class="form-group @if($errors->has('shape'))has-error @endif">
                            <label for="mapname">Hình dạng</label>
                            <select id="shape" name="shape"
                                class="form-control has-feedback{{ $errors->has('shape') ? ' has-error' : '' }}">
                                @foreach($shapes as $key => $shape)
                                @if (old('shape') == $key)
                                <option selected value="{{$key}}">
                                    {{$shape}}
                                </option>
                                @endif
                                @if (old('shape')!= $key)
                                <option value="{{$key}}">
                                    {{$shape}}
                                </option>
                                @endif
                                @endforeach
                            </select>
                            <span class="help-block">{{ $errors->first('district_id') }}</span>
                        </div>
                        <div class="form-group @if($errors->has('coords'))has-error @endif">
                            <label for="mapname">Địa điểm bản đồ</label>
                            <input value="{{ old('coords')}}" type="text" name="coords" class="form-control"
                                id="mapname">
                            <span class="help-block">{{ $errors->first('coords') }}</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="box box-primary">
                    <div class="box-body">
                    </div>

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary btn-flat">CREATE</button>
                        <span class="help-block">bạn vào trang <a
                                href="https://www.image-map.net/">https://www.image-map.net/</a>
                            và nhập link {{url('img/jmap.png')}} để vẽ bản đồ tỉnh bạn muốn
                        </span>
                    </div>
                </div>
            </div>

        </form>

    </div>
</section>

@endsection

@push('scripts')
<!-- iCheck -->
<script src="{{ asset('backend/plugins/iCheck/icheck.min.js') }}"></script>
<script>
    $(function() {
        $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue'
            , radioClass: 'iradio_square-blue'
        });
    });

</script>
@endpush