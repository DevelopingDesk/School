<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fee extends Model
{

	protected $fillable = ['fee','date'];
    public  function userDetail() {
        return $this->belongsTo('App\User', 'student_id');
    }
    public function schoolClass(){

        return $this->belongsTo('App\schoolClass', 'class_id');


    }

     
     public function section(){

        return $this->belongsTo('App\Section','section_id');


    }
}
