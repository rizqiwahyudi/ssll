<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class kategori extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'nama',
        'prioritas'
    ];
    
    public function pertanyaans()
    {
        return $this->hasMany(pertanyaan::class, 'kategori');
    }
}
