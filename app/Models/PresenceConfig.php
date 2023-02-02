<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PresenceConfig extends Model
{
    use HasFactory;

    protected $fillable = [
        'time_in',
        'time_out',
        'tolerance_time_in',
        'tolerance_time_out'
    ];
}
