<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Keyboard extends Model
{
    use HasFactory,SoftDeletes;
    protected $table = "keyboards";
    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function cart(){
        return $this->hasMany(CartItem::class);
    }
    public function detailTransaction(){
        return $this->hasMany(DetailTransaction::class);
    }
}
