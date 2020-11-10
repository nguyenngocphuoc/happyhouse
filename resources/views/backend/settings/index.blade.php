@extends('backend.layout.master')

@section('title', 'Settings')

@push('styles')

@endpush

@section('content')

<section class="content-header">
    <h1>
        Settings
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Tables</a></li>
        <li class="active">Data tables</li>
    </ol>
</section>

<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs" id="myTab">
                    <li class="active"><a href="#tab_1" data-toggle="tab">Thiết lập chung</a></li>
                    <li><a href="#tab_2" data-toggle="tab">Liên kết</a></li>
                    <li><a href="#tab_3" data-toggle="tab">Giới thiệu</a></li>
                    <li><a href="#tab_4" data-toggle="tab">Quy trình hợp đồng</a></li>
                    <li><a href="#tab_5" data-toggle="tab">Địa chỉ</a></li>
                    <li><a href="#tab_6" data-toggle="tab">Footer</a></li>
                    <li><a href="#tab_7" data-toggle="tab">Banner</a></li>
                    <li><a href="#tab_8" data-toggle="tab">UploadFile</a></li>
                </ul>
                <form action="{{ route('admin.settings.store') }}" method="post" class="form-horizontal"
                    enctype="multipart/form-data" role="form">
                    @csrf
                    <input type="hidden" name="tab" id="tab" value="{{old('tab') ? old('tab'): 'tab_1'}}">
                    <div class="tab-content">
                        <div class="tab-pane active" id="tab_1">
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="sitename" class="col-sm-2 control-label">Tên Trang Web:</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="site_name" class="form-control" id="sitename"
                                            value="{{ @$setting->site_name }}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="metadescription" class="col-sm-2 control-label">Mô Tả Trang Web:</label>
                                    <div class="col-sm-10">
                                        <textarea type="text" name="meta_description" class="form-control"
                                            id="metadescription">{{ @$setting->meta_description }}</textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="sitelogo" class="col-sm-2 control-label">Logo Trang Web:</label>
                                    <div class="col-sm-10 col-md-6">
                                        <input type="file" name="site_logo" class="form-control" id="sitelogo"
                                            value="{{ @$setting->site_logo }}"
                                            accept="image/gif, image/jpeg, image/png">
                                    </div>
                                    <div class="col-sm-10 col-md-4">
                                        @if(@$setting->site_logo)
                                        <div class="bgimage"
                                            style="background-image:url({{ asset('images/'.@$setting->site_logo) }})">
                                        </div>
                                        @else
                                        <div class="bgimage"
                                            style="background-image:url({{ asset('images/logo.png') }}"></div>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="sitefavicon" class="col-sm-2 control-label">Favicon Trang web:</label>
                                    <div class="col-sm-10 col-md-6">
                                        <input type="file" name="site_favicon" class="form-control" id="sitefavicon"
                                            accept="image/gif, image/jpeg, image/png">
                                    </div>
                                    <div class="col-sm-10 col-md-4">
                                        @if(@$setting->site_favicon)
                                        <img src="{{ asset('images/'.@$setting->site_favicon) }}" alt="Site Favicon"
                                            class="img-responsive" width="36">
                                        @else
                                        <img src="{{ asset('images/favicon.ico') }}" alt="Site Logo"
                                            class="img-responsive" width="36">
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="siteemail" class="col-sm-2 control-label">Email:</label>
                                    <div class="col-sm-10">
                                        <input type="email" name="email" class="form-control" id="siteemail"
                                            value="{{ @$setting->email }}">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="sitephone" class="col-sm-2 control-label">Số Điện Thoại:</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="phone" class="form-control" id="sitephone"
                                            value="{{ @$setting->phone }}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="messenger" class="col-sm-2 control-label">Messenger facebook
                                        (code):</label>
                                    <div class="col-sm-10">
                                        <textarea type="text" name="messenger" class="form-control"
                                            id="messenger">{{ @$setting->messenger }}</textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="feeds_embed" class="col-sm-2 control-label">Feeds embed facebook
                                        (code):</label>
                                    <div class="col-sm-10">
                                        <textarea type="text" name="feeds_embed" class="form-control"
                                            id="feeds_embed">{{ @$setting->feeds_embed }}</textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="map_api_key" class="col-sm-2 control-label">Map api key:</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="map_api_key" class="form-control" id="map_api_key"
                                            value="{{ @$setting->map_api_key }}">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane" id="tab_2">
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="sfacebook" class="col-sm-2 control-label">Facebook:</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="facebook" class="form-control" id="sfacebook"
                                            value="{{ @$setting->facebook }}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="stwitter" class="col-sm-2 control-label">Twitter:</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="twitter" class="form-control" id="stwitter"
                                            value="{{ @$setting->twitter }}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="sdribbble" class="col-sm-2 control-label">Dribbble:</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="dribbble" class="form-control" id="sdribbble"
                                            value="{{ @$setting->dribbble }}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="sbehance" class="col-sm-2 control-label">Behance:</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="behance" class="form-control" id="sbehance"
                                            value="{{ @$setting->behance }}">
                                    </div>
                                </div>
                                <small class="pull-right"><em>Nếu bạn không muốn hiển thị phương tiện truyền thông xã
                                        hội, chỉ cần để trống trường nhập.</em></small>
                            </div>
                        </div>

                        <div class="tab-pane" id="tab_3">
                            <div class="box-body">
                                <div class="aboutus">
                                    <label>Hồ sơ công ty</label>
                                    <textarea class="textarea" id="editor1" name="about_us"
                                        paceholder="Place some text here"
                                        style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{ @$setting->about_us }}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="tab_4">
                            <div class="box-body">
                                <div class="contract_flow">
                                    <label>Quy trình hợp đồng</label>
                                    <textarea class="textarea" id="editor2" name="contract_flow"
                                        paceholder="Place some text here"
                                        style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{ @$setting->contract_flow }}</textarea>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane" id="tab_5">
                            <div class="box-body">
                                <div class="address">
                                    <label>Địa chỉ</label>
                                    <textarea class="textarea" name="address" value="Place some text here"
                                        style="width: 100%; height: 150px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{ @$setting->address }}</textarea>
                                </div>
                            </div>
                            <div class="box-body">
                                <div class="coords">
                                    <label for="coords">Tọa độ (nhập vĩ độ và kinh độ cách nhau bởi dấu ",") hoặc trỏ
                                        vào
                                        bản đồ</label>
                                    <div id="map" style="width: 100%;height:300px">
                                    </div>
                                    <br>
                                    <input class="form-control" type="text" name="coords" id="coords"
                                        placeholder="Nhập địa chỉ vào đây" value="{{ $setting->coords }}">
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane" id="tab_6">
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="footer_left" class="col-sm-2 control-label">footer_left:</label>
                                    <div class="col-sm-10">
                                        <textarea type="text" id="editor4" name="footer_left" class="form-control"
                                            id="footer_left">{{ @$setting->footer_left }}</textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="footer_right" class="col-sm-2 control-label">footer_right:</label>
                                    <div class="col-sm-10">
                                        <textarea type="text" id="editor5" name="footer_right" class="form-control"
                                            id="footer_right">{{ @$setting->footer_right }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="tab_7">
                            <div class="box-body">
                                <div class="form-group row">
                                    <label for="video" class="col-sm-2 control-label">Video giới thiệu :</label>
                                    <div class="col-sm-6">
                                        <input type="file" name="video" class="form-control img-responsive" id="video"
                                            value="{{ $setting->video }}">
                                    </div>
                                    <div class="col-sm-4">
                                        <video src="{{ url('video/'. $setting->video) }}" alt="Site Logo"
                                            class="img-responsive" width="300" autoplay controls>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="banner_image" class="col-sm-2 control-label">Banner giới thiệu :</label>
                                    <div class="col-sm-6">
                                        <input type="file" name="banner_image" class="form-control img-responsive"
                                            id="banner_image" value="{{ $setting->banner_image }}">
                                    </div>
                                    <div class="col-sm-4">
                                        <img src="{{ url('images/'. @$setting->banner_image) }}" alt="Site banner"
                                            class="img-responsive" width="300">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="tab_8">
                            <div class="box-body">
                                <script>
                                    function resizeIframe(obj) {
                                        obj.style.height = obj.contentWindow.document.documentElement.scrollHeight + 'px';
                                    }
                                </script>
                                <iframe src="{{route('admin.download_file.index')}}" frameborder="0"
                                    onload="resizeIframe(this)" style="width: 100%; min-height:500px"></iframe>
                            </div>
                        </div>
                    </div>


                    <div class=" box-footer">
                        <button type="submit" name="genarel" class="btn btn-info btn-flat">Thay đổi</button>
                    </div>

            </div>
            </form>
        </div>

    </div>
</section>

@endsection

@push('scripts')
<script>
    $(function () {
		CKEDITOR.replace( 'editor1' );
        CKEDITOR.replace( 'editor2' );
        CKEDITOR.replace( 'editor3' );
        CKEDITOR.replace( 'editor4' );
        CKEDITOR.replace( 'editor5' );
    });
    $('#myTab a').click(function(e) {
    e.preventDefault();
        $(this).tab('show');
    });
    
    // store the currently selected tab in the hash value
    $("ul.nav-tabs > li > a").on("shown.bs.tab", function(e) {
        var id = $(e.target).attr("href").substr(1);
        $("#tab").val(id);
        window.location.hash = id;
    });
    
    // on load of the page: switch to the currently selected tab
    var hash = window.location.hash;
    $('#myTab a[href="' + hash + '"]').tab('show');

</script>
@endpush