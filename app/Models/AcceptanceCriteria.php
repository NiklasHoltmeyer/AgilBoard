<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AcceptanceCriteria extends Model
{
    public static $rules = [
        'precondition'  => 'min:3',
        'action' => 'min:3',
        'result' => 'min:3'
    ];

    public function issue(){
        return $this->belongsTo('App\Models\Issue');
    }

    public static function getAllFieldNames(){
        return ['issue_id','precondition','action','result'];
    }
}
