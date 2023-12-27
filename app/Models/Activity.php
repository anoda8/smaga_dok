<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;

    protected $fillable = [
        "uuid",
        "post_id",
        "user_id",
        "start_date",
        "end_date",
        "activity",
        "rating",
        "public",
        "status",
        "jenis_surat",
        "nomor_surat",
        "hyperlink_surat",
    ];
}
