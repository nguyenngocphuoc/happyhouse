<html lang="ja">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Cache-Control" content="no-cache">
    <meta http-equiv="Expires" content="Thu, 01 Dec 1994 16:00:00 GMT">
    <title>サイトマップ|【不動産賃貸】株式会社アシスト・ビジネス</title>
    <meta name="keywords" content="賃貸,仲介手数料無料,不動産,売買,アシスト・ビジネス,アパート,マンション,貸主,戸建,サイトマップ">
    <meta name="description" content="">
    <link href="{{url('css/style-map.css')}}" rel="stylesheet">
    <script src="{{url('js/vendor/jquery-2.2.4.min.js')}}"></script>
    <script src="{{url('js/jquery.imagemapster.min.js')}}"></script>

</head>

<body>
    <img src="{{url('img/jmap.png')}}" alt="日本地図" usemap="#jmap" id="jmap">
    <map name="jmap">
        @php
        $tamp = "";
        @endphp
        @foreach ($maps as $map)
        @if ($tamp != $map->district->name)
        @php
        $tamp = $map->district->name;
        @endphp
        <!-- ↓↓{{$tamp}}↓↓ -->
        @endif
        <area region="{{$map->district->romanji_name}}" alt="{{$map->district->name}}" shape="{{$map->shape}}"
            coords="{{$map->coords}}"
            href="javascript:window.open('{{route('page.property').'?district='.$map->district->romanji_name}}','_top');void(0);">
        @endforeach



    </map>
    <script>
        $(document).ready(function () {
            $('#jmap').mapster({
                singleSelect: true,
                clickNavigate: true,
                render_highlight: { altImage: 'img/jmap2.png' },
                mapKey: 'region',
                fillOpacity: 1,
            });
        });
    </script>

</body>

</html>