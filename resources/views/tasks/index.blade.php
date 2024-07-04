<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>タスク一覧画面</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="flex">
    <div class="sidebar w-64 bg-gray-800 text-white h-screen p-5">
        <ul>
            <li class="mb-4"><a href="{{ route('tasks.index') }}" class="text-blue-300 hover:underline">タスク一覧</a></li>
            <li class="mb-4"><a href="{{ route('users.index') }}" class="text-blue-300 hover:underline">ユーザ一覧</a></li>
        </ul>
    </div>
    <div class="content flex-1 p-6 bg-gray-100">
        <div>
            @if (session('login_success'))
                <div class="alert alert-success bg-green-100 text-green-700 p-4 rounded mb-6">
                    {{ session('login_success') }}
                </div>
            @endif
            <table class="min-w-full bg-white border border-gray-300">
                <thead>
                    <tr class="bg-gray-200">
                        <th class="py-2 px-4 border-b">タイトル</th>
                        <th class="py-2 px-4 border-b">期限</th>
                        <th class="py-2 px-4 border-b">担当者</th>
                        <th class="py-2 px-4 border-b">内容</th>
                        <th class="py-2 px-4 border-b">編集/削除</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tasks as $task)
                        <tr>
                            <td class="py-2 px-4 border-b">{{ $task->title }}</td>
                            <td class="py-2 px-4 border-b">{{ $task->date }}</td>
                            <td class="py-2 px-4 border-b">{{ $task->user->name }}</td>
                            <td class="py-2 px-4 border-b">{{ $task->description }}</td>
                            <td class="py-2 px-4 border-b">
                                <button class="edit-button text-blue-500 hover:underline">
                                    <a href="{{ route('tasks.edit', $task->id) }}">
                                        編集/削除
                                    </a>
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <button class="add-button  mt-4 py-2 px-4 bg-blue-500 text-white rounded hover:bg-blue-700"><a href="{{ route('tasks.create') }}">+</a></button>
    </div>
</body>
</html>
