@extends('backend.layout.master')

@section('title', 'map')

@push('styles')
<link rel="stylesheet" href="{{ asset('backend/components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
@endpush

@section('content')

<section class="content-header">
    <h1>
        Danh sách các thể loại
        <small>
            <a href="{{ route('admin.map.create') }}" class="btn btn-block btn-xs btn-success btn-flat"><i
                    class="fa fa-plus"></i> Tạo mới</a>
        </small>
    </h1>
</section>

<section class="content">
    <div class="row">

        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Dữ liệu</h3>
                </div>

                <div class="box-body">
                    <table id="map-table" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Tỉnh</th>
                                <th>Hình dạng</th>
                                <th class="mobile-hide">Phạm vi</th>
                                <th>Hành động</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($maps as $map)
                            <tr>
                                <td>{{ $map->id }}</td>
                                <td>{{ $map->district->name }}</td>
                                <td>{{ config('properties.shapes.'.$map->shape) }}</td>
                                <td class="mobile-hide">{{ str_limit($map->coords, 50) }}</td>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{ route('admin.map.edit',$map->id) }}"
                                            class="btn btn-warning btn-flat"><i class="fa fa-edit"></i></a>
                                        <a href="javascript:void(0)" class="btn btn-danger btn-flat" id="btn_delete"
                                            onclick="if (confirm('Bạn có muốn xóa {{$map->district->name}} không?')) {
                                                           event.preventDefault();
                                                            document.getElementById('map-delete-form-{{$map->id}}').submit();
                                                        }">
                                            <i class="fa fa-trash" style="font-size:17.5px;"></i>
                                        </a>
                                        <form id="map-delete-form-{{$map->id}}"
                                            action="{{ route('admin.map.destroy',$map->id) }}" method="POST"
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
                                <th>Tỉnh</th>
                                <th>Hình dạng</th>
                                <th class="mobile-hide">Phạm vi</th>
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
        $('#map-table').DataTable();
    })

</script>
@endpush