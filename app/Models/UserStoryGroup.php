<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class UserStoryGroup extends Model
{
    public static $rules        = ['name'  => 'min:3'];
    public static $storeRules   = ['name'  => 'required|min:3'];

    public function issues(){
        return $this->hasMany('App\Models\Issue');
    }

    public static function inputRequirementsParameter(){
        return ['name' => ''];        
    }

    public static function getAllFieldNames(){
        return ['name'];
    }

    public function group(){
        return $this->belongsTo('App\Models\Group');
    }
}
