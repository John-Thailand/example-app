<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;

// ログイン前に実行できる処理のグループとして、'guest'と設定する
Route::group(['middleware' => ['guest']], function () {
    // ログインフォーム表示
    Route::get('/', [AuthController::class, 'showLogin'])->name('showLogin');
    // ログイン処理
    Route::post('login', [AuthController::class, 'login'])->name('login');
});

// ログイン後に実行できる処理のグループとして、'auth'と設定する
Route::group(['middleware' => ['auth']], function () {
    // ホーム画面
    Route::get('home', function () {
        return view('home');
    })->name('home');
});
