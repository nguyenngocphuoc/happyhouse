<!DOCTYPE html>
<html>

<head>
    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td,
        th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }
    </style>
</head>

<body>
    <table>
        <tr>
            <th>Hình ảnh</th>
            <th>title</th>
            <th>file</th>
            <th>Hành động</th>
        </tr>
        @foreach ($download_files as $download_file)
        <tr>
            <td><img src="{{url("file/".$download_file->image)}}" width="40"></td>
            <td>{{$download_file->title}}</td>
            <td> <a href="{{url("file/".$download_file->file)}}" download>{{$download_file->file}}</a></td>
            <td>
                <a href="javascript:void(0)" id="btn_delete"
                    onclick="event.preventDefault();document.getElementById('download_file-delete-form-{{$download_file->id}}').submit();">
                    Xóa
                </a>
            </td>
            <form id="download_file-delete-form-{{$download_file->id}}"
                action="{{ route('admin.download_file.destroy',$download_file->id) }}" method="POST"
                style="display: none;">
                @csrf
                @method('DELETE')
            </form>
        </tr>
        @endforeach
        <tr>
            <form action="{{ route('admin.download_file.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <td><input type="file" name="image" accept="image/*"></td>
                <td><input type="text" name="title"></td>
                <td><input type="file" name="file"></td>
                <td><button type="submit">Thêm</button></td>
            </form>
        </tr>
    </table>

</body>

</html>