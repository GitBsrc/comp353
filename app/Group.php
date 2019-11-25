<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model  
{
    // RELATIONSHIPS
    /**
     * Members that belong to the group.
     */
    public function members() {
        return $this->hasMany('App\GroupMembers');
    }

    /**
     * Each group has several direct message sub-groups.
     */
    public function recipients(){
        return $this->hasMany('App\DMRecipients');
    }

    /**
     * Each group has several posts.
     */
    public function posts(){
        return $this->hasMany('App\Posts');
    }

    // VARIABLES
    /** 
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'group';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['groupID', 'groupName', 'groupDescription', 'groupIsPublic', 'created_at', 'updated_at'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['created_at', 'updated_at'];

}
