<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Task extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'task_name',
        'user_id',
        'file',
        'description',
        'start_date',
        'deadline',
        'submitted_at',
        'task_status_id',
        'created_by',
    ];

    protected $with = ['user', 'assignor', 'taskStatus'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function assignor()
    {
        return $this->belongsTo('App\Models\User', 'created_by','id');
    }

    public function taskStatus()
    {
        return $this->belongsTo(TaskStatus::class);
    }
}
