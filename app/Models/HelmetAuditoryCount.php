<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HelmetAuditoryCount extends Model
{
    use HasFactory;

    protected $table = 'helmet_auditory_count';

    protected $fillable = [
        'origin',
        'destination',
        'users_count',
        'helmets_count',
        'creation_date',
        'helmet_auditory_id',
    ];
}
