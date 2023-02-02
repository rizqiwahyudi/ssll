<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Overtime extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'description',
        'date',
        'status',
        'authorized_by'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function authorizer(){
        return $this->belongsTo('App\Models\User', 'authorized_by','id');
    }

}
