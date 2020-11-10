@extends('backend.layout.master')

@section('title', 'Dashboard')

@push('styles')
<!-- Morris chart -->
<link rel="stylesheet" href="{{ asset('backend/components/morris.js/morris.css') }}">
<!-- jvectormap -->
<link rel="stylesheet" href="{{ asset('backend/components/jvectormap/jquery-jvectormap.css') }}">
@endpush

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Dashboard
        <small>Control panel</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="/"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
    </ol>
</section>

<!-- Main content -->
<section class="content" style="min-height:800px">
    <section class="content">
        <div class="row">
            <div class="col-md-8">
                <div class="box box-primary">
                    <div class="box-body no-padding">
                        <div id="calendar" class="fc fc-unthemed fc-ltr">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <!-- Info Boxes Style 2 -->
                <div class="info-box bg-yellow">
                    <span class="info-box-icon"><i class="fa fa-eye"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Lượt xem</span>
                        <span class="info-box-number">{{$view_count}}</span>
                        <div class="progress">
                            <div class="progress-bar" style="width: {{$view_count/1000000*100}}%">
                            </div>
                        </div>
                        <span class="progress-description">
                            {{number_format($view_count/1000000*100, 4)}}% của {{number_format(1000000)}}
                        </span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
                <div class="info-box bg-green">
                    <span class="info-box-icon"><i class="fa fa-files-o"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Tổng kích thước ảnh</span>
                        <span class="info-box-number">{{$file_size}} MB</span>

                        <div class="progress">
                            <div class="progress-bar" style="width: {{$file_size/10240*100}}%"></div>
                        </div>
                        <span class="progress-description">
                            {{number_format($file_size/10240*100, 2)}}% của 10GB
                        </span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
                <div class="info-box bg-red">
                    <span class="info-box-icon"><i class="fa fa-cloud-upload"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Tổng số ảnh tải lên</span>
                        <span class="info-box-number">{{$file_count}}</span>

                        <div class="progress">
                            <div class="progress-bar" style="width:{{$file_count/100000*100}}%"></div>
                        </div>
                        <span class="progress-description">
                            {{number_format($file_count/100000*100, 2)}}% của {{number_format(100000)}}
                        </span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
                <div class="info-box bg-aqua">
                    <span class="info-box-icon"><i class="ion ion-ios-cart-outline"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Số Đơn hàng</span>
                        <span class="info-box-number">{{$infos->count()}}</span>

                        <div class="progress">
                            <div class="progress-bar" style="width: {{($infos->count())/1000000*100}}%">
                            </div>
                        </div>
                        <span class="progress-description">
                            {{number_format($infos->count()/1000000*100, 4)}}% của {{number_format(1000000)}}
                        </span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
                <!-- /.info-box -->
                <div class="info-box bg-yellow">
                    <span class="info-box-icon"><i class="ion-ios-chatbubble-outline"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Bài viết </span>
                        <span class="info-box-number">{{$news_count}}</span>
                        <div class="progress">
                            <div class="progress-bar" style="width: {{$comment_count/$news_count*100}}%">
                            </div>
                        </div>
                        <span class="progress-description">
                            {{number_format($comment_count/$news_count*100, 2)}}% có bình luận
                        </span>
                    </div>

                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    </section>

</section>
<!-- /.content -->
@endsection
<!--  -->
@push('scripts')
<script>
    var date = new Date()
        var d = date.getDate(),
        m = date.getMonth(),
        y = date.getFullYear();
        $('#calendar').fullCalendar({
            disableDragging: true,
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,agendaWeek,agendaDay'
            },
            buttonText: {
                today: 'today',
                month: 'month',
                week: 'week',
                day: 'day'
            },
            //Random default events
            events: [
            @foreach ($infos as $info)
                {
                title: "{{isset($info->news) ? $info->news->title : $info->orders}}",
                start: new Date({{Carbon\Carbon::parse($info->appoinment)->format('Y')}}, 
                {{Carbon\Carbon::parse($info->appoinment)->format('m')}} -1, 
                {{Carbon\Carbon::parse($info->appoinment)->format('d')}},
                {{Carbon\Carbon::parse($info->appoinment)->format('H')}},
                {{Carbon\Carbon::parse($info->appoinment)->format('i')}}),
                end: new Date({{Carbon\Carbon::parse($info->appoinment)->format('Y')}},
                {{Carbon\Carbon::parse($info->appoinment)->format('m')}} -1,
                {{Carbon\Carbon::parse($info->appoinment)->format('d')}},
                {{Carbon\Carbon::parse($info->appoinment)->format('H')}},
                {{Carbon\Carbon::parse($info->appoinment)->format('i')}}),
                url: '{{route('admin.info-submit.show',$info->id)}}',
                backgroundColor: '@if($info->stage == "done") #FF0000 @else #3c8dbc @endif', //Primary (light-blue)
                borderColor: '#3c8dbc' //Primary (light-blue)
                },
            @endforeach
            ]
        });
</script>
@endpush