<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginFormRequest;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * @return View
     */
    public function showLogin()
    {
        return view('login.login_form');
    }

    /**
     * @param  App\Http\Requests\LoginFormRequest $request
     */
    public function login(LoginFormRequest $request)
    {
        // フォームから送信された 'email'と'password'の値を取得
        $credentials = $request->only('email', 'password');

        // 認証を試みる
        if (Auth::attempt($credentials)) {
            // 成功した場合、セッションを再生成
            $request->session()->regenerate();
            // ホームページにリダイレクトし、ログイン成功のメッセージをセッションに保存
            return redirect('home')->with('login_success', 'ログイン成功しました！');
        }

        // 認証が失敗した場合、元のページにリダイレクトし、エラーメッセージーじをセッションに保存
        return back()->withErrors([
            'login_error' => 'メールアドレスかパスワードが間違っています。'
        ]);
    }

    /**
     * @return View
     */
    public function index() {
        // 全てのユーザーデータを取得
        $users = User::all();
        // 全てのユーザー情報を一覧で表示
        return view('users.index', ['users' => $users]);
    }

    /**
     * @return View
     */
    public function create()
    {
        return view('users.create');
    }
}
