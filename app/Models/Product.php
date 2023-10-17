<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Traits\BitacoraTrait;

class Product extends Model
{
    use HasFactory,BitacoraTrait;
    protected $table = 'products';
    
    protected $guarded = [
        'id',
    ];

    public function Brand(){
        return $this->BelongsTo(Brands::class,'brand_id');
    }
    
    public function Subcategory(){
        return $this->BelongsTo(Subcategory::class,'subcategory_id');
    }
}
