<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>タスク編集</title>
</head>
<body>
    <h1>タスク編集</h1>
    <form action="{{ route('tasks.update', $task->id) }}" method="POST">
        @csrf
        <-- HTMLフォームがサポートしていないHTTPメソッドを使用するために使用される -->
        <-- HTMLフォームはデフォルトでGETとPOSTメソッドしかサポートしていません -->
        @method('PUT')
        <div>
            <label for="title">タイトル</label>
            <input type="text" id="title" name="title" value="{{ $task->title }}">
        </div>
        <div>
            <label for="date">期限</label>
            <input type="date" id="date" name="date" value="{{ $task->date }}">
        </div>
        <div>
            <label for="user">担当者</label>
            <input type="text" id="user" name="user" value="{{ $task->user->name }}">
        </div>
        <div>
            <label for="description">内容</label>
            <textarea id="description" name="description">{{ $task->description }}</textarea>
        </div>
        <div>
            <button type="submit">更新</button>
        </div>
    </form>
    <form action="{{ route('tasks.delete', $task->id) }}" method="POST">
        @csrf
        <-- HTMLフォームはデフォルトでGETとPOSTメソッドしかサポートしていません -->
        @method('DELETE')
        <button type="submit">削除</button>
    </form>
</body>
</html>
