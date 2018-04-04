<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Zizaco\Entrust\Traits\EntrustUserTrait;

class User extends Authenticatable
{
    use Notifiable;  use EntrustUserTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function schoolClass(){

        return $this->belongsTo('App\SchoolClass','class_id');
    }


    public function fee(){

        return $this->belongsTo('App\Fee','student_id');
    }

    public function section(){

        return $this->belongsTo('App\Section','section_id');


    }
}
