<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('imoveis', function (Blueprint $table) {
            $table->id()->startingValue(1000);
            $table->string('titulo');
            $table->integer('motivo');
            $table->integer('visibility');
            $table->bigInteger('valor');
            $table->string('endereco',256)->nullable();
            $table->text('googlemaps',7000)->nullable();
            $table->string('descricao',1500)->nullable();
            $table->integer('quarto');
            $table->integer('banheiro');
            $table->integer('suite');
            $table->integer('garagem');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('imoveis');
    }
};
