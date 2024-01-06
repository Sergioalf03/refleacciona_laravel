<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GeneralCountAuditoryCount extends Model
{
    use HasFactory;

    protected $table = 'general_count_auditory_counts';

    protected $fillable = [
        'count1',
        'count2',
        'count3',
        'count4',
        'count5',
        'count6',
        'count7',
        'count8',
        'count9',
        'count10',
        'count11',
        'count12',
        'creation_date',
        'general_count_auditory_id',
    ];
}
