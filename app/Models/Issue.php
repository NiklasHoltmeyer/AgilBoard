<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Issue extends Model
{
    public static $rules = [
        'name'  => 'min:3',
        'priority' => 'numeric|between:0, 100',
        'risk' => 'numeric|min:0|max:100',//'between:0, 100',
        'storyPoints' => 'numeric|between:0, 100',
        'timeSpend' => 'numeric|min:0',
        'estimatedTime' => 'numeric|min:0'
    ];

    public static $storeRules = [
        'issueName'         => 'required',
        'userstorygroupid'  => 'required'
    ];

    public function comments(){
        return $this->hasMany('App\Models\Comment');
    }

    public function acceptancecriteria(){
        return $this->hasMany('App\Models\AcceptanceCriteria');
    }

    public function creator(){
        return $this->belongsTo('App\Models\User');
    }

    public function userstorygroup(){
        return $this->belongsTo('App\Models\UserStoryGroup');
    }

    public static function getAllFieldNames(){
        return ['name', 'descrption', 'priority', 'risk', 'storyPoints',
                'timeSpend', 'estimatedTime', 'closeDate', 'user_story_group_id',
                'creator_user_id', 'created_at', 'updated_at', 'due_date'];
    }
}
