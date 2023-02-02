<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class pertanyaan extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'nama',
        'kategori'
    ];

    public function kat(){
        return $this->belongsTo(kategori::class, 'kategori', 'id');
    }
}
