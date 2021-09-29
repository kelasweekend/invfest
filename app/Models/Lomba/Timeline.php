<?php

namespace App\Models\Lomba;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Timeline extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama_timeline',
        'deskripsi',
        'tanggal',
    ];
}
