<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingsTable extends Migration
{
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('hotel_id');
            $table->integer('num_people');
            $table->integer('num_children');
            $table->enum('pay_method', ['full', 'deposit'])->nullable();
            $table->string('payment_method')->nullable();
            $table->integer('total_cost');
            $table->timestamp('check_in')->nullable();
            $table->timestamp('check_out')->nullable();
            $table->string('accepted')->default('0');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('hotel_id')->references('id')->on('hotels')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('bookings');
    }
}