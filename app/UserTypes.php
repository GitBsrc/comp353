<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserTypes extends Model
{
    public function member(){
        return $this->hasMany('App\User');
    }
}
