<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    use HasFactory;
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
