<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Auditory extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'close_note',
        'date',
        'time',
        'lat',
        'lng',
        'status',
        'creation_date',
        'update_date',
        'external_id',
        'user_id',
    ];
}
