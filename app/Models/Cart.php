<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cart extends BaseModel
{
    use HasFactory;

    function customer(){
        return $this->belongsTo(Customer::class);
    }

    function items(){
        return $this->hasMany(CartItem::class);
    }

    function itemsCount()
    {
        return $this->items()->count();
    }

    function getItemsCountAttribute()
    {
        return $this->itemsCount();
    }
}
