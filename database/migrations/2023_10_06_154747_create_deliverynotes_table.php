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
        Schema::create('deliverynotes', function (Blueprint $table) {
            $table->id();
            $table->string('download');
            $table->datetime('date');
            $table->string('deliverynote');
            $table->integer('num_cliente');
            $table->integer('num_enc');
            $table->string('enc_cliente');
            $table->integer('linha_guia');
            $table->string('cod_art');
            $table->string('des_art');
            $table->integer('quantidade'); 
            $table->string('path');
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
        Schema::dropIfExists('deliverynotes');
    }
};
