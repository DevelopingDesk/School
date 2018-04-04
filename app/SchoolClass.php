<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SchoolClass extends Model
{
  public  function user() {
        return $this->hasMany('App\User', 'class_id');
    }
}
