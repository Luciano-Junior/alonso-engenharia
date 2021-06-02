<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropostasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('propostas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cliente_id');
            $table->string('endereco_obra');
            $table->double('valor_total', 13, 2);
            $table->double('sinal', 13, 2);
            $table->integer('quantidade_parcelas');
            $table->double('valor_parcelas', 13, 2);
            $table->date('inicio_pagamento');
            $table->date('data_parcelas');
            $table->string('arquivo');
            $table->string('status');
            $table->timestamps();

            $table->foreign('cliente_id')->references('id')->on('clientes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('propostas');
    }
}
