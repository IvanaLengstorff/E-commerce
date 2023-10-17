<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\BitacoraTrait;

class Subcategory extends Model
{
    use HasFactory,BitacoraTrait;
    protected $table = 'subcategories';
    
    protected $guarded = [
        'id',
    ];
}
