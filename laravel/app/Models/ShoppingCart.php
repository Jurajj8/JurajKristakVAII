<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShoppingCart extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'torta_id', 'quantity'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function torta()
    {
        return $this->belongsTo(Torta::class);
    }
}
