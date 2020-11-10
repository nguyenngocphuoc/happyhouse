@extends('backend.layout.master')

@section('title', 'Hero Images')

@push('styles')
<link rel="stylesheet" href="{{ asset('backend/components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
@endpush

@section('content')

<section class="content-header">
    <h1>
        QUẢN LÝ
        <small><a href="{{ route('admin.hero-images.create') }}" class="btn btn-block btn-xs btn-success btn-flat"><i
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
                <div class="box-body">
                    <table id="category-table" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th class="mobile-hide">ID</th>
                                <th>Hình ảnh</th>
                                <th class="mobile-hide">Nội dung hình ảnh</th>
                                <th class="mobile-hide">Trạng Thái</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($listHeroImages as $hrImage)
                            <tr>
                                <td class="mobile-hide">{{ $hrImage->id }}</td>
                                <td>
                                    <img src="{{ asset('images/'.$hrImage->image) }}" alt="{{ $hrImage->title }}"
                                        width="120px">
                                </td>
                                <td class="mobile-hide">{{str_limit(strip_tags($hrImage->title),50) }}</td>
                                <td class="mobile-hide">{{ $hrImage->status ? 'Visible' : 'Invisible' }}</td>
                                <td>
                                    <div class="btn-group-vertical">
                                        <div class="form-inline">
                                            <a href="{{ route('admin.hero-images.edit',$hrImage->id) }}"
                                                class="btn btn-warning btn-flat"><i class="fa fa-edit"></i></a>
                                            <a href="javascript:void(0)" class="btn btn-danger btn-flat" onclick="if (confirm('Bạn có muốn xóa ảnh này không?')) {
                                                  event.preventDefault();
                                                        document.getElementById('hero-images-delete-form-{{$hrImage->id}}').submit();
                                                }">
                                                <i class="fa fa-trash" style="font-size:17.5px;"></i>
                                            </a>
                                            <form id="hero-images-delete-form-{{$hrImage->id}}"
                                                action="{{ route('admin.hero-images.destroy',$hrImage->id) }}"
                                                method="POST" style="display: none;">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                        </div>

                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
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
    $(function() {
    $('#category-table').DataTable();
})
</script>
@endpush