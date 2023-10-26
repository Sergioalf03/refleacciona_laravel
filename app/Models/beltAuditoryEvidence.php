<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class beltAuditoryEvidence extends Model
{
    use HasFactory;

    protected $table = 'belt_auditory_evidence';

    protected $fillable = [
        'dir',
        'creation_date',
        'belt_auditory_id',
    ];
}
