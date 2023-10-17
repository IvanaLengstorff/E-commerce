<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\BitacoraTrait;

class Brands extends Model
{
    use HasFactory, BitacoraTrait;

    protected $table = 'brands';

    protected $fillable = [
        'name',
    ];
}
