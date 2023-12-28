<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GalleryFile extends Model
{
    use HasFactory;

    protected $fillable = [
        "activity_id",
        "post_id",
        "photo_url",
        "size",
        "sampul",
    ];
}
