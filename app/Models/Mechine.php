<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mechine extends Model
{
    protected $table = 'mechine';
    protected $primaryKey = 'mechine_id';
    protected $fillable = ['name', 'ip', 'is_default', 'port', 'password'];
    protected $dates = ['deleted_at'];

    function scopeDropdown() {
        $mechine = Mechine::all();
        $data = array();
        foreach ($mechine as $row):
            $data[$row->mechine_id] = $row->nama;
        endforeach;
        return $data;
    }
}
