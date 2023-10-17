<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $table = 'transactions';
    
    protected $guarded = [
        'id',
    ];

    public function Employee(){
        return $this->belongsTo(Employee::class,'employee_id');
    }

    public function PaymentMethod(){
        return $this->belongsTo(PaymentMethod::class,'payment_method_id');
    }

    public function Branch(){
        return $this->belongsTo(Branches::class,'branch_id');
    }
}
