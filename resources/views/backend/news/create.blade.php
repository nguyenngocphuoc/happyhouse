@extends('backend.layout.master')

@section('title', 'Create News')

@push('styles')
<link rel="stylesheet" href="{{ asset('backend/plugins/iCheck/square/blue.css') }}">
<link rel="stylesheet" href="{{ asset('backend/components/select2/dist/css/select2.min.css') }}">
@endpush

@section('content')
<script>
    croppieRatio = 8/7;
</script>
<section class="content-header">
    <h1>
        THÊM MỚI
        <small><a href="{{ route('admin.news.index') }}" class="btn btn-block btn-xs btn-warning btn-flat">Quay
                lại</a></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#" style="margin-right: 30px; font-size: 15px;"><i class="fa fa-dashboard"></i> Trang Chủ</a></li>
    </ol>
</section>

<section class="content">
    <div class="row">
        <form action="{{ route('admin.news.store') }}" method="POST" enctype="multipart/form-data" role="form">
            @csrf
            <div class="col-md-6">
                <div class="box box-primary">
                    <div class="box-body">
                        <div class="form-group @if($errors->has('slug'))has-error @endif">
                            <label for="newsslug">Slug</label>
                            <!-- 
                                @php
                                $slug = old('slug') ? old('slug') : Illuminate\Support\Str::uuid()
                                @endphp
                            -->
                            <input value="{{ $slug}}" type="text" name="slug" class="form-control" id="newsslug">
                            <span class="help-block">{{ $errors->first('slug') }}</span>
                        </div>
                        <div class="form-group @if($errors->has('title'))has-error @endif">
                            <label for="newstitle">Tiêu đề</label>
                            <input value="{{ old('title')}}" type="text" name="title" class="form-control"
                                id="newstitle">
                            <span class="help-block">{{ $errors->first('title') }}</span>
                        </div>
                        <div class="form-group @if($errors->has('address'))has-error @endif">
                            <label for="newsaddress">Địa chỉ</label>
                            <input value="{{ old('address')}}" type="text" name="address" class="form-control"
                                id="newsaddress">
                            <span class="help-block">{{ $errors->first('address') }}</span>
                        </div>
                        <div class="form-group @if($errors->has('category_id'))has-error @endif">
                            <label>Thể loại</label>
                            <select name="category_id" class="form-control select2" style="width: 100%;">
                                @foreach($categories as $category)
                                <option value="{{ $category->id }}" @if($category->id == old('category_id'))
                                    {{'selected'}}
                                    @endif)>
                                    {{ $category->name }}
                                </option>
                                @endforeach
                            </select>
                            <span class="help-block">{{ $errors->first('category_id') }}</span>
                        </div>
                        <div class="form-group @if($errors->has('district_id'))has-error @endif">
                            <label>Tỉnh (thành phố)</label>
                            <select name="district_id" class="form-control select2" style="width: 100%;">
                                @foreach($districts as $district)
                                <option value="{{ $district->id }}" @if($district->id == old('district_id'))
                                    {{'selected'}}
                                    @endif)>
                                    {{ $district->name }}
                                </option>
                                @endforeach
                            </select>
                            <span class="help-block">{{ $errors->first('district_id') }}</span>
                        </div>
                        <div class="form-group @if($errors->has('statuses_id'))has-error @endif">
                            <label>Trạng thái</label>
                            <select name="statuses_id" class="form-control select2" style="width: 100%;">
                                @foreach($statuses as $status)
                                <option value="{{ $status->id }}" @if($status->id == old('statuses_id'))
                                    {{'selected'}}
                                    @endif)>
                                    {{ $status->name }}
                                </option>
                                @endforeach
                            </select>
                            <span class="help-block">{{ $errors->first('statuses_id') }}</span>
                        </div>
                        <div class="form-group @if($errors->has('details'))has-error @endif">
                            <label>Nội dung chi tiết</label>
                            <textarea id="editor1" name="details" placeholder="Nhập nội dung tại đây..."
                                style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{old('details')}}</textarea>
                            <span class="help-block">{{ $errors->first('details') }}</span>
                        </div>
                        <div class="form-group @if($errors->has('bus_station_distance'))has-error @endif">
                            <label for="bus_station_distance">Khoảng cách đến trạm tàu gần nhất(km)</label>
                            <input value="{{ old('bus_station_distance')}}" type="number" name="bus_station_distance"
                                class="form-control" id="bus_station_distance">
                            <span class="help-block">{{ $errors->first('bus_station_distance') }}</span>
                        </div>
                        <div class="checkbox">
                            <label for="is_foreign_nationality_consultation"><input value="on" type="checkbox"
                                    name="is_foreign_nationality_consultation" class="form-control"
                                    id="is_foreign_nationality_consultation"
                                    {{ old('is_foreign_nationality_consultation') == 'on' ? 'checked' : '' }}> Có thể
                                tham vấn quốc tịch nước
                                ngoài
                            </label>
                        </div>
                        <div class="checkbox">
                            <label for="is_newly_built_properties">
                                <input value="on" type="checkbox" name="is_newly_built_properties" class="form-control"
                                    id="is_newly_built_properties"
                                    {{ old('is_newly_built_properties') == 'on' ? 'checked' : '' }}> Nhà mới xây
                            </label>
                        </div>
                        <div class="form-group @if($errors->has('receiving_time'))has-error @endif">
                            <label for="receiving_time">Thời điểm sớm nhất có thể nhận nhà</label>
                            <!-- 
                                @php
                                $receiving_time = old('receiving_time') ? old('receiving_time') : date('Y-m-d')
                                @endphp
                            -->
                            <input value="{{ $receiving_time}}" type="date" name="receiving_time" class="form-control"
                                id="receiving_time">
                            <span class="help-block">{{ $errors->first('receiving_time') }}</span>
                        </div>
                        <div class="form-group @if($errors->has('free_first_months'))has-error @endif">
                            <label for="free_first_months">Miễn phí X tháng đầu</label>
                            <input value="{{ old('free_first_months')}}" type="number" name="free_first_months"
                                class="form-control" id="free_first_months">
                            <span class="help-block">{{ $errors->first('free_first_months') }}</span>
                        </div>
                        <div class="form-group @if($errors->has('price'))has-error @endif">
                            <label for="price">Giá</label>
                            <input value="{{ old('price')}}" type="number" name="price" class="form-control" id="price">
                            <span class="help-block">{{ $errors->first('price') }}</span>
                        </div>
                        <div class="form-group @if($errors->has('acreage'))has-error @endif">
                            <label for="acreage">Diện tích</label>
                            <input value="{{ old('acreage')}}" type="number" name="acreage" class="form-control"
                                id="acreage">
                            <span class="help-block">{{ $errors->first('acreage') }}</span>
                        </div>
                        <div class="form-group @if($errors->has('floor_amount'))has-error @endif">
                            <label for="floor_amount">Số tầng</label>
                            <input value="{{ old('floor_amount')}}" type="number" name="floor_amount"
                                class="form-control" id="floor_amount">
                            <span class="help-block">{{ $errors->first('floor_amount') }}</span>
                        </div>
                        <div class="form-group @if($errors->has('room_amount'))has-error @endif">
                            <label for="room_amount">Số phòng</label>
                            <input value="{{ old('room_amount')}}" type="number" name="room_amount" class="form-control"
                                id="room_amount">
                            <span class="help-block">{{ $errors->first('room_amount') }}</span>
                        </div>
                        <div class="form-group @if($errors->has('bathroom_amount'))has-error @endif">
                            <label for="bathroom_amount">Số phòng tắm</label>
                            <input value="{{ old('bathroom_amount')}}" type="number" name="bathroom_amount"
                                class="form-control" id="bathroom_amount">
                            <span class="help-block">{{ $errors->first('bathroom_amount') }}</span>
                        </div>
                        <div class="form-group @if($errors->has('bed_amount'))has-error @endif">
                            <label for="bed_amount">Số phòng ngủ</label>
                            <input value="{{ old('bed_amount')}}" type="number" name="bed_amount" class="form-control"
                                id="bed_amount">
                            <span class="help-block">{{ $errors->first('bed_amount') }}</span>
                        </div>
                        <div class="form-group @if($errors->has('host_name'))has-error @endif">
                            <label for="host_name">Tên chủ nhà</label>
                            <input value="{{ old('host_name')}}" type="text" name="host_name" class="form-control"
                                id="host_name">
                            <span class="help-block">{{ $errors->first('host_name') }}</span>
                        </div>
                        <div class="form-group @if($errors->has('phone_number'))has-error @endif">
                            <label for="phone_number">Số điện thoại chủ nhà (không public)</label>
                            <input value="{{ old('phone_number')}}" type="text" name="phone_number" class="form-control"
                                id="phone_number">
                            <span class="help-block">{{ $errors->first('phone_number') }}</span>
                        </div>
                        <div class="form-group @if($errors->has('note'))has-error @endif">
                            <label>Thông tin thêm (không bắt buộc)</label>
                            <textarea class="form-control" name="note"
                                placeholder="Nhập nội dung tại đây...">{{old('note')}}</textarea>
                            <span class="help-block">{{ $errors->first('note') }}</span>
                        </div>

                        <div class="form-group @if($errors->has('tags'))has-error @endif">
                            <label for="newstags">Tags cách nhau bằng dấu "," (không bắt buộc)</label>
                            <input value="{{ old('tags')}}" type="text" name="tags" class="form-control" id="newstags">
                            <span class="help-block">{{ $errors->first('tags') }}</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="box box-primary">
                    <div class="box-body">
                        <div class="form-group @if($errors->has('coords'))has-error @endif">
                            <label for="coords">Tọa độ (nhập vĩ độ và kinh độ cách nhau bởi dấu ",") hoặc trỏ vào
                                bản đồ</label>
                            <div id="map" style="width: 100%;height:300px">
                            </div>
                            <br>
                            <input value="{{ old('coords')}}" type="text" name="coords" class="form-control"
                                placeholder="13.1965807,108.2225727" id="coords">
                            <span class="help-block">{{ $errors->first('coords') }}</span>
                        </div>
                        <div class="form-group @if($errors->has('image'))has-error @endif">
                            <label for="newsimage">Hình ảnh bài viết</label>
                            <input type="file" hidden-id="{{$uniqid = uniqid()}}" id="newsimage">
                            <span class="help-block">{{ $errors->first('image') }}</span>
                            <input id="{{$uniqid}}" type="hidden" name="image" value="{{ old('image')}}">
                            <p class="help-block">(Hình ảnh được đăng dưới 2 loại .png hoặc .jpg)</p>
                            <img id="postimage" src="@if(old('image', null) != null) 
                            {{ old('image')}} 
                            @else {{url('img/no-image.jpg')}} 
                            @endif" height="200">
                        </div>
                        <hr>
                        <div class="form-group @if($errors->has('gallery'))has-error @endif">
                            <span class="help-block">{{ $errors->first('gallery') }}</span>
                            <form id="dzform" action="{{route('admin.gallery.store')}}" method="POST"
                                enctype="multipart/form-data">
                                <div class="fallback">
                                    <input id="news_id" name="news_id" type="hidden"
                                        value="{{\App\Setting::getRandomId()}}" />
                                    <div class="dropzone" id="myDropzone"></div>
                                </div>
                            </form>
                        </div>
                        <div class="form-group">
                            <script>
                                function resizeIframe(obj) {
                                    obj.style.height = obj.contentWindow.document.documentElement.scrollHeight + 'px';
                                }
                            </script>
                            <iframe src="{{route('admin.attribute.show', \App\Setting::getRandomId() )}}"
                                style="width: 100%;" frameborder="0" onload="resizeIframe(this)"></iframe>
                        </div>
                        <div class="checkbox">
                            <label>
                                <input {{ old('status') == 'on' ? 'checked' : '' }} value="on" type="checkbox"
                                    name="status"> Published
                            </label>
                        </div>
                    </div>
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary btn-flat">CREATE</button>
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
<script src="{{ asset('backend/components/select2/dist/js/select2.full.min.js') }}"></script>
<script>
    $(function () {

            $('.select2').select2();

            $('input').iCheck({
                checkboxClass: 'icheckbox_square-blue',
                radioClass: 'iradio_square-blue'
            });

            CKEDITOR.replace( 'editor1' );
        });
</script>
<script>
    var tmp = [];
    Dropzone.options.myDropzone= {
        url: "{{route('admin.gallery.store')}}",
        acceptedFiles: 'image/*',
        addRemoveLinks: true,
        dictDefaultMessage: "Kéo ảnh vào hoặc nhấp để chọn",
        init: function() {
            dzClosure = this; // Makes sure that 'this' is understood inside the functions below.
            //send all the form data along with the files:
            this.on("sending", function(data, xhr, formData) {
                formData.append("_token", "{{ csrf_token() }}");
                formData.append("news_id", jQuery("#news_id").val());
                formData.append("size", data.upload.total);
            });
            this.on("success", function(file, responseText) {
                toastr.info("upload succesfully");
                tmp.push({
                id:responseText,
                name: file.name,
                });
            });
            var mockFile = { name: "", size:  0};
            @foreach($galleries as $gallery)
            tmp.push({
                id:"{{$gallery->id}}",
                name:"{{$gallery->id}}",
                });
            mockFile = { name: "{{$gallery->id}}", size:  {{$gallery->size}}};
            this.emit("addedfile", mockFile);
            this.emit("thumbnail", mockFile, "{{url('images/'.$gallery->path)}}");
            this.emit("complete", mockFile);
            this.files.push(mockFile);
            @endforeach
        },
        removedfile: function(file) {
            var id = file.name;        
            tmp.forEach(element => {
                if(element.name == file.name){
                    id = element.id;
                }
            });
            $.ajax({
                type: 'DELETE',
                url: "{{ route('admin.gallery.destroy', '') }}/" + id,
                data: {
                    "_token": "{{ csrf_token() }}"
                },
                success: function(data, textStatus, jqXHR) {
                    toastr.info(data);
                },
            });
            var _ref;
            return (_ref = file.previewElement) != null ? _ref.parentNode.removeChild(file.previewElement) : void 0;        
        }
    }

    //Add listener
    google.maps.event.addListener(marker, "click", function (event) {

    }); //end addListener
</script>

@endpush