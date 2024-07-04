<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\TaskController;

// ログイン前に実行できる処理のグループとして、'guest'と設定する
Route::group(['middleware' => ['guest']], function () {
    // ログインフォーム表示
    Route::get('/', [AuthController::class, 'showLogin'])->name('showLogin');
    // ログイン処理
    Route::post('login', [AuthController::class, 'login'])->name('login');
});

// ログイン後に実行できる処理のグループとして、'auth'と設定する
Route::group(['middleware' => ['auth']], function () {
    // タスク一覧画面
    Route::get('/tasks', [TaskController::class, 'index'])->name('tasks.index');
    // タスク新規作成画面
    Route::get('/tasks/create', [TaskController::class, 'create'])->name('tasks.create');
    // タスクの新規作成
    Route::post('/tasks', [TaskController::class, 'store'])->name('tasks.store');
    // タスク編集/削除画面
    Route::get('/tasks/{id}/edit', [TaskController::class, 'edit'])->name('tasks.edit');
    // タスクの更新
    Route::put('/tasks/{id}', [TaskController::class, 'update'])->name('tasks.update');
    // タスクの削除
    Route::delete('/tasks/{id}', [TaskController::class, 'destroy'])->name('tasks.destroy');

    // ユーザ一覧画面
    Route::get('/users', [AuthController::class, 'index'])->name('users.index');
    // ユーザ新規作成画面
    Route::get('/users/create', [AuthController::class, 'create'])->name('users.create');
    // ユーザの新規作成
    Route::post('/users', [AuthController::class, 'store'])->name('users.store');
    // ユーザ編集/削除画面
    Route::get('/users/{id}/edit', [AuthController::class, 'edit'])->name('users.edit');
    // ユーザの編集
    Route::put('/users/{id}', [AuthController::class, 'update'])->name('users.update');
    // ユーザの削除
    Route::delete('/users/{id}', [AuthController::class, 'destroy'])->name('users.destroy');
});
