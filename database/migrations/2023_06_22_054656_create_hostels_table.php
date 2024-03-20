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
        Schema::create('hostels', function (Blueprint $table) {
            $table->id();
            $table->string('room_type');
            $table->string('room_desc');
            $table->string('room_img');
            $table->string('recent_publication');
            $table->string('hostel_info');
            $table->string('no_of_room');
            $table->string('seat_available');
            $table->string('security_deposite');
            $table->string('hostel_fee');
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
        Schema::dropIfExists('hostels');
    }
};
