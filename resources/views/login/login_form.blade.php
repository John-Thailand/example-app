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
    <!-- web.phpからルート名がloginのルートを参照する -->
    <form method="POST" action="{{ route('login') }}">
        <!-- CSRF攻撃から保護するために使用される -->
        @csrf

        <label for="email">メールアドレス</label>
        <br>
        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

        <br>
        <label for="password" class="col-md-4 col-form-label text-md-right">パスワード</label>
        <br>
        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

        <br>
        <button type="submit" class="btn btn-primary">ログイン</button>
    </form>
</body>
</html>
