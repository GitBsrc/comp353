<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;
    // RELATIONSHIPS
    /**
     * Groups the user is a member of through GroupMembers.
     */
    public function member_of(){
        return $this->hasMany('App\GroupMembers');
    }
    /**
     * Each user has several messages they send.
     */
    public function messages(){
        return $this->hasMany('App\DMMessage');
    }
    /**
     * Each user can receive several messages from a DM
     * or group DM.
     */
    public function receivesDMs(){
        return $this->hasMany('App\DMRecipients');
    }
    /**
     * Each user can be a member of several events.
     */
    public function events(){
        return $this->hasMany('App\EventMembers');
    }

    public function user_type(){
        return $this->hasOne('App\UserTypes');
    }

    // VARIABLES
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'user_type_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
