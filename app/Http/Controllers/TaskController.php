<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Task;

class TaskController extends Controller
{
    public function showTasks()
    {
        // ログインしたユーザーのID
        $userId = Auth::user()->id;
        /// Taskと関連するuser情報を取得
        /// ログインしたユーザーのタスクのみ取得
        $tasks = Task::with('user')->where('user_id', $userId)->get();
        // 画面の表示
        return view('home', ['tasks' => $tasks]);
    }
}
