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
        Schema::create('admin_courses', function (Blueprint $table) {
            $table->id();
            $table->string('course_name');
            $table->string('course_desc');
            $table->string('duration');
            $table->string('adminssion_criteria');
            $table->string('eligibility');
            $table->string('course_fee');
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
        Schema::dropIfExists('admin_courses');
    }
};
