<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{App\Setting::getTitle()}} - @yield('title')</title>
    <link rel="icon" href="{{ url(App\Setting::getIcon()) }}" type="image/png">
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="{{ asset('backend/components/bootstrap/dist/css/bootstrap.min.css') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('backend/components/font-awesome/css/font-awesome.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{ asset('backend/components/Ionicons/css/ionicons.min.css') }}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />

    @stack('styles')

    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('backend/dist/css/AdminLTE.min.css') }}">
    <!-- AdminLTE Skins. Choose a skin from the css/skins folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{ asset('backend/dist/css/skins/_all-skins.min.css') }}">
    <!-- Date Picker -->
    <link rel="stylesheet"
        href="{{ asset('backend/components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ asset('backend/components/bootstrap-daterangepicker/daterangepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('croppie/croppie.css') }}" />
    <!-- dropzone -->
    <link rel="stylesheet" href="{{ asset('dropzone-5.7.0/dist/dropzone.css') }}">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
            <![endif]-->

    <!-- calendar -->
    <link rel="stylesheet" href="{{ asset('backend/components/fullcalendar/dist/fullcalendar.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/components/fullcalendar/dist/fullcalendar.print.min.css') }}"
        media="print">
    <!-- Google Font -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <link rel="stylesheet" href="{{ asset('backend/style.css') }}">
</head>
<script>
    var croppieRatio = 3/2;
</script>

<body class="skin-blue sidebar-mini sidebar-collapse">
    <div class="wrapper">

        @include('backend.layout.partials.navbar')
        @include('backend.layout.partials.sidebar')


        <div class="content-wrapper">

            @yield('content')

        </div>

        @include('backend.layout.partials.footer')
        @include('backend.layout.partials.right-sidebar')

        <div class="control-sidebar-bg"></div>

    </div>

    <div id="uploadimageModal" class="modal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Upload & Crop Image</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-8 text-center">
                            <div id="image_demo" style="width:100%; margin-top:30px"></div>
                        </div>
                        <div class="col-md-4" style="padding-top:30px;">
                            <br />
                            <br />
                            <br />
                            <button class="btn btn-success crop_image" data-dismiss="modal">Crops</button>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery 3 -->
    <script src="{{ asset('backend/components/jquery/dist/jquery.min.js') }}"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{{ asset('backend/components/jquery-ui/jquery-ui.min.js') }}"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button);
    </script>
    <!-- Bootstrap 3.3.7 -->
    <script src="{{ asset('backend/components/bootstrap/dist/js/bootstrap.min.js') }}"></script>


    <!-- daterangepicker -->
    <script src="{{ asset('backend/components/moment/min/moment.min.js') }}"></script>
    <script src="{{ asset('backend/components/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
    <!-- datepicker -->
    <script src="{{ asset('backend/components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    <!-- Slimscroll -->
    <script src="{{ asset('backend/components/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
    <!-- FastClick -->
    <script src="{{ asset('backend/components/fastclick/lib/fastclick.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('backend/dist/js/adminlte.min.js') }}"></script>

    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset('backend/dist/js/demo.js') }}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <!-- croppie -->
    <script src="{{ asset('croppie/croppie.js') }}"></script>
    <!-- dropzone -->
    <script src="{{ asset('dropzone-5.7.0/dist/dropzone.js') }}"></script>
    <!-- calendar -->
    <script src="{{ asset('backend/components/moment/src/moment.js')}}"></script>
    <script src="{{ asset('backend/components/fullcalendar/dist/fullcalendar.min.js')}}"></script>
    <!-- google map -->
    <script defer src="https://maps.googleapis.com/maps/api/js?key={{App\Setting::getMapApiKey()}}&callback=initMap">
    </script>
    <script>
        // toastr.options.closeButton = true;
        @if(Session::has('message'))
            var type = "{{ Session::get('alert-type', 'success') }}"; 
            switch(type){ 
                case 'info' :
                    toastr.info("{{ Session::get('message') }}"); 
                    break; 
                case 'warning' :
                    toastr.warning("{{ Session::get('message') }}"); 
                    break; 
                case 'success' :
                    toastr.success("{{ Session::get('message') }}","SUCCESS",{progressBar:true}); 
                    break; 
                case 'error' :
                    toastr.error("{{ Session::get('message') }}","ERROR",{progressBar:true}); 
                    break; 
        } 
        @endif 
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                toastr.error('{{ $error }}','ERROR!',{ progressBar: true });
            @endforeach
        @endif
            var width = 200;
            var heigth = croppieRatio ? 200 / croppieRatio : 133;
            $(document).ready(function(){
                $image_crop = $('#image_demo').croppie({
                        enableExif: true,
                        viewport: {
                            width: width,
                            height: heigth,
                            type: 'square' //circle
                        },
                        boundary: {
                            width: 300,
                            height: 300
                        }
                    });
                $.each($.find("input[type='file']"), function(index, itemData) {
                    const hiddenid = $(itemData).attr('hidden-id');
                    if($(itemData).attr('name') || typeof hiddenid == typeof undefined){

                    }else {
                        $(itemData).on('change', function(){
                            var reader = new FileReader();
                            reader.onload = function (event) {
                            $image_crop.croppie('bind', {
                                url: event.target.result
                            }).then(function(){
                                console.log('jQuery bind complete');
                            });
                            }
                            reader.readAsDataURL(this.files[0]);
                            $('#uploadimageModal').modal('show');
                        });

                        $('.crop_image').click(function(event){
                            $image_crop.croppie('result', {
                            type: 'canvas',
                            size: { width: 720*(width/heigth), height: 720 }
                            }).then(function(response){
                                var input_id = $(itemData).attr("hidden-id");
                                $('#'+input_id).val(response);
                                $('#postimage').attr('src', response);
                                $(itemData).val("");
                            })
                        });
                    }

                });
 
            }); 
            // khi data đã được nhập thì bạn phải confirm để thoát
            var isDataChange = false;
            $("form input, div.cke_contents ").on("change paste keyup", function() {
                if(!isDataChange){
                    window.onbeforeunload = function () {
                        var msg = "sure?";
                        return msg;
                    };
                    window.onsubmit = function () {
                        window.onbeforeunload = null;
                    };
                }
            });
            var delayInMilliseconds = 1000; //1 second

            setTimeout(function() {
                for (var i in CKEDITOR.instances) {
                    CKEDITOR.instances[i].on('change', function() {
                        if(!isDataChange){
                            window.onbeforeunload = function () {
                                var msg = "sure?";
                                return msg;
                            };
                            window.onsubmit = function () {
                                window.onbeforeunload = null;
                            };
                        }
                    });
                }
            }, delayInMilliseconds);

    </script>
    <script>
        function initMap() {
        const myLatlng = { lat: -25.363, lng: 131.044 };
        const map = new google.maps.Map(document.getElementById("map"), {
            zoom: 4,
            center: myLatlng,
        });
        // Create the initial InfoWindow.
        let infoWindow = new google.maps.InfoWindow({
            content: "Click the map to get Lat/Lng!",
            position: myLatlng,
        });
        infoWindow.open(map);
        // Configure the click listener.
        map.addListener("click", (mapsMouseEvent) => {
            // Close the current InfoWindow.
            infoWindow.close();
            // Create a new InfoWindow.
            infoWindow = new google.maps.InfoWindow({
            position: mapsMouseEvent.latLng,
            });
            infoWindow.setContent(
            JSON.stringify(mapsMouseEvent.latLng.lat()+","+mapsMouseEvent.latLng.lng(), null, 2)
            );
            infoWindow.open(map);
            $('#coords').val(mapsMouseEvent.latLng.lat()+","+mapsMouseEvent.latLng.lng());
        });
        }
    </script>
    @stack('scripts')
</body>

</html>