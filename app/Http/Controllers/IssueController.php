<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Validator;

use Carbon\Carbon;

use App\Models\Issue;
use App\Models\User;
use App\Models\UserStoryGroup;
use App\Models\Group;
use App\Models\Message;
use App\Http\Middleware\GroupMiddleware;

class IssueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($groupid)
    {
        $userstoryGroups = UserStoryGroup::where('group_id', $groupid)
                            ->with('issues')
                            ->get();       

        $group = Group::where('id', $groupid)->first();
        
        return view('issue.index')
                    ->withuserStoryGroups($userstoryGroups)
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
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {        
        $validator = Validator::make($request->all(), Issue::$storeRules);

        if($validator->fails()){
            $validator->getMessageBag()->add('usgID', $request->input('userstorygroupid'));
            return back()->withErrors($validator)->withInput();
        }

        $issue = new Issue;
        $issue->name = $request->input('issueName');
        $issue->user_story_group_id = $request->input('userstorygroupid');
        $issue->creator_user_id = Auth::id();        
        $issue->save();
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){
        $userstory = Issue::with('comments','acceptancecriteria')->where('id', $id)->first();
        
        $userStoryGroup = UserStoryGroup::where('id', $userstory['user_story_group_id'])->with('group')->first();
        $group = $userStoryGroup['group'];

        $middleWare = new GroupMiddleware; 
        $canAccess = $group && $middleWare->isUserPartOfGroup($group->id);

        if(!$canAccess) return redirect(GroupMiddleware::$errorPage);

        if($userstory){
            $user = User::where('id', $userstory['creator_user_id'])->first(); // <- geht nicht ueber with!?
            $userstory['creator'] = $user ? $user->pluck('name')->first() : '/';

            if($userstory['comments']){
                foreach($userstory['comments'] as $comment){
                    $comment->load('user');                    
                }
            }
        }else{
            $id = -1;
        }


       //echo($userstory);
        return view('issue.show')
                    -> with('userstory', $userstory) 
                    -> with('id', $id)
                    -> withGroup($group)
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
        if($request->has('due_date')){            
            $time = new Carbon($request->input('due_date'));
            $request->merge(['due_date' => $time]);
        } 

        $validator = Validator::make($request->all(), Issue::$rules);

        if($validator->fails()){
            return back()->withErrors($validator)->withInput();
        }

        $issue = Issue::where('id', $id)->first();	

        if($issue){
            forEach(Issue::getAllFieldNames() as $issueField){
                if($request->has($issueField)){
                    $issue[$issueField] = $request->input($issueField);
                }   
            }

            $issue->save();
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
        $issue = Issue::where('id', $id)->first();
        $issue->delete();
        return back();
    }
}
