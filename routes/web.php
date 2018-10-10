<?php

use Illuminate\Http\Request;


Auth::routes();

Route::group(['middleware' => ['auth']], function () {
    Route::get('/', 'GroupController@index');
    Route::get('/group/error', function(){ return view('group.error'); });

    Route::resource('boards',   'BoardController', ['except' => ['index']]); 

    Route::resource('issues',   'IssueController', ['except' => ['index']]);
    Route::resource('comments', 'CommentController');
    Route::resource('accpetancecriteria', 'AcceptanceCriteriaController');

    Route::resource('users', 'UserController'); 

    Route::post('profil/avatar', 'UserController@updateAvatar');
    Route::post('boards/changeboard/', 'BoardController@changeBoard');

    Route::get('groups/', 'GroupController@index'); 

    Route::resource('messages', 'MessagController');   
    Route::get('/message/error', function(){ return view('message.error'); });  
});

Route::group(['middleware' => ['auth', 'ingroup']], function(){
    Route::get('groups/{group}/boards', 'BoardController@index');
    Route::get('groups/{group}/issues', 'IssueController@index');
    Route::resource('groups', 'GroupController', ['except' => ['index']]);      

    Route::delete('groups/{group}/removeUser/{userid}', 'GroupController@removeUser');    
    Route::post('groups/{group}/addUser', 'GroupController@addUser'); 
});


