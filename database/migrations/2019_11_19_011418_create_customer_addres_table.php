<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomerAddresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_addres', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('street');
            $table->string('interiorNumber')->nullable();
            $table->string('outdoorNumber');
            $table->string('references')->nullable();
            $table->string('postalCode')->nullable();
            $table->string('colonia');
            $table->string('city');
            $table->string('state');
            $table->string('country');
            $table->unsignedInteger('customer_id');
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
        Schema::dropIfExists('customer_addres');
    }
}
