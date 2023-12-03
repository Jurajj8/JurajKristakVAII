<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTypyTortyTable extends Migration
{
    public function up()
    {
        Schema::create('typy_torty', function (Blueprint $table) {
            $table->id();
            $table->string('typ');
            // Další sloupce podle potřeby
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('typy_torty');
    }
}
