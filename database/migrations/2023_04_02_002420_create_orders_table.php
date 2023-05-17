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
            $table->string('identify')->unique();
            $table->integer('client_id')->nullable();
            $table->enum('order_status', ['Aprovado', 'Cancelado', 'Aguardando', 'Produzindo', 'Rota de Entrega', 'Finalizado'])->default('Aguardando');
            $table->double('total', 10,2);
            $table->string('order_comment');
            $table->timestamps();

            $table->foreign('tenant_id')->references('id')->on('tenants')->onDelete('cascade');
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
