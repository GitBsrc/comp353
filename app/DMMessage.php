<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DMMessage extends Model
{
   
    // RELATIONSHIPS
    /**
     * Each Message belongs to a single user.
     */
    public function user(){
        return $this->belongsTo('App\User', 'sender');
    }
    /**
     * Each message has one or many recipients.
     */
    public function recipients(){
        return $this->hasMany('App\DMRecipients');
    }

    protected $table = 'dm_messages';
}
