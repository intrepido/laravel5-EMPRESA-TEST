<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->increments('id');
            $table->string('direction');
            $table->enum('expertise_area', array('Back-End Developer', 'Front-End Developer', 'Marketing', 'Designer'));
            $table->timestamps();
            $table->integer('department_id')->unsigned()->nullable();
            $table->foreign('department_id')->references('id')->on('departments')->onDelete('set null');
            $table->integer('user_id')->unsigned()->unique();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('employees');
    }
}
