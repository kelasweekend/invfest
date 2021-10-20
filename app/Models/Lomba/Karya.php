<?php

namespace App\Models\Lomba;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Karya extends Model
{
    use HasFactory;
    protected $fillable = [
        'invoice',
        'link_karya',
    ];
}
