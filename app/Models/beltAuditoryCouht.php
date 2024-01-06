<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class beltAuditoryCouht extends Model
{
    use HasFactory;

    protected $table = 'belt_auditory_counts';

    protected $fillable = [
        'origin',
        'destination',
        'adults_count',
        'belts_count',
        'child_count',
        'chairs_count',
        'coopilot',
        'overuse_count',
        'vehicle_type',
        'creation_date',
        'belt_auditory_id',
    ];
}
