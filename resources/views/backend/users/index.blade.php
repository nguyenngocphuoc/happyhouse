@extends('backend.layout.master')

@section('title', 'Users')

@push('styles')
<link rel="stylesheet" href="{{ asset('backend/components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
@endpush

@section('content')

<section class="content-header">
    <h1>
        Người dùng
        <small>
            <a href="{{ route('admin.users.create') }}" class="btn btn-block btn-xs btn-success btn-flat"><i
                    class="fa fa-plus"></i> Tạo mới</a>
        </small>
    </h1>
    {{-- <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Tables</a></li>
        <li class="active">Data tables</li>
    </ol> --}}
</section>

<section class="content">
    <div class="row">

        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Bảng dữ liệu</h3>
                </div>

                <div class="box-body">
                    <table id="user-table" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th class="mobile-hide">ID</th>
                                <th>Ảnh</th>
                                <th>Tên</th>
                                <th class="mobile-hide">Email</th>
                                <th>Quyền</th>
                                <th>Trạng thái</th>
                                <th>Hành động</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($users as $user)
                            <tr>
                                <td class="mobile-hide">{{ $user->id }}</td>
                                <td>
                                    <img src="{{ asset('images/'.$user->photo) }}" alt="{{ $user->name }}" width="40px">
                                </td>
                                <td>{{ $user->name }}</td>
                                <td class="mobile-hide">{{ $user->email }}</td>
                                <td>{{ $user->role->name }}</td>
                                <td>{{ $user->status ? 'Hoạt động' : 'Khóa' }}</td>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{ route('admin.users.edit',$user->id) }}"
                                            class="btn btn-warning btn-flat"><i class="fa fa-edit"></i></a>
                                        <a href="javascript:void(0)" class="btn btn-danger btn-flat" onclick="if (confirm('Bạn có muốn xóa người dùng {{$user->name}} không?')) {
                                                           event.preventDefault();
                                                            document.getElementById('user-delete-form-{{$user->id}}').submit();
                                                        }">
                                            <i class="fa fa-trash" style="font-size:17.5px;"></i>
                                        </a>
                                        <form id="user-delete-form-{{$user->id}}"
                                            action="{{ route('admin.users.destroy',$user->id) }}" method="POST"
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
                                <th>ID</th>
                                <th>Ảnh</th>
                                <th>Tên</th>
                                <th>Email</th>
                                <th>Quyền</th>
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
    $(function(){
            $('#user-table').DataTable();
        })
</script>
@endpush