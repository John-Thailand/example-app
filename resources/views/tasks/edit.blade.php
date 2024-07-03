<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>タスク編集</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="w-full max-w-2xl bg-white rounded-lg shadow-md p-6">
        <h1 class="text-2xl font-bold mb-4">タスク編集</h1>
        <form action="{{ route('tasks.update', ['id' => $task->id]) }}" method="POST" class="space-y-4">
            @csrf
            <!-- HTMLフォームがサポートしていないHTTPメソッドを使用するために使用される -->
            <!-- HTMLフォームはデフォルトでGETとPOSTメソッドしかサポートしていません -->
            @method('PUT')
            <div>
                <label for="title" class="block text-sm font-medium text-gray-700">タイトル</label>
                <input type="text" id="title" name="title" value="{{ $task->title }}" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            </div>
            <div>
                <label for="date" class="block text-sm font-medium text-gray-700">期限</label>
                <input type="datetime-local" id="date" name="date" value="{{ $task->date }}" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            </div>
            <div>
                <label for="user_id" class="block text-sm font-medium text-gray-700">担当者:</label>
                <select id="user_id" name="user_id" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    @foreach($users as $user)
                        <option value="{{ $user->id }}" {{ $task->user_id == $user->id ? 'selected' : '' }}>{{ $user->name }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="description" class="block text-sm font-medium text-gray-700">内容</label>
                <textarea id="description" name="description" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">{{ $task->description }}</textarea>
            </div>
            <div class="flex justify-end space-x-4">
                <button type="submit" class="w-full px-4 py-2 bg-indigo-500 text-white rounded-md hover:bg-indigo-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">更新</button>
            </div>
        </form>
        <form action="{{ route('tasks.delete', $task->id) }}" method="POST"  class="mt-4">
            @csrf
            <!-- HTMLフォームはデフォルトでGETとPOSTメソッドしかサポートしていません -->
            @method('DELETE')
            <button type="submit" class="w-full px-4 py-2 bg-red-500 text-white rounded-md hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">削除</button>
        </form>
    </div>
</body>
</html>
