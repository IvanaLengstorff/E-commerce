<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\BitacoraTrait;

class PaymentMethod extends Model
{
    use HasFactory,BitacoraTrait;
    protected $table = 'payment_methods';
    
    protected $fillable = [
        'name',
    ];
}
