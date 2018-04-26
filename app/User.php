<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','lastname', 'email', 'password','level','type','is_enabled','avatar'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function isSuperAdmin(){
        return $this->level === 'admin';
    }
    public function isMember(){
      return $this->level === 'member' ;
    }
    public function isOwner(){
      return $this->level === 'parking_owner' ;
    }
    public function isGuest(){
      return $this->level === 'guest' ;
    }
}
