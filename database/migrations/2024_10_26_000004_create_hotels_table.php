<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHotelsTable extends Migration
{
    public function up()
    {
        Schema::create('hotels', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('city');
            $table->string('country');
            $table->text('description');
            $table->date('check_in_date');
            $table->integer('price');
            $table->integer('num_guest');
            $table->string('image1')->nullable();
            $table->string('image2')->nullable();
            $table->string('image3')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->unsignedBigInteger('owner_id')->nullable();
            $table->boolean('admin_accepted')->default(0);

            $table->foreign('owner_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('hotels');
    }
}