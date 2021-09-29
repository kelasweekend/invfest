<?php

namespace App\Models\Setting;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MediaPartner extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama_media_partner',
        'image_media_partner',
    ];
}
