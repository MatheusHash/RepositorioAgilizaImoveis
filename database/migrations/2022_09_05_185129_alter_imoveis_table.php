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
        Schema::table('imoveis', function (Blueprint $table) {
            $table->foreignId('bairro_id')->nullable()->nullOnDelete()->constrained('bairros')->change();
            $table->foreignId('municipio_id')->nullable()->nullOnDelete()->constrained('municipios')->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $table->dropForeign(['bairro_id']);
        $table->dropForeign(['municipio_id']);


    }
};
