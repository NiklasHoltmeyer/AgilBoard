@extends('layouts.main')
@section('content')
<link rel="stylesheet" href="{{asset('components/board/issue/css/userstorygroup.css')}}"/>
<link rel="stylesheet" href="{{asset('components/board/issue/css/preview.css')}}"/>
<link rel="stylesheet" href="{{asset('components/board/issue/css/boardPanel.css')}}"/>
<script src="{{asset('components/board/issue/js/boardPanel.js')}}"></script>
<!-- Add USG Modal -->
<div id="addUSGModal" class="modal modal-fixed-footer">
    {!! Form::open(['action' => ['BoardController@store'], 'method' => 'POST']) !!}    
    {!! Form::hidden('_method', 'POST') !!}        
    {!! Form::hidden('groupid', $group['id']) !!}        
    <div class="modal-content">
    
    <div class="row">
            <h4>Add UserStoryGroup</h4>
    </div>

    <div class="row">
        <div class="input-field col s12">
            
            {!! Form::text('name', '', ['class' => 'validate', 'placeholder'=> 'User Story Group Name']) !!}
            @if ($errors->has('name'))
                <span class="invalid-feedback" role="alert" parentmodal="addUSGModal">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
            @endif
            <label for="name">Name</label>
        </div>
    </div>     

  </div>
  <div class="modal-footer">
        <a href="#!" class="modal-close waves-green waves-effect waves-light btn grey"  style="margin-right: 8px !important; min-width: 125px;" >Close</a>
        {!! Form::submit('Create', ['class' => 'modal-close waves-green waves-effect waves-light btn green submitButton', 'style' => 'min-width: 125px;']) !!}
  </div>
  {!! Form::close() !!}
</div>

<!-- Create USG Modal -->
<div id="changeUSGModal" class="modal modal-fixed-footer">
    {!! Form::open(['action' => ['BoardController@update', '-1'], 'method' => 'POST']) !!}    
    {!! Form::hidden('_method', 'PUT') !!}
    
    <div class="modal-content">
    
    <div class="row">
            <h4>Change UserStoryGroup</h4>
            
            {!! Form::hidden('usgID', '', ['id' => 'usgIDHidden']) !!}
            <!-- wird innerhalb von boardPanel.js gesetzt (beim clicken des triggers) -->
    </div>

    <div class="row">
        <div class="input-field col s12">
            
            {!! Form::text('name', '', ['class' => 'validate', 'placeholder'=> 'User Story Group Name', 'id' => 'name']) !!}
            @if ($errors->has('name'))
                <span class="invalid-feedback" role="alert" parentmodal="changeUSGModal">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
            @endif
            <label for="name">Name</label>
        </div>
    </div>     

  </div>
  <div class="modal-footer">
        <a href="#!" class="modal-close waves-green waves-effect waves-light btn grey"  style="margin-right: 8px !important; min-width: 125px;" >Close</a>
        {!! Form::submit('Change', ['class' => 'modal-close waves-green waves-effect waves-light btn green submitButton', 'style' => 'min-width: 125px;']) !!}
  </div>
  {!! Form::close() !!}
</div>

<!-- userStoryGroupPanels -->
<div class="row" style="margin: 8px !important;">
    <a class="waves-effect waves-light btn green modal-trigger valign" href="#addUSGModal" id="addUSGModalTrigger"><i class="material-icons left">add</i>add Board</a>
</div>
<div class="row" id="userStoryGroupPanels">
        @forelse ($userStoryGroups as $userStoryGroup)
            <div class="col boardPanel">
                @userstorygroup(['userstorygroup' => $userStoryGroup]) 
                @enduserstorygroup
            </div> 
        @empty
            <p>No UserStoryGroups available</p>
        @endforelse
    </div>

<link rel="stylesheet" href="{{asset('vendor/jquery-ui/jquery-ui.min.css')}}"/>
<script src="{{asset('vendor/jquery-ui/jquery-ui.min.js')}}"></script>

{!! Form::open(['action' => ['BoardController@changeBoard'], 'method' => 'POST']) !!}    
    {!! Form::hidden('issueid', '', ['id' => 'issueid']) !!}
    {!! Form::hidden('boardid', '', ['id' => 'boardid']) !!}
    {!! Form::submit('', ['class' => 'hide', 'id' => 'submitChangeBoard']) !!}
{!! Form::close() !!}

@endsection


