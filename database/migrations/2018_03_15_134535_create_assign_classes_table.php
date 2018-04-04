<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAssignClassesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assign_classes', function (Blueprint $table) {
            $table->increments('id');

             $table->integer('student_id')->unsigned();
            $table->integer('class_id')->unsigned();
             $table->integer('session_id')->unsigned();
             $table->integer('section_id')->unsigned();

              $table->foreign('student_id')->references('id')->on('users')
                ->onUpdate('cascade')->onDelete('cascade');
                $table->foreign('class_id')->references('id')->on('school_classes')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->foreign('session_id')->references('id')->on('session_dates')
                ->onUpdate('cascade')->onDelete('cascade');
                 $table->foreign('section_id')->references('id')->on('sections')
                ->onUpdate('cascade')->onDelete('cascade');

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
        Schema::dropIfExists('assign_classes');
    }
}
