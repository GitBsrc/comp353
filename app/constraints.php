<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Constraints extends Model
{
    // RELATIONSHIPS
    /**
     * Constraints belong to multiple posts.
     */
    public function posts(){
        return $this->hasMany('App\Posts');
    }

    public $timestamps = false;
}
