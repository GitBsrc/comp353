<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    /**
     * Each post belongs to a single group.
     */
    public function group(){
        return $this->belongsToMany('App\Group');
    }

    /**
     * Each post can belong a single event.
     */
    public function event(){
        return $this->belongsTo('App\Event');
    }
    
    public function getImageAttribute()
    {
       return $this->post_image;
    }
}

