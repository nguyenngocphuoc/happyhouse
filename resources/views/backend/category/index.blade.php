@extends('backend.layout.master')

@section('title', 'Category')

@push('styles')
<link rel="stylesheet" href="{{ asset('backend/components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
@endpush

@section('content')

<section class="content-header">
    <h1>
        Danh sách các thể loại
        <small>
            <a href="{{ route('admin.category.create') }}" class="btn btn-block btn-xs btn-success btn-flat"><i
                    class="fa fa-plus"></i> Tạo mới</a>
        </small>
    </h1>
    <!-- <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Tables</a></li>
            <li class="active">Data tables</li>
        </ol> -->
</section>

<section class="content">
    <div class="row">

        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Dữ liệu</h3>
                </div>

                <div class="box-body">
                    <table id="category-table" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th class="mobile-hide">ID</th>
                                <th class="mobile-hide">Ảnh</th>
                                <th>Tên</th>
                                <th class="mobile-hide">Slug</th>
                                <!--<th>Nhóm thể loại</th>-->
                                <th class="mobile-hide">Trạng thái</th>
                                <th>Hành động</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($categories as $category)
                            <tr>
                                <td class="mobile-hide">{{ $category->id }}</td>
                                <td class="mobile-hide">
                                    <img src="{{ asset('images/'.$category->image) }}" alt="{{ $category->name }}"
                                        width="40px">
                                </td>
                                <td>{{ $category->name }}</td>
                                <td class="mobile-hide">{{ $category->slug }}</td>
                                <!--<td>{{ @$category->groupCategory->name }}</td>-->
                                <td class="mobile-hide">{{ $category->status ? 'Có hiệu lực' : 'Không' }}</td>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{ route('admin.category.edit',$category->id) }}"
                                            class="btn btn-warning btn-flat"><i class="fa fa-edit"></i></a>
                                        <a href="javascript:void(0)" class="btn btn-danger btn-flat" id="btn_delete"
                                            onclick="if (confirm('Bạn có muốn xóa thể loại {{$category->name}} và các bài viết liên quan không?')) {
                                                           event.preventDefault();
                                                            document.getElementById('category-delete-form-{{$category->id}}').submit();
                                                        }">
                                            <i class="fa fa-trash" style="font-size:17.5px;"></i>
                                        </a>
                                        <form id="category-delete-form-{{$category->id}}"
                                            action="{{ route('admin.category.destroy',$category->id) }}" method="POST"
                                            style="display: none;">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>

                        <tfoot>
                            <tr>
                                <th class="mobile-hide">ID</th>
                                <th class="mobile-hide">Ảnh</th>
                                <th>Tên</th>
                                <th class="mobile-hide">Slug</th>
                                <!--<th>Nhóm thể loại</th>-->
                                <th class="mobile-hide">Trạng thái</th>
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
    $(function() {
        $('#category-table').DataTable();
    })

</script>
@endpush