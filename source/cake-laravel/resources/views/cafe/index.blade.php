<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.css">
        <script
            src="https://code.jquery.com/jquery-3.6.0.slim.js"
            integrity="sha256-HwWONEZrpuoh951cQD1ov2HUK5zA5DwJ1DNUXaM6FsY="
            crossorigin="anonymous"></script>


        <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>
        <title>Laravel</title>

    </head>
    <body class="antialiased">
    <form method="post" action="/setCampaign">
        {{ csrf_field() }}
        <td><input type="text" name="title" placeholder="등록할제목"></td>
        <td><input type="text" name="shopName" placeholder="가게이름"></td>
        <td><button>등록</button></td>
    </form>
    <table id="table_id" class="table is-striped">
        <thead>
        <tr>
            <th>제목</th>
            <th>가게</th>
        </tr>
        </thead>
        <tbody>
        @foreach($data as $item)
            <tr data-no="{{ $item->no }}">
                <td>{{ $item->name }}</td>
                <td>{{ $item->shopName }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <script>
        $(document).ready( function () {
            $('#table_id').DataTable({
                "bLengthChange" : false,
                "bInfo" : false
            });
            $('#table_id tbody').on('click', 'tr', function () {
                let data = $(this).data('no');
                window.location.href="{{ url('menu') }}"+'/'+data;
            } );
        } );
    </script>
    </body>
</html>
