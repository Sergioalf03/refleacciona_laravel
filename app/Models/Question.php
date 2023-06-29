<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $fillable = [
        'uid',
        'sentence',
        'popup',
        'score',
        'cond',
        'answers',
        'has_evidence',
        'indx',
        'status',
        'section_id',
        'version',
    ];
}
