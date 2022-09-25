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
        .schedule_add {
            color: #FFFFFF;
            display: inline-block;
            padding: 1rem;;
            background-color: #ff8a84;
            margin: 0.3rem;
            font-size: 1.5rem;
            border-radius: 10px;
            text-decoration-line: none;

        }
        .schedule_add:hover {
            color: #FFFFFF;
            background-color: #ff5e56 !important;
        }
        .flex{
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
    </style>
    <div class="container">
        <div class="flex">
            <h1>カレンダー</h1>
            <div>
                <a href="calendar/schedule" class="schedule_add">スケジュール登録</a>
            </div>
        </div>

        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

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
            @foreach ($calendarWeek as $weekKey => $week)
            <tr>
                @foreach ($week as $day)
                    <td>{{ $day }}<br>
                        @if ($day)
                            @foreach (data_get($eventWeek, $weekKey.'.'.$day) as $event)
                                {{ $event->name }}<br>
                            @endforeach
                        @endif
                    </td>
                @endforeach
            <tr>
            @endforeach
        </table>
    </div>
</body>
</html>
