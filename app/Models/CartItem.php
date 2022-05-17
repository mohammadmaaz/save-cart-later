<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class CartItem extends BaseModel
{
    use HasFactory;

    function cart(){
        return $this->belongsTo(Cart::class);
    }
}
