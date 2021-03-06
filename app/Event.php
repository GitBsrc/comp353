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

    /**
     * Each event has a group.
     */
    public function groups(){
        return $this->hasMany('App\Group');
    }

    public function rates(){
        return $this->hasOne('App\EventRates');
    }
}
