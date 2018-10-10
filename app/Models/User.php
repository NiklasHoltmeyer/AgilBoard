<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    public static $rules = [
        'password'=>'required|confirmed',
        'email'=>'required|confirmed|email',
    ];

    public static $avatarRules = [
        'avatar' => 'required|image|nullable|max:1999'
    ];

    public static $avatarDir = '/uploads/avatars/';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function comments(){
        return $this->hasMany('App\Models\Comment');
    }

    public function issues(){
        return $this->hasMany('App\Models\Issue');
    }

    public function groups()
    {
        return $this->belongsToMany('App\Models\Group');
    } 

    public function avatarURL(){
        return User::$avatarDir . $this->avatar;
    }
}
