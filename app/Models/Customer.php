<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Customer extends BaseModel
{
    use HasFactory;

    function carts(){
        return $this->hasMany(Cart::class);
    }
}
