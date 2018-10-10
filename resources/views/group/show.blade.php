@extends('layouts.main')
@section('content')

@if(empty ($group))
    <div class="row">
        <div class="col s12 card" style="padding:0px;">
            <div class="card-content white-text  red lighten-1">
                <strong class="card-title" style="text-align: center;">Invalid ID</strong>
            </div>
            <div class="card-content">
                The given ID doesnt match any Group</br>
                <a href="/groups/">Return to Groups</a>
            </div>
        </div>
    </div>
@else
<div class="row ">
        <div class="card white darken-1">
            <div class="row">
                <div class="card-content  green white-text">                    
                    <span class="card-title">{{$group['name']}} <small>(#{{$group['id']}})</small><i class="material-icons modal-trigger right" style="margin-right: 16px;" href="#modalChangeGroup" >create</i></span>                                
                </div>
            </div>
    
            <!-- users -->  
    
            <div class="divider green darken-3"></div>
            
            <div class="row section white segment">
                <div class="card-content white section" style="padding-top: 2.5px !important;">
                    <div class="row">
                        <h5 class="left">Users:</h5>
                        <i class="material-icons issueShowIcon right modal-trigger" href="#modalAddUser" style="margin-right: 24px;margin-top:16px;">person_add</i>
                    </div>
                    <div class="row descrptionWrapper">
                            <table class="highlight">
                                    <tbody>
                        @foreach ($group['users'] as $key=>$user)
                            <tr class="{{ ($key % 2 == 0) ? '' : 'card green lighten-4' }}">
                                <td> <a href="/users/{{$user['id']}}" id="user{{$user['id']}}">{{$user['name']}}</a></td>
                                <td style="width:auto;text-align:right;white-space: nowrap;" class="right">                                            
                                        <div class="col">
                                            {!! Form::open(['action' => ['GroupController@removeUser', $group['id'] , $user['id'], 'method' => 'DELETE']]) !!}
                                                {!! Form::hidden('_method', 'DELETE') !!}    
                                                {{ Form::button("<i class='material-icons waves-effect waves-light'>remove</i>", ['type' => 'submit', 'class'=>'noStyleFormButton' ,'style'=>'padding-left: 4px; padding-right: 8px;']) }}                            
                                            {!! Form::close() !!}                
                                        </div>
                                    </td> 
                            </tr>
                        @endforeach
                    </tbody>    
                </table>
                    </div>
                    
                    
                </div>
            </div>
        </div>
    </div>
@endif

<!-- Modal change Group -->
<div id="modalChangeGroup" class="modal modal-fixed-footer">
    {!! Form::open(['action' => ['GroupController@update', $group['id']], 'method' => 'POST' ]) !!}
    {!! Form::hidden('_method', 'PUT') !!}        
  <div class="modal-content">
    <h4>Change Group</h4>                 
    <div class="row">
        <div class="input-field col s12">            
            {!! Form::text('name', $group['name'], ['class' => 'validate', 'placeholder' => 'Name', 'id'=>'name']) !!}
            @if ($errors->has('name'))
                <span class="invalid-feedback" role="alert" parentModal='modalChangeGroup'>
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
            @endif
            <label for="name">Name</label>
        </div>
    </div>  
  </div>
  <div class="modal-footer">
    <a href="#!" class="modal-close waves-effect waves-green btn grey">Close</a>
    {{ Form::submit('Update', ['class' => 'modal-close waves-effect waves-green btn green submitButton']) }}        
  </div>  
  {!! Form::close() !!}  
</div>

<!-- Modal add User -->
<div id="modalAddUser" class="modal modal-fixed-footer">
        {!! Form::open(['action' => ['GroupController@addUser', $group['id']], 'method' => 'POST' ]) !!}
      <div class="modal-content">
        <h4>Add User</h4>                 
        <div class="row">
            <div class="input-field col s12">            
                {!! Form::text('User-Email', '', ['class' => 'validate', 'placeholder' => 'E-Mail', 'id'=>'name']) !!}
                @if ($errors->has('User-Email'))
                    <span class="invalid-feedback" role="alert" parentModal='modalAddUser'>
                        <strong>{{ $errors->first('User-Email') }}</strong>
                    </span>
                @endif
                <label for="User-Email">E-Mail</label>
            </div>
        </div>  
      </div>
      <div class="modal-footer">
        <a href="#!" class="modal-close waves-effect waves-green btn grey">Close</a>
        {{ Form::submit('Update', ['class' => 'modal-close waves-effect waves-green btn green submitButton']) }}        
      </div>  
      {!! Form::close() !!}  
    </div>


<link rel="stylesheet" href="{{asset('components/groups/css/groups.css')}}"/>
<script src="{{asset('components/groups/js/groups.js')}}"></script>
@endsection

<!--
    modalAddUser
    
    

-->