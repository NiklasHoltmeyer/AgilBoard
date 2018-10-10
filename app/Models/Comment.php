<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public static $rules = [
        'content'         => 'required'
    ];
    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    public function issue(){
        return $this->belongsTo('App\Models\Issue');
    }
}
