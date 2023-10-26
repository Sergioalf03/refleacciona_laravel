<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class beltAuditory extends Model
{
    use HasFactory;

    protected $table = 'belt_auditory';

    protected $fillable = [
        'title',
        'description',
        'close_note',
        'date',
        'time',
        'lat',
        'lng',
        'status',
        'belt_auditory_id',
        'creation_date',
        'update_date',
        'external_id',
        'user_id',
    ];
}
