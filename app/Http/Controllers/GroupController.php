<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Group;
use App\Models\User;
use App\Models\Message;
use Auth;
use Validator;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $groups = $user->load('groups')->groups;

        return view('group.index')
            ->withgroups($groups) 
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
    public function store(Request $request){
        $validator = Validator::make($request->all(), Group::$storeRules);

        if($validator->fails()){         
            return back()->withErrors($validator)->withInput();
        }

        $group = new Group;
        $group->name = $request->input('name');
        $group->save();

        $group->users()->attach(Auth::id());        
        $group->save();

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
        $group = Group::with('users')->where('id', $id)->first();
        return view('group.show')
                    ->with('group', $group)
                    ->withMessageCount(Message::getUnreadReceiveMessagesCount(Auth::id()));
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
        $validator = Validator::make($request->all(), Group::$rules);
        
        if($validator->fails()){
            return back()->withErrors($validator)->withInput();
        }

        $id = ($id < 0) ? $request->input('id') : $id;
        
        $group = Group::where('id', $id)->first();

        if($group){
            forEach(Group::getAllFieldNames() as $issueField){
                if($request->has($issueField)){
                    $group[$issueField] = $request->input($issueField);
                }   
            }

            $group->save();
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
        $group = Group::where('id', $id)->first();
        $group->delete();
        return back();
    }

    public function removeUser($id, $userid){
        $group = Group::where('id', $id)->first();
        $group->users()->detach($userid);
        $group->save();
        return back();
    }

    public function addUser(Request $request,$id){
        $validator = Validator::make($request->all(), Group::$rules);
        
        if($validator->fails()){
            return back()->withErrors($validator)->withInput();
        }

        $user = User::where('email', $request->input('User-Email'))->first();
        $group = Group::where('id', $id)->first();
        
        if($user && $group){           
            $userID = $user['id'];
            if($group->users->contains($userID)){
                $validator->errors()->add('User-Email', 'User already in Group.');
                return back()->withErrors($validator)->withInput();
            }else{                
                $group->users()->attach($userID);
                $group->save(); 
            }           
            
        }else{
            $validator->errors()->add('User-Email', 'Unkown Email');
            return back()->withErrors($validator)->withInput();
        }
        
        return back();
    }
}

