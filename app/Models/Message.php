<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Auth;

class Message extends Model
{
    public static $rules = [
        'from_user_id'  => 'required',
        'to_user_id' => 'required',
        'subject' => 'required|min:3',
        'content' => 'required|min:3'
    ];

    public function fromUser(){
        return $this->belongsTo('App\Models\User', 'from_user_id');
    } 

    public function toUser(){
        return $this->belongsTo('App\Models\User', 'to_user_id');
    }

    public static function getUnreadReceiveMessagesCount($userid){
        return Message::where([['to_user_id', $userid],['read', false]])->count();
    }

    public static function getReceiveMessages($userid){
        return Message::where('to_user_id', $userid)->orderBy('id', 'DESC')->with('fromUser')->get();
    }
}

