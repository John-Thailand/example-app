<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginFormRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('login.login_form');
    }

    public function login(LoginFormRequest $request)
    {
        // フォームから送信された 'email'と'password'の値を取得
        $credentials = $request->only('email', 'password');

        // 認証を試みる
        if (Auth::attempt($credentials)) {
            // 成功した場合、セッションを再生成
            $request->session()->regenerate();
            // ホームページにリダイレクトし、ログイン成功のメッセージをセッションに保存
            return redirect()->route('tasks.index')->with('login_success', 'ログイン成功しました！');
        }

        // 認証が失敗した場合、元のページにリダイレクトし、エラーメッセージーじをセッションに保存
        return back()->withErrors([
            'login_error' => 'メールアドレスかパスワードが間違っています。'
        ]);
    }

    public function index() {
        // 全てのユーザーデータを取得
        $users = User::all();
        // 全てのユーザー情報を一覧で表示
        return view('users.index', ['users' => $users]);
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        // バリデーション
        // email: メールアドレスが正しい形式であることを確認する
        // usersテーブルのemailが一意であるか確認する
        // confirmed: パスワードと確認用パスワードが一致することを確認するためのもの
        // password_confirmation フィールドが必要
        $request->validate([
            'name' => 'required|max:30',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // ユーザの新規作成
        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));  // パスワードをハッシュ化
        $user->save();

        // リダイレクトとフラッシュメッセージ
        // routeにはルート名を指定する
        return redirect()->route('users.index')->with('success', 'ユーザが作成されました！');
    }

    public function edit($id)
    {
        // IDを元にユーザを取得
        $user = User::findOrFail($id);
        // ユーザ情報をビューに渡す
        return view('users.edit', ['user' => $user]);
    }

    public function update(Request $request, $id)
    {
        // バリデーション
        $request->validate([
            'name' => 'required|max:30',
            'email' => 'required|email',
            'password' => 'nullable|string|min:8',
        ]);

        // IDを元にユーザを取得
        $user = User::findOrFail($id);

        // ユーザ情報を更新
        $user->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
        ]);

        // パスワードの更新
        if ($request->has('password')) {
            $user->update([
                'password' => Hash::make($request->input('password')),
            ]);
        }

        // 更新後のリダイレクト
        return redirect()->route('users.index')->with('success', 'ユーザが更新されました');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('users.index')->with('success', 'ユーザが削除されました');
    }
}
