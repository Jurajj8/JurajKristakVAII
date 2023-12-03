<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TypTorty;

class TypTortySeeder extends Seeder
{
    public function run()
    {
        TypTorty::create(['typ' => 'kolac']);
        TypTorty::create(['typ' => 'torta']);
    }
}
