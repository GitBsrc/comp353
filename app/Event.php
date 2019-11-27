<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    // RELATIONSHIPS
    /**
     * Each event has one type.
     */
    public function type(){
        return $this->hasOne('App\EventTypes');
    }

    /**
     * Each event can have several members.
     */
    public function members(){
        return $this->hasMany('App\EventMembers');
    }
}
