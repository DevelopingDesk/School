<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddExamidToexamrecord extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         
       Schema::table('exam_records', function($table) {
       $table->integer('exam_id')->unsigned();
       $table->integer('subject_id')->unsigned();
       $table->string('date');
       
$table->foreign('exam_id')->references('id')->on('exams')
                ->onUpdate('cascade')->onDelete('cascade');
                $table->foreign('subject_id')->references('id')->on('subjects')
                ->onUpdate('cascade')->onDelete('cascade');
    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        
         Schema::table('exam_id', function($table) {
       
    });
    }
}
