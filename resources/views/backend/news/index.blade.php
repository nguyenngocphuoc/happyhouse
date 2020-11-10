@extends('backend.layout.master')

@section('title', 'News')

@push('styles')
<link rel="stylesheet" href="{{ asset('backend/components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
@endpush

@section('content')

<section class="content-header">
    <h1>
        QUẢN LÝ BÀI ĐĂNG
        <small><a href="{{ route('admin.news.create') }}" class="btn btn-block btn-xs btn-success btn-flat"><i
                    class="fa fa-plus"></i> Thêm Mới</a></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#" style="margin-right: 30px; font-size: 15px;"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
    </ol>
</section>

<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Dữ liệu</h3>
                </div>
                <div class="box-body">
                    <table id="news-table" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th class="mobile-hide">ID</th>
                                <th class="mobile-hide">Hình ảnh bài viết</th>
                                <th>Tiêu đề</th>
                                <th class="mobile-hide">Slug</th>
                                <th class="mobile-hide">Nội dung chi tiết</th>
                                <th>Thể loại</th>
                                <th class="mobile-hide">Status</th>
                                <th class="mobile-hide">Lượt xem</th>
                                <th>Hành động</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($newslist as $news)
                            <tr>
                                <td class="mobile-hide">{{ $news->id }}</td>
                                <td class="mobile-hide">
                                    <img src="{{ asset('images/'.$news->image) }}" alt="{{ $news->title }}"
                                        width="120px">
                                </td>
                                <td>{{ $news->title }}</td>
                                <td class="mobile-hide">{{ $news->slug }}</td>
                                <td class="mobile-hide">{{ str_limit(strip_tags($news->details),300) }}</td>
                                <td>{{ @$news->category->name }}</td>
                                <td class="mobile-hide">{{ $news->status ? 'Published' : 'Unpublished' }}</td>
                                <td class="mobile-hide">{{ $news->view_count }}</td>
                                <td>
                                    <div class="btn-group-vertical">
                                        <div class="form-inline">
                                            <a href="{{ route('admin.news.show',$news->id) }}"
                                                class="btn btn-primary btn-flat"><i class="fa fa-eye"></i></a>
                                            <a href="{{ route('admin.news.edit',$news->id) }}"
                                                class="btn btn-warning btn-flat"><i class="fa fa-edit"></i></a>
                                            <a href="javascript:void(0)" class="btn btn-danger btn-flat"
                                                onclick="deleteRecord('Bạn có muốn xóa {{$news->slug}} không?', 'news-delete-form-{{$news->id}}')">
                                                <i class="fa fa-trash" style="font-size:17.5px;"></i>
                                            </a>
                                            <form id="news-delete-form-{{$news->id}}"
                                                action="{{ route('admin.news.destroy',$news->id) }}" method="POST"
                                                style="display: none;">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                        </div>

                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th class="mobile-hide">ID</th>
                                <th class="mobile-hide">Hình ảnh bài viết</th>
                                <th>Tiêu đề</th>
                                <th class="mobile-hide">Slug</th>
                                <th class="mobile-hide">Nội dung chi tiết</th>
                                <th>Thể loại</th>
                                <th class="mobile-hide">Status</th>
                                <th class="mobile-hide">Lượt xem</th>
                                <th>Hành động</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@push('scripts')
<script src="{{ asset('backend/components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('backend/components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
<script>
    $(function(){
        $('#news-table').DataTable();
    })

    function deleteRecord(title, id) {
        if (confirm(title)) {
            event.preventDefault();
            document.getElementById(id).submit();
        }
    }
</script>
@endpush