@extends('backend.layout.master')

@section('title', 'Info Submit')

@push('styles')
<link rel="stylesheet" href="{{ asset('backend/components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
@endpush

@section('content')

<section class="content-header">
    <h1>
        Danh sách liên hệ
    </h1>
</section>

<section class="content">
    <div class="row">
        <script>
            $(document).ready(function() {
                $('#category-table').DataTable( {
                "order": [[ 6, "desc" ]]
            } );
        } );
        </script>
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
                                <th>Tên</th>
                                <th>SĐT</th>
                                <th>Trạng thái</th>
                                <th class="mobile-hide">Dấu sao</th>
                                <th class="mobile-hide">Nội Dung</th>
                                <th class="mobile-hide">Chủ đề</th>
                                <th class="mobile-hide">Ngày hẹn</th>
                                <th>Hành động</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($listInfoSubmit as $info)
                            <tr>
                                <td class="mobile-hide">{{ $info->id }}</td>
                                <td>{{ $info->name }}</td>
                                <td>
                                    <a class="mobile-hide" href="tel:{{ $info->phone }}">{{ $info->phone }}</a>
                                    <a class="mobile-show" href="tel:{{ $info->phone }}"><i class="fa fa-phone"></i></a>
                                </td>
                                <td>
                                    {{ config('properties.stage.'.$info->stage)  }}
                                </td>
                                <td class="mobile-hide">{{ $info->star ? '*' : '' }}</td>
                                <th class="mobile-hide">{{ $info->message }}</th>
                                <td class="mobile-hide">{{ isset($info->news) ? $info->news->title : $info->orders}}
                                </td>
                                <td class="mobile-hide">{{ $info->appoinment }}</td>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{ route('admin.info-submit.show',$info->id) }}"
                                            class="btn btn-info btn-flat"><i class="fa fa-eye"></i></a>
                                        <!--<a href="{{ route('admin.info-submit.edit',$info->id) }}"
                                            class="btn btn-warning btn-flat"><i class="fa fa-edit"></i></a>-->
                                        <a href="javascript:void(0)" class="btn btn-danger btn-flat" id="btn_delete"
                                            onclick="if (confirm('Bạn có muốn xóa thông tin của {{$info->name}} không?')) {
                                                           event.preventDefault();
                                                            document.getElementById('info-delete-form-{{$info->id}}').submit();
                                                        }">
                                            <i class="fa fa-trash" style="font-size:17.5px;"></i>
                                        </a>
                                        <form id="info-delete-form-{{$info->id}}"
                                            action="{{ route('admin.info-submit.destroy',$info->id) }}" method="POST"
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
                                <th>Email</th>
                                <th>Trạng thái</th>
                                <th class="mobile-hide">Dấu sao</th>
                                <th class="mobile-hide">Nội Dung</th>
                                <th class="mobile-hide">Chủ đề</th>
                                <th class="mobile-hide">Ngày hẹn</th>
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