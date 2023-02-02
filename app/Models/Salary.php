<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Salary extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'user_id',
        'date',
        'nominal',
        'description',
        'salary_type_id',
    ];

    protected $with = ['user','type'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function type()
    {
        return $this->belongsTo(SalaryType::class, 'salary_type_id');
    }

}
