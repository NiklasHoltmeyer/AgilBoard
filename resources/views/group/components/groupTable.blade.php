<div class="row">
    <h5 class="left" style="padding-left: 24px;">{{$title}}</h5>
    @if($editable)
        <i class="material-icons issueShowIcon right modal-trigger" href="#modalAddGroup" style="font-size: 2rem;margin-right: 24px;">add</i>
    @endif
</div>
<div class="row">
        <div class="card-content white section" style="padding-top: 2.5px !important;">
            <table class="highlight">
                <tbody>
                    @if($editable)
                        @foreach ($groups as $key=>$group)
                            <tr class="{{ ($key % 2 == 0) ? '' : 'card green lighten-4' }}">
                                <td> 
                                    <a href="/groups/{{$group['id']}}/boards/" id="group{{$group['id']}}">{{$group['name']}}</a>
                                </td>
                                <td style="width:auto;text-align:right;white-space: nowrap;" class="right">                                           
                                    <div class="col">
                                        <i class="material-icons waves-effect waves-light" onclick="addGroupChangeModal({{ $group['id']}});">create</i>
                                        </div>                                    
                                    <div class="col">
                                        {!! Form::open(['action' => ['GroupController@destroy', $group['id'] , 'method' => 'DELETE']]) !!}
                                        {!! Form::hidden('_method', 'DELETE') !!}    
                                        {{ Form::button("<i class='material-icons waves-effect waves-light'>delete</i>", ['type' => 'submit', 'class'=>'noStyleFormButton' ,'style'=>'padding-left: 4px; padding-right: 8px;']) }}                            
                                        {!! Form::close() !!}                
                                    </div>                                    
                                </td> 
                            </tr>
                        @endforeach
                    @else
                        @foreach ($groups as $key=>$group)
                            <tr class="{{ ($key % 2 == 0) ? '' : 'card green lighten-4' }}">
                                <td> 
                                    <a href="/groups/{{$group['id']}}/boards/" id="group{{$group['id']}}">{{$group['name']}}</a>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>    
            </table>
        </div>
    </div>


@if($editable)
    <!-- Modal Add Group -->
    <div id="modalAddGroup" class="modal modal-fixed-footer">
        {!! Form::open(['action' => ['GroupController@store'], 'method' => 'POST' ]) !!}
        {!! Form::hidden('_method', 'POST') !!}        
      <div class="modal-content">
        <h4>Create Group</h4>                 
        <div class="row">
            <div class="input-field col s12">            
                {!! Form::text('name', '', ['class' => 'validate', 'placeholder' => 'Name']) !!}
                @if ($errors->has('name'))
                    <span class="invalid-feedback" role="alert" parentModal='modalAddGroup'>
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
                <label for="name">Name</label>
            </div>
        </div>  
      </div>
      <div class="modal-footer">
        <a href="#!" class="modal-close waves-effect waves-green btn grey">Close</a>
        {{ Form::submit('Create', ['class' => 'modal-close waves-effect waves-green btn green submitButton']) }}        
      </div>  
      {!! Form::close() !!}  
    </div>
    
    
    <!-- Modal change Group -->
    <div id="modalChangeGroup" class="modal modal-fixed-footer">
        {!! Form::open(['action' => ['GroupController@update', '-1'], 'method' => 'POST' ]) !!}
        {!! Form::hidden('_method', 'PUT') !!}        
        {!! Form::hidden('id', -1, ['id'=>'modalChangeGroupID']) !!}    
      <div class="modal-content">
        <h4>Change Group</h4>                 
        <div class="row">
            <div class="input-field col s12">            
                {!! Form::text('name', '', ['class' => 'validate', 'placeholder' => 'Name', 'id'=>'name']) !!}
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
@endif