<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>新しいタスクを作成</title>
</head>
<body>
    <h1>新しいタスクを作成</h1>
    <form action="{{ route('tasks.store') }}" method="POST">
        @csrf
        <div>
            <label for="title">タイトル:</label>
            <input type="text" id="title" name="title">
        </div>
        <div>
            <label for="date">期限:</label>
            <input type="datetime-local" id="date" name="date">
        </div>
        <div>
            <label for="user_id">担当者:</label>
            <select id="user_id" name="user_id" required>
                <option value="">担当者を選択してください</option>
                @foreach($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label for="description">内容:</label>
            <textarea id="description" name="description"></textarea>
        </div>
        <button type="submit">保存</button>
    </form>
</body>
</html>
