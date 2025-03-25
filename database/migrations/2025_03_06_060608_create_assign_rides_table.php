<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssignRidesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assign_rides', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('chauffer_id');
            $tabel->foreign('chauffer_id')->referneces('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('booking_id');
            $tabel->foreign('booking_id')->referneces('id')->on('bookings')->onDelete('cascade');
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
        Schema::dropIfExists('assign_rides');
    }
}
