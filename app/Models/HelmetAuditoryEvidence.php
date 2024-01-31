<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HelmetAuditoryEvidence extends Model
{
    use HasFactory;

    protected $table = 'helmet_auditory_evidence';

    protected $fillable = [
        'dir',
        'creation_date',
        'helmet_auditory_id',
    ];
}
