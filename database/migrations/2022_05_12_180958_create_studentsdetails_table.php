<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsdetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('studentsdetails', function (Blueprint $table) {
            $table->id();
            $table->string('firstName');
            $table->string('lastName');
            $table->integer('number');
            $table->string('email');
            $table->string('fatherName');
            $table->integer('fatherNumber');
            $table->string('fatherEmail');
            $table->string('motherName');
            $table->integer('motherNumber');
            $table->string('motherEmail');
            $table->string('class_name');
            $table->year('year');
            $table->integer('verified');
            $table->string('course_name');
            $table->string('subject_name');
            $table->integer('subject_id');
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
        Schema::dropIfExists('studentsdetails');
    }
}
