@extends('backend.layout.master')

@section('title', 'status')

@push('styles')
<link rel="stylesheet" href="{{ asset('backend/components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
@endpush

@section('content')

<section class="content-header">
    <h1>
        Danh sách trạng thái bđs
        <small>
            <a href="{{ route('admin.status.create') }}" class="btn btn-block btn-xs btn-success btn-flat"><i
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
                    <table id="status-table" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th class="mobile-hide">ID</th>
                                <th>Tên</th>
                                <th>Trạng thái</th>
                                <th>Hành động</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($statuses as $status)
                            <tr>
                                <td class="mobile-hide">{{ $status->id }}</td>
                                <td>{{ $status->name }}</td>
                                <td>{{ $status->status ? 'Có hiệu lực' : 'Không' }}</td>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{ route('admin.status.edit',$status->id) }}"
                                            class="btn btn-warning btn-flat"><i class="fa fa-edit"></i></a>
                                        <a href="javascript:void(0)" class="btn btn-danger btn-flat" id="btn_delete"
                                            onclick="if (confirm('Bạn có muốn xóa thể loại {{$status->name}} và các bài viết liên quan không?')) {
                                                           event.preventDefault();
                                                            document.getElementById('status-delete-form-{{$status->id}}').submit();
                                                        }">
                                            <i class="fa fa-trash" style="font-size:17.5px;"></i>
                                        </a>
                                        <form id="status-delete-form-{{$status->id}}"
                                            action="{{ route('admin.status.destroy',$status->id) }}" method="POST"
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
                                <th>Tên</th>
                                <th>Trạng thái</th>
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
        $('#status-table').DataTable();
    })

</script>
@endpush