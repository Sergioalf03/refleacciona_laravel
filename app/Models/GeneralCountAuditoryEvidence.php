<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GeneralCountAuditoryEvidence extends Model
{
    use HasFactory;

    protected $table = 'general_count_auditory_evidence';

    protected $fillable = [
        'dir',
        'creation_date',
        'gc_auditory_id',
    ];
}
