<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserStoryGroup;
use App\Models\Group;
use App\Models\Issue;
use App\Models\Message;
use Auth;
use Validator;

class BoardController extends Controller
{  
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($groupid)
    {
        $userStoryGroups = UserStoryGroup::where('group_id', $groupid)->get();
        $group = Group::where('id', $groupid)->first();
        
        return view('board.index') 
                    ->withuserStoryGroups($userStoryGroups)
                    ->withGroup($group)
                    ->withMessageCount(Message::getUnreadReceiveMessagesCount(Auth::id()));                    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//
        $validator = Validator::make($request->all(), UserStoryGroup::$storeRules);

        if($validator->fails()){
            return back()->withErrors($validator)->withInput();
        }
        
        $userStoryGroup = new UserStoryGroup;
        forEach(userStoryGroup::getAllFieldNames() as $usgFields){
            if($request->has($usgFields)){
                $userStoryGroup[$usgFields] = $request->input($usgFields);
            }
        }
        $userStoryGroup->group_id = $request->input('groupid');

        $userStoryGroup->save();

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), UserStoryGroup::$rules);

        if($validator->fails()){
            return back()->withErrors($validator)->withInput();
        }

        $validator = $this->validate($request, UserStoryGroup::inputRequirementsParameter());    
        $newName = $request->input('name');        
        $id = ($id < 0)? $request->input('usgID') : $id;

        $userstorygroup = UserStoryGroup::where('id', $id)->first();
        
        if($userstorygroup){
            $userstorygroup->name = $newName;
            $userstorygroup->save();
        }

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $usg = UserStoryGroup::where('id', $id)->first();
        if($usg) $usg->delete();

        return back();        
    }

    public function changeBoard(Request $request){
        $issueID =  $request->input('issueid');
        $boardID =  $request->input('boardid');

        if($issueID && $boardID){
            $issue = Issue::where('id', $issueID)->first();
            if($issue && UserStoryGroup::where('id', $boardID)->first()){
                $issue->user_story_group_id = $boardID;
                $issue->save();
            }
        }
        return back();
    }
}
/*
    {!! Form::text('issueid', '', ['id' => 'issueid']) !!}
    {!! Form::text('boardid', '', ['id' => 'boardid']) !!}

*/
