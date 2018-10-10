<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    public static $rules = [
        'name'  => 'min:3',
        'User-Email' => 'email'
    ];
    public static $storeRules = [
        'name'  => 'required|min:3'
    ];

    public function users()
    {
        return $this->belongsToMany('App\Models\User');
    } 

    public static function getAllFieldNames(){
        return  ['name'];
    }

    public function userstorygroups(){
        return $this->hasMany('App\Models\UserStoryGroup');
    }
    
}
