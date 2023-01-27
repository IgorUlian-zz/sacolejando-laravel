<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    var $table = 'tenants';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->table, function (Blueprint $table) {
            $table->id();
            $table->uuid( 'uuid');
            $table->string('tenant_cnpj')->unique(); //cnpj
            $table->string('url')->unique(); // url
            $table->string('tenant_name')->unique(); // name
            $table->string('tenant_email')->unique(); //email
            $table->bigInteger('plan_id')->unsigned();  // id do plano
            
            // status do restaurante
            $table->enum('active', ['Y', 'N'])->default('Y');

            //inscrição do restaurante
            $table->date('subscription')->nullable(); // data de inscrição
            $table->date('expires_at')->nullable(); // data de expiração
            $table->string('subscription_id', 255)->nullable(); // gateway de pagamento
            $table->boolean('subscription_active')->default(false); // assinatura ativa
            $table->boolean('subscription_suspended')->default(false); // assinatura suspensa
            $table->timestamps();

            $table->foreign('plan_id')->references('id')->on('plans')->onDelete('cascade');

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
