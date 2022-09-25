<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>カレンダー | schedule　追加</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>

    <div class="container">
        <h1>スケジュール登録</h1>
        <form action="{{ route('calendar.schedule.add') }}" method="post">
            @csrf
            <div class="mb-3">
                <label for="event" class="form-label">イベント名</label>
                <input type="text" name="event_name" class="form-control" id="event" value="{{ old('event_name') }}">
                <div class="form-text">新規イベントや場所を記載。</div>
                @error('event_name')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="event_date" class="form-label">イベント日</label>
                <input type="date" name="event_date" class="form-control" id="event_date" value="{{ old('event_date') }}">
                @error('event_date')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">登録</button>
        </form>
    </div>
</body>
</html>

