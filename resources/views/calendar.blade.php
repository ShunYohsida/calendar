<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>カレンダー</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <style>
        th:nth-of-type(7), td:nth-of-type(7) {
            color: blue;
        }
        th:nth-of-type(1), td:nth-of-type(1) {
            color: red;
        }
    </style>
    <div class="container">
        <h1>カレンダー</h1>
        <table class="table table-bordered">
            <tr>
                <th>日</th>
                <th>月</th>
                <th>火</th>
                <th>水</th>
                <th>木</th>
                <th>金</th>
                <th>土</th>
            </tr>
            @foreach ($calendarWeek as $week)
            <tr>
                @foreach ($week as $day)
                    <td>{{ $day }}</td>
                @endforeach
            <tr>
            @endforeach
        </table>
    </div>
</body>
</html>
