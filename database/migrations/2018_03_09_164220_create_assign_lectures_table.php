<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAssignLecturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assign_lectures', function (Blueprint $table) {
            $table->increments('id');
             $table->integer('section_id')->unsigned();
            $table->integer('subject_id')->unsigned();
            $table->integer('teacher_id')->unsigned();
            $table->integer('class_id')->unsigned();
            $table->integer('time');
$table->foreign('section_id')->references('id')->on('sections')
                ->onUpdate('cascade')->onDelete('cascade');
                $table->foreign('teacher_id')->references('id')->on('users')
                ->onUpdate('cascade')->onDelete('cascade');
                $table->foreign('subject_id')->references('id')->on('subjects')
                ->onUpdate('cascade')->onDelete('cascade');
                $table->foreign('class_id')->references('id')->on('school_classes')
                ->onUpdate('cascade')->onDelete('cascade');
                  $table->integer('session_id')->unsigned();
                
             $table->foreign('session_id')->references('id')->on('session_dates')
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
        Schema::dropIfExists('assign_lectures');
    }
}
