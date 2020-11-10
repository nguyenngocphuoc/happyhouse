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

    <h2>Thuộc tính thêm</h2>

    <table>
        <tr>
            <th>Tên thuộc tính</th>
            <th>Giá trị thuộc tính</th>
            <th>Hành động</th>
        </tr>
        @foreach ($attributes as $attribute)
        <tr>
            <td>{{$attribute->name}}</td>
            <td>{{$attribute->value}}</td>
            <td>
                <a href="javascript:void(0)" id="btn_delete"
                    onclick="event.preventDefault();document.getElementById('attribute-delete-form-{{$attribute->id}}').submit();">
                    Xóa
                </a>
            </td>
            <form id="attribute-delete-form-{{$attribute->id}}"
                action="{{ route('admin.attribute.destroy',$attribute->id) }}" method="POST" style="display: none;">
                @csrf
                @method('DELETE')
            </form>
        </tr>
        @endforeach
        <tr>
            <form action="{{ route('admin.attribute.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input id="news_id" name="news_id" type="hidden" value="{{$news_id}}">
                <td><input type="text" name="name"></td>
                <td><input type="text" name="value"></td>
                <td><button type="submit">Thêm</button></td>
            </form>
        </tr>
    </table>

</body>

</html>