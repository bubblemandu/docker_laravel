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
    <div>
        <span>가게명 : {{ $data->shopName }}</span>
    </div>
    <table>
        <thead>
        <tr>
            <th>이름</th>
            <th>우선메뉴</th>
            <th>서브메뉴</th>
            <th>사이즈</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <form method="post" action="/setMenu">
                {{ csrf_field() }}
                <input type="hidden" name="list_no" value="{{ $data->no }}">
                <td><input type="text" name="name"></td>
                <td><input type="text" name="firstMenu"></td>
                <td><input type="text" name="secondMenu"></td>
                <td>
                    <select name="size">
                        <option value="s">s</option>
                        <option value="m">m</option>
                        <option value="l">l</option>
                    </select>
                </td>
                <td><button type="submit">등록</button></td>
            </form>
        </tr>
        </tbody>
    </table>
        <table id="table_id" class="table is-striped">
            <thead>
            <tr>
                <th>이름</th>
                <th>우선메뉴</th>
                <th>서브메뉴</th>
                <th>사이즈</th>
            </tr>
            </thead>
            <tbody>
            @foreach($menu as $item)
            <tr>
                <td>{{ $item->name }}</td>
                <td>{{ $item->first_menu }}</td>
                <td>{{ $item->second_menu }}</td>
                <td>{{ $item->size }}</td>
            </tr>
            @endforeach
            <tr>
                <td>합계</td>
                <td>{{ $menu->count() }}</td>
                <td></td>
                <td></td>
            </tr>
            </tbody>
        </table>
    <script>
        $(document).ready( function () {
            $('#table_id').DataTable({
                "bLengthChange" : false,
                "bInfo" : false
            });
        } );
    </script>
    </body>
</html>
