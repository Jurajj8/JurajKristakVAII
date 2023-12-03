<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTortasTable extends Migration
{
    public function up()
{
    Schema::create('tortas', function (Blueprint $table) {
        $table->id();
        $table->string('nazov');
        $table->string('zakladne_zlozenie');
        $table->decimal('cena', 8, 2);
        $table->string('obrazok')->nullable();
        $table->text('popis')->nullable();
        $table->unsignedBigInteger('typ_id')->nullable();
        $table->foreign('typ_id')->references('id')->on('typy_torty')->onDelete('SET NULL');
        $table->timestamps();
    });
}


    public function down()
    {
        Schema::dropIfExists('tortas');
    }
}
