<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventMembers extends Model
{
    // RELATIONSHIPS
    /**
     * Event the user is a part of.
     */
    public function event(){
        return $this->belongsTo('App\Event');
    }

    /**
     * User who is a member of the event.
     */
    public function user(){
        return $this->belongsTo('App\User');
    }

    /**
     * Each event member is of one type.
     */
    public function member_type(){
        return $this->hasOne('App\EventMemberType');
    }

}
