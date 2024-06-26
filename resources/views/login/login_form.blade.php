<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <!-- content="width=device-width"：Webページの幅をデバイスの幅に合わせる -->
    <!-- initial-scale=1.0：ページの初期ズームレベルを1.0（つまり100%）に設定 -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ログインフォーム</title>
</head>
<body>
    <!-- https://readouble.com/laravel/8.x/ja/validation.html -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <!-- ログイン失敗時の表示 -->
    @if (session('login_error'))
        <div class="alert alert-danger">
            {{ session('login_error') }}
        </div>
    @endif
    <!-- web.phpからルート名がloginのルートを参照する -->
    <form method="POST" action="{{ route('login') }}">
        <!-- CSRF攻撃から保護するために使用される -->
        @csrf

        <!-- labelとinputを明示的に関連づけるには、label forとinput idを同じにする -->
        <label for="email">メールアドレス</label>
        <br>
        <!-- name='email':この入力フィールドの値をサーバーに送るための名前 -->
        <!-- value：以前の入力値を保持するため -->
        <!-- autocomplete="email"：メールアドレスの自動補完機能 -->
        <!-- autofocus：ページが読み込まれた時に、自動的にフォーカスが当たる -->
        <input id="email" type="email" name="email" value="{{ old('email') }}" autocomplete="email" autofocus>

        <br>
        <label for="password">パスワード</label>
        <br>
        <input id="password" type="password" name="password" autocomplete="current-password">

        <br>
        <!-- type="submit"：このボタンがクリックされたときに、フォームのデータがサーバーに送信される -->
        <button type="submit">ログイン</button>
    </form>
</body>
</html>
