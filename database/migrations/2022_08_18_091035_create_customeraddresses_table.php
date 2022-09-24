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
        Schema::create('customeraddresses', function (Blueprint $table) {
            $table->bigIncrements('id')->primary;
            $table->string('customer_id');
            $table->string('name');
            $table->string('country');
            $table->string('state');
            $table->string('city');
            $table->string('street_add');
            $table->string('date');
            $table->string('phone');
            $table->string('email');
            $table->string('order_notes');
            $table->softDeletes();
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
        Schema::dropIfExists('customeraddresses');
    }
};
