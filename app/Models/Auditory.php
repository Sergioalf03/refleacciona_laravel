<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Auditory extends Model
{
    use HasFactory;

    protected $fillable = [
        'date',
        'street',
        'street_type',
        'street_way',
        'lat',
        'lng',
        'status',
        'user_id',
    ];
}
