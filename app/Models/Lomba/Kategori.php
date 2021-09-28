<?php

namespace App\Models\Lomba;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_kategori',
        'slug_kategori',
        'body',
    ];
}
