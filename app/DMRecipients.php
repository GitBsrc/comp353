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
        return $this->belongsTo('App\DMMessage', 'message_id');
    }

    /**
     * Each exchange has one to many senders.
     */
    public function senders(){
        return $this->belongsTo('App\User', 'recipient');
    }

    protected $table = 'dm_recipients';
}
