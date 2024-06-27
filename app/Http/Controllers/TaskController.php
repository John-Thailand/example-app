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

    public function create()
    {
        // 'tasks.create'は新しいタスクを作成するビューの名前です。
        return view('tasks.create');
    }

    public function store(Request $request)
    {
        // バリデーション
        $request->validation([
            'user_id' => 'required|integer',
            'title' => 'required|max:30',
            'date' => 'required|date_format:Y-m-d\TH:i',
            'description' => 'required|string',
        ]);

        // タスクの新規作成
        $task = new Task();
        $task->user_id = $request->input('user_id');
        $task->title = $request->input('title');
        $task->date = $request->input('date');
        $task->description = $request->input('description');
        $task->save();

        // リダイレクトとフラッシュメッセージ
        return redirect()->route('home')->with('success', 'タスクが作成されました！');
    }
}
