<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Torta extends Model
{
    use HasFactory;

    protected $fillable = ['nazov', 'zakladne_zlozenie', 'cena', 'obrazok', 'popis', 'typ_id'];

    public function typ_id()
    {
        return $this->belongsTo(TypTorty::class, 'typ_id');
    }
}
