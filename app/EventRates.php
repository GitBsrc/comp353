<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventRates extends Model
{
    // RELATIONSHIPS
    /**
     * Each type can be assigned to several Events.
     */
    public function event(){
        return $this->hasMany('App\Event');
    }
}
