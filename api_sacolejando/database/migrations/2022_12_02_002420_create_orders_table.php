<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    var $table = 'orders';
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->table, function (Blueprint $table) {
            $table->id();
            $table->bigInteger('tenant_id')->unsigned();
            $table->enum('order_pagament', ['Aprovado', 'Recusado', 'Cancelado', 'Aguardando Pagamento'])->default('Aguardando Pagamento');
            $table->enum('order_status', ['Aprovado', 'Cancelado', 'Aguardando'])->default('Aguardando');
            $table->string('order_price');
            $table->string('order_comment');
            $table->date('order_date');

            $table->foreign('tenant_id')->references('id')->on('tenants')->onDelete('cascade');
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
        Schema::dropIfExists($this->table);
    }
};
