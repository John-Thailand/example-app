<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Task;

class TaskController extends Controller
{
    public function showTasks()
    {
        // ログインしたユーザーのタスクを取得
        $userId = Auth::user()->id;
        $tasks = Task::where('user_id', $userId)->get();
        // 画面の表示
        return view('home', ['tasks' => $tasks]);
    }
}
