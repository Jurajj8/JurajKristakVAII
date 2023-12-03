<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypTorty extends Model
{
    use HasFactory;

    protected $table = 'typy_torty';

    protected $fillable = [
        'typ',
    ];
}
