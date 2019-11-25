<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class dmmessage extends Model
{
    // RELATIONSHIPS
    /**
     * Each Message belongs to a single user.
     */
    public function user(){
        return $this->belongsTo('App\User');
    }
    /**
     * Each message has one or many recipients.
     */
    public function recipients(){
        return $this->hasMany('App\DMRecipients');
    }
}
