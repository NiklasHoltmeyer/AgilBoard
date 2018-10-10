<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use App\Models\User;
use Auth;
use Validator;


class MessagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $messages = Message::getReceiveMessages(Auth::id());
        $messageCount = count($messages);
        return view('message.index')
                        ->withMessages($messages)
                        ->withMessageCount($messageCount);                        
        //subject
        //content
        //read
        //from_user => name, avatar
        //return $messages;
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
        $request->merge(array('from_user_id' => Auth::id()));

        $validator = Validator::make($request->all(), Message::$rules);

        if($validator->fails()){         
            return back()->withErrors($validator)->withInput();
        }

        $message = new Message;

        foreach( Message::$rules as $field=>$rule){
            if($request->has($field)){
                $message[$field] = $request->input($field);
            }
        }

        if($request->has('messageID')){
            $oldMessage = Message::where('id', $request->input('messageID'))->first();
            $formUser = User::where('id', $oldMessage['from_user_id'])->first();
            $oldMessageContent = $oldMessage['content'];
            if($oldMessageContent){
                $message['content'] = $message['content'] . '<hr /><p>'. $oldMessage['created_at'] .' from '. $formUser['name'] .'</p><blockquote><p>Blabla</p></blockquote>';
            }
        }

        $message->save();

        if($request->has('redirctURL')){
            return redirect( $request->input('redirctURL'));           
        }
        
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
        $message = Message::where('id', $id)->with('fromUser')->first();
        $userID = Auth::id();
        $hasPermissionToView = $message && ($message['from_user_id'] == $userID || $message['to_user_id'] ==$userID);

        if(!$hasPermissionToView){
            return redirect('/message/error');
        }

        if(!$message->read){
            $message->read = true;
            $message->save();
        }        

        return view('message.show')
                    ->withMessage($message)
                    ->withMessageCount(Message::getUnreadReceiveMessagesCount($userID));
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


}
