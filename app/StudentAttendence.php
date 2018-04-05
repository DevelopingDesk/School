<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentAttendence extends Model
{
    protected $fillable = ['status','date'];
    public  function userDetail() {
        return $this->belongsTo('App\User', 'student_id');
    }
    public function schoolClass(){

        return $this->belongsTo('App\SchoolClass', 'class_id');


    }
 public function session(){

        return $this->belongsTo('App\SessionDate','session_id');


    }
     public function exam(){

        return $this->belongsTo('App\Exams','exam_id');


    }
     public function subject(){

        return $this->belongsTo('App\Subject','subject_id');


    }
     
}
