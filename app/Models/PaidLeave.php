<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PaidLeave extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'user_id',
        'description',
        'start_date',
        'end_date',
        'status',
        'authorized_by'
    ];

    protected $with = ['user', 'authorizer'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function authorizer()
    {
        return $this->belongsTo('App\Models\User', 'authorized_by','id');
    }
}
