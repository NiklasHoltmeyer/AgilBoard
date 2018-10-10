@extends('layouts.main')

@section('content')

@if(Auth::id() != $user->id)
    <!-- Modal write Message -->
    <div id="messageModal" class="modal modal-fixed-footer">
        {!! Form::open(['action' => 'MessagController@store', 'method' => 'POST']) !!}
            <div class="modal-content">
                <h4>To: {{$user->name}}</h4>
                
                {{ Form::hidden('to_user_id', $user->id) }}
                {{ Form::hidden('subject', '') }}


                <div class="row">
                        <div class="input-field col s12">            
                            {!! Form::text('subject', '', ['id' => 'subject', 'class' => 'validate', 'placeholder' => 'Precondition']) !!}
                            @if ($errors->has('subject'))
                                <span class="invalid-feedback" role="alert" parentModal='modalChangeAcceptanceCriteria'>
                                    <strong>{{ $errors->first('subject') }}</strong>
                                </span>
                            @endif
                            <label for="subject">Subject</label>
                        </div>
                </div>
                <div class="row">
                        <div class="input-field col s12">
                        {{ Form::textarea('content', '', ['class'=>'article-ckeditor form-control']) }}
                        @if ($errors->has('content'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('content') }}</strong>
                            </span>
                        @endif
                    </div>            
                </div>   
                    
                
                
            </div>
            <div class="modal-footer">
                <a href="#!" class="modal-close waves-effect waves-light btn grey">Cancel</a>
                {{ Form::submit('Send', ['class' => 'waves-effect waves-light btn right green submitButton']) }}    
                
            </div>
        {!! Form::close() !!}
    </div>
@endif

@if($user)
    <div class="row">
        <div class="row">
            <div class="card white darken-1">
                <div class="row" id="profileHeader"> 

                    @if(Auth::id() != $user->id)
                        <div id="messageButton">
                            <a class="modal-trigger" href="#messageModal">                                     
                                <i class="fas fa-envelope white-text"></i>
                            </a>
                        </div>
                    @endif

                    <div class="card-content green white-text" id="xxx">     
                        <div class="row">
                            <div class="col" id="profilHeaderPicWrapper">                                
                                <img src="{{App\Models\User::$avatarDir . $user->avatar}}" alt="" class="image" id="profilHeaderPic"> 
                                @if(Auth::id() == $user->id)  
                                    {!! Form::open(['action' => 'UserController@updateAvatar', 'method' => 'POST', 'enctype' => 'multipart/data', 'files'=>'true']) !!}                             
                                        {{ Form::file('avatar', ['id' => 'avatarUploadField', 'name' => 'avatar', 'accept'=>'image/png, image/jpeg, image/jpg']) }}
                                        {{ Form::submit('Submit', ['id'=>'avatarUploadSubmit', 'class'=>'submitButton']) }}
                                    {!! Form::close() !!}
                                                             
                                    <div class="middle valign-wrapper" id="uploadAvatarButtonWrapper">
                                        <div class="text" id="uploadAvatarButton">Upload</div>
                                    </div>
                                @endif  
                            </div>
                            <div class="col">
                                <div class="row">
                                    <div class="card-title" id="username"><strong>{{$user['name']}}</strong></div> 
                                </div>
                                <div class="row">
                                    <small id="useremail"> {{$user['email']}}</small>
                                </div>                                
                            </div>
                        </div>               
                        
                    </div>
                </div>
                @if(count($user['groups']) > 0)
                    <div class="divider green darken-3"></div>                            
                    <div class="row section white segment">
                        @groupTable(['groups' => $user['groups'], 'title' => 'Groups:', 'editable' => false])
                        @endgroupTable
                    </div>
                @endif
            </div>
        </div>
    </div>
@else
    <div class="row">
        <div class="col s12 card" style="padding:0px;">
            <div class="card-content white-text  red lighten-1">
                <strong class="card-title" style="text-align: center;">Invalid ID</strong>
            </div>
            <div class="card-content">
                The given ID doesnt match any User</br>
                <a href="/groups/">Return to Groups</a>
            </div>
        </div>
    </div>
@endif


<script src="{{asset('/vendor/unisharp/laravel-ckeditor/ckeditor.js')}}"></script>
<script src="{{asset('/vendor/unisharp/laravel-ckeditor/adapters/jquery.js')}}"></script>

<link rel="stylesheet" href="{{asset('components/user/css/user.css')}}"/>
<script src="{{asset('components/user/js/user.js')}}"></script>
<link rel="stylesheet" href="{{asset('components/groups/css/groups.css')}}"/>
<script src="{{asset('components/groups/js/groups.js')}}"></script>
@endsection

