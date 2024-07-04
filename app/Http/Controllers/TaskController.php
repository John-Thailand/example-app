<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use App\Models\Task;
use App\Models\User;

class TaskController extends Controller
{
    public function index()
    {
        // ログインしたユーザーのID
        $userId = Auth::user()->id;
        /// Taskと関連するuser情報を取得
        /// ログインしたユーザーのタスクのみ取得
        $tasks = Task::with('user')->where('user_id', $userId)->get();
        // 画面の表示
        return view('tasks.index', ['tasks' => $tasks]);
    }

    public function create()
    {
        // 全てのユーザーデータを取得
        $users = User::all();
        // 'tasks.create'は新しいタスクを作成するビューの名前です。
        // 全てのユーザー情報を渡す
        return view('tasks.create', ['users' => $users]);
    }

    public function store(Request $request)
    {
        // バリデーション
        $request->validate([
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
        return redirect()->route('tasks.index')->with('success', 'タスクが作成されました！');
    }

    public function edit($id)
    {
        // IDを元にタスクを取得
        $task = Task::findOrFail($id);
        // 全てのユーザーデータを取得
        $users = User::all();
        // タスク情報をビューに渡す
        return view('tasks.edit', ['task' => $task, 'users' => $users]);
    }

    public function update(Request $request, $id)
    {
        // リクエストとIDの情報をログに出力
        Log::info('Request data:', $request->all());
        Log::info('Task ID:', ['id' => $id]);
        
        // バリデーション
        $request->validate([
            'user_id' => 'required|integer',
            'title' => 'required|max:30',
            'date' => 'required|date_format:Y-m-d\TH:i',
            'description' => 'required|string',
        ]);

        // IDを元にタスクを取得
        $task = Task::findOrFail($id);

        // タスク情報を更新
        $task->update([
            'user_id' => $request->input('user_id'),
            'title' => $request->input('title'),
            'date' => $request->input('date'),
            'description' => $request->input('description'),
        ]);

        // 更新後のリダイレクト
        return redirect()->route('tasks.index')->with('success', 'タスクが更新されました');
    }

    public function destroy($id)
    {
        // IDを元にタスクを取得
        $task = Task::findOrFail($id);
        // タスクを削除
        $task->delete();

        // 更新後のリダイレクト
        return redirect()->route('tasks.index')->with('success', 'タスクが削除されました');
    }
}
