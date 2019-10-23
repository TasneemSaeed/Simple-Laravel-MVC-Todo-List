<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = [
        'title',
        'user_id',
        'due_time',
        'is_done',
        'need_alarm',
    ];
}
