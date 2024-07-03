<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <!-- content="width=device-width"：Webページの幅をデバイスの幅に合わせる -->
    <!-- initial-scale=1.0：ページの初期ズームレベルを1.0（つまり100%）に設定 -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ログインフォーム</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<!-- items-center: 縦方向の中央に揃える justify-center: 水平方向の中央に揃える -->
<body class="flex items-center justify-center min-h-screen bg-gray-100">
    <div class="w-full max-w-md bg-white rounded-lg shadow-md p-6">
        <!-- https://readouble.com/laravel/8.x/ja/validation.html -->
        @if ($errors->any())
        <div class="mb-4 text-red-600">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <!-- ログイン失敗時の表示 -->
        @if (session('login_error'))
            <div class="mb-4 text-red-600">
                {{ session('login_error') }}
            </div>
        @endif
        <!-- web.phpからルート名がloginのルートを参照する -->
        <form method="POST" action="{{ route('login') }}">
            <!-- CSRF攻撃から保護するために使用される -->
            @csrf

            <div class="mb-4">
                <!-- labelとinputを明示的に関連づけるには、label forとinput idを同じにする -->
                <label for="email" class="block text-gray-700">メールアドレス</label>
                <!-- name='email':この入力フィールドの値をサーバーに送るための名前 -->
                <!-- value：以前の入力値を保持するため -->
                <!-- autocomplete="email"：メールアドレスの自動補完機能 -->
                <!-- autofocus：ページが読み込まれた時に、自動的にフォーカスが当たる -->
                <input id="email" type="email" name="email" value="{{ old('email') }}" autocomplete="email" autofocus class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            </div>

            <div class="mb-4">
                <label for="password" class="block text-gray-700">パスワード</label>
                <input id="password" type="password" name="password" autocomplete="current-password" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            </div>

            <div class="flex items-center justify-between">
                <!-- type="submit"：このボタンがクリックされたときに、フォームのデータがサーバーに送信される -->
                <button type="submit" class="w-full px-4 py-2 bg-indigo-500 text-white rounded-md hover:bg-indigo-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">ログイン</button>
            </div>
        </form>
    </div>
</body>
</html>
