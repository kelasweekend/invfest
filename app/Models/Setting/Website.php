<?php

namespace App\Models\Setting;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Website extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'heading',
        'deskripsi',
        'nomor',
        'email',
        'maintenance',
        'pengumpulan',
        'logo_atas',
        'logo_bawah',
    ];
}
