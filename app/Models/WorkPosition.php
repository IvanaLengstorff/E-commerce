<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\BitacoraTrait;

class WorkPosition extends Model
{
    use HasFactory, BitacoraTrait;
    protected $table = 'work_positions';

    protected $fillable = [
        'name',
    ];
}
