<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GroupMembers extends Model  
{

    // RELATIONSHIPS
    /**
     * Group user is a member of.
     */
    public function group(){
        return $this->belongsTo('App\Group');
    }
    
    /**
     * User who is a memeber.
     */
    public function user(){
        return $this->belongsTo('App\User');
    }

    // VARIABLES
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'group_members';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['userID', 'groupID', 'isLeader', 'joinDate', 'created_at', 'updated_at'];

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
    protected $dates = ['joinDate', 'created_at', 'updated_at'];

}
