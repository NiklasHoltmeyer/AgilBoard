<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Message;
use Auth;
use Validator;
use Image;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::with('groups')->get();
        return $users;
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
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $currentUserID = Auth::id();

        $isSelf = (string)$currentUserID === $id;

        $user = User::where('id', $id)
                        ->with('groups')
                        ->first(); 

        return view('user.show')
                        ->withisSelf($isSelf)
                        ->withuser($user)
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function updateAvatar(Request $request){       
        //$validator = Validator::make($request->all(), User::$avatarRules);        
        /*
        if($validator->fails()){
            return back()->withErrors($validator)->withInput();
        }
        */

        if($request->hasFile('avatar')){
            $user = Auth::user();

            $avatar = $request->file('avatar');
            $filename = $user['name'] . '.' . time() . '.' . $avatar->getClientOriginalExtension();
            $result = Image::make($avatar)->resize(100, 100)->save(public_path(User::$avatarDir . $filename));
            
            $user->avatar = $filename;
            $user->save();
        }else{
            return back()->with('avatarError','fileError');
        }
        return back();

    }


}
