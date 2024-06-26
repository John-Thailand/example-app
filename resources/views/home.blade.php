<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ホーム画面</title>
</head>
<body>
    <div>
        <div>
            @if (session('login_success'))
                <div class="alert alert-success">
                    {{ session('login_success') }}
                </div>
            @endif
            <table border="1">
                <thead>
                    <tr>
                        <th>タイトル</th>
                        <th>期限</th>
                        <th>担当者</th>
                        <th>内容</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tasks as $task)
                        <tr>
                            <td>{{ $task->title }}</td>
                            <td>{{ $task->date }}</td>
                            <td>{{ $task->user->name }}</td>
                            <td>{{ $task->description }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <button class="add-button"><a href="{{ route('tasks.create') }}">+</a></button>
</body>
</html>
