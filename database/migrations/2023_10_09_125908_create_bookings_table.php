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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            // neme
            $table->string('name')->nullable();

            // date
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();

            // address
            $table->text('address')->nullable();
            $table->string('city')->nullable();
            $table->string('zip')->nullable();

            // status
            $table->string('status')->default('pending');

            // payment
            $table->string('payment_method')->default('midtrans');
            $table->string('payment_status')->default('panding');
            $table->string('payment_url')->nullable();

            // relation table item and user
            $table->foreignId('item_id')->constrained();
            $table->foreignId('user_id')->constrained();

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
        Schema::dropIfExists('bookings');
    }
};
