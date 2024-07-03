<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'title', 'date', 'description'];

    // 「User:Task = 1:多」を設定
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
