<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

use App\Models\Comment;
use App\Models\User;
use App\Models\Issue;
use Validator;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $validator = Validator::make($request->all(), Comment::$rules);

        if($validator->fails()){
            return back()->withErrors($validator)->withInput();
        }

        $comment = new Comment;
        $comment->content = $request->input('content');
        $comment->user_id = Auth::id();  
        $comment->issue_id = $request->input('issue_id');
        
        // /remove spend
        // /remove 
        
        if(strpos($comment, '/remove spend') !== false){
            $issue = Issue::where('id', $comment->issue_id)->first();
            $issue->timeSpend = 0;
            $issue->save();
        }else if(strpos($comment, '/spend ') !== false){
            $issue = Issue::where('id', $comment->issue_id)->first();
            $time = $this->calculateTime($comment, 'spend');
            $issue->timeSpend += $time;
            $issue->save();
        }
        if(strpos($comment, '/remove estimated') !== false){
            $time = 0;
            $issue = Issue::where('id', $comment->issue_id)->first();
            $issue->estimatedTime = $time;
            $issue->save();
        }else if(strpos($comment, '/estimated ') !== false){
            $issue = Issue::where('id', $comment->issue_id)->first();
            $time = $this->calculateTime($comment, 'estimated');
            $issue->estimatedTime = $time;
            $issue->save();
        }
        
        $comment->save();
        
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
        //
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


    private function calculateTime($_string, $triggerName){
        $pattern = '/\/'.$triggerName.'[(\s)*(\d)+(h|d|w|m){0}]+/';
        $groupMatches = [];
        $time = 0;
        $_string .= " 0d"; 
        preg_match_all($pattern, $_string, $groupMatches);            
        $pattern = '/(\d)+(w|d|h|m){1,1}/';

        foreach($groupMatches as $groupMatch){
            foreach($groupMatch as $match){
                $match = strtolower(str_replace(' ', '', str_replace('/'.$triggerName, '', $match)));
                $_match = [];
                preg_match_all($pattern, $match, $_match);     
                for($i = 0; $i < count($_match[1]); ++$i){       

                    $_match[1][$i] = intval($_match[1][$i]);
                    if($_match[2][$i] === 'w'){
                        $time += $_match[1][$i] * 10080 ;
                    }else if($_match[2][$i] === 'd'){
                        $time += $_match[1][$i] * 1440 ;
                    }else if($_match[2][$i] === 'h'){
                        $time += $_match[1][$i] * 60 ;
                    }else if($_match[2][$i] === 'm'){
                        $time += $_match[1][$i];
                    }
                }
                
            }
        }

        return $time;
    }
}
