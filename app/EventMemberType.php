<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventMemberType extends Model
{
    // RELATIONSHIPS
    /**
     * Each member type can be assigned to several members.
     */
    public function member(){
        return $this->hasMany('App\EventMembers');
    }
}
