<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailTransaction extends Model
{
    use HasFactory;
    protected $table = "transaction_details";
    public function keyboard(){
        return $this->belongsTo(Keyboard::class)->withTrashed();
    }
    public function transaction(){
        return $this->belongsTo(Transaction::class);
    }
}
