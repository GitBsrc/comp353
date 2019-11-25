<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class constraints extends Model
{
    // RELATIONSHIPS
    /**
     * Constraints belong to multiple posts.
     */
    public function posts(){
        return $this->hasMany('App\Posts');
    }
}
