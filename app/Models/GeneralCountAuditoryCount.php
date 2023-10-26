<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GeneralCountAuditoryCount extends Model
{
    use HasFactory;

    protected $table = 'general_count_auditory_counts';

    protected $fillable = [
        'origin',
        'destination',
        'vehicle_type',
        'creation_date',
        'general_count_auditory_id',
    ];
}
