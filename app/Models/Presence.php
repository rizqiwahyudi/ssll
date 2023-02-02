<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Presence extends Model
{
    use HasFactory;

    protected $fillable = ['user_id','date','time_in', 'time_out', 'description', 'work_hours'];

    protected $with = ['user'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
