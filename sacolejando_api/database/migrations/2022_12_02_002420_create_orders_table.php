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
            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('food_id')->unsigned();
            $table->bigInteger('st_payment_id')->unsigned();
            $table->bigInteger('st_order_id')->unsigned();
            $table->string('order_price');
            $table->string('order_comment');
            $table->date('order_date');

            $table->foreign('user_id')->references('id')->on('foods')->onDelete('cascade');
            $table->foreign('food_id')->references('id')->on('categories')->onDelete('cascade');
            $table->foreign('st_payment_id')->references('id')->on('st_payments')->onDelete('cascade');
            $table->foreign('st_order_id')->references('id')->on('st_ordereds')->onDelete('cascade');


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
