<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AuditoryEvidence extends Model
{
    use HasFactory;

    protected $fillable = [
        'dir',
        'creation_date',
        'auditory_id',
    ];
}
