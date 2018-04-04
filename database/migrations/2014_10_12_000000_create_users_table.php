<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('father_name')->nullable();
            $table->string('father_cnic')->nullable();
            $table->string('student_cnic')->nullable();
            $table->string('religen')->nullable();
            $table->integer('class_id')->unsigned();
            $table->integer('section_id')->unsigned();
            $table->integer('session_id')->unsigned();

             $table->foreign('session_id')->references('id')->on('session_dates')
                ->onUpdate('cascade')->onDelete('cascade');
               
            
            $table->foreign('class_id')->references('id')->on('school_classes')
                ->onUpdate('cascade')->onDelete('cascade');
               
                 $table->foreign('section_id')->references('id')->on('sections')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->integer('user_type')->nullable();
            $table->string('image')->nullable();

            $table->string('email')->unique();
            $table->string('password');
            $table->string('status')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
