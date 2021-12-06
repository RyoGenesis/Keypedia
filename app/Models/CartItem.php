<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    use HasFactory;
    protected $table = "cart_items";
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function keyboard(){
        return $this->belongsTo(Keyboard::class);
    }
}
