<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\BitacoraTrait;

class Employee extends Model
{
    use HasFactory,BitacoraTrait;

    protected $table = 'employees';
    
    protected $guarded = [
        'id',
    ];

    public function Cargo(){
        return $this->belongsTo(WorkPosition::class,'work_position_id');
    }

    public function Branch(){
        return $this->belongsTo(Branches::class,'branch_id');
    }

    public function User(){
        return $this->belongsTo(User::class,'user_id');
    }
}
