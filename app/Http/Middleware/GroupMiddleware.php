<?php

namespace App\Http\Middleware;
use Auth;
use Closure;
use DB;

class GroupMiddleware
{
    public static $errorPage = '/group/error';
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next){        
        $groupID = $request->route('group') | $request->route('groupid');        
        
        if($this->isUserPartOfGroup($groupID)){
            return $next($request);
        }else{
            return redirect(GroupMiddleware::$errorPage);
        }                       
    }

    public function isUserPartOfGroup($groupID){
        $user = Auth::id();
        return $groupID && $user && DB::table('group_user')->where([['user_id', $user],['group_id', $groupID]])->exists();
    }
}
