<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Salery extends Model
{
      public  function userDetail() {
        return $this->belongsTo('App\User', 'user_id');
    }
}
