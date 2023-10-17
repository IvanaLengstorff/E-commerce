<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\BitacoraTrait;

class Category extends Model
{
    use HasFactory, BitacoraTrait;
    protected $table = 'categories';
    
    protected $fillable = [
        'name',
    ];
}
