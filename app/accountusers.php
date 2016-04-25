<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Routing\Controller as BaseController;

class accountusers extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
       
   protected $fillable = array(
         'email','username', 'password','password-again','code','active'
    );

 protected $table='accountuser';
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
