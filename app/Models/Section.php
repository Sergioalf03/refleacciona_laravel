<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;

    protected $fillable = [
        'uid',
        'name',
        'subname',
        'page',
        'indx',
        'status',
        'version',
    ];
}
