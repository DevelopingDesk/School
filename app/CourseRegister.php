<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CourseRegister extends Model
{
      public function Subject(){

        return $this->belongsTo('App\Subject','subject_id');
    }

     public function schoolClass(){

        return $this->belongsTo('App\schoolClass', 'class_id');


    }
     public  function userDetail() {
        return $this->belongsTo('App\User', 'student_id');
    }

     public function session(){

        return $this->belongsTo('App\SessionDate','session_id');


    }
}
