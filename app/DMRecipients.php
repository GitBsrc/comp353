<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DMRecipients extends Model
{
    // RELATIONSHIPS
    /**
     * Each recipient gets several messages.
     */
    public function messages(){
        return $this->hasMany('App\DMMessage');
    }
    
    /**
     * Each exchange is part of a single group.
     */
    public function group(){
        return $this->belongsTo('App\Group');
    }

    /**
     * Each exchange has one to many senders.
     */
    public function senders(){
        return $this->hasMany('App\User');
    }
}
