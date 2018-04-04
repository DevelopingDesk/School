<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExamRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exam_records', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('marks')->nullable();
            $table->integer('total');
            $table->integer('class_id')->unsigned();
            $table->integer('student_id')->unsigned();
            $table->integer('teacher_id')->unsigned();
$table->foreign('class_id')->references('id')->on('school_classes')
                ->onUpdate('cascade')->onDelete('cascade');
$table->foreign('student_id')->references('id')->on('users')
                ->onUpdate('cascade')->onDelete('cascade');
                $table->foreign('teacher_id')->references('id')->on('users')
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
        Schema::dropIfExists('exam_records');
    }
}
