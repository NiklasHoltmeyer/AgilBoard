<!-- ckeditor https://github.com/UniSharp/laravel-ckeditor -->
<script src="{{asset('/vendor/unisharp/laravel-ckeditor/ckeditor.js')}}"></script>
<script src="{{asset('/vendor/unisharp/laravel-ckeditor/adapters/jquery.js')}}"></script>

<!--<script src="{{asset('util/texteditor/tinymce/js/jquery.tinymce.min.js')}}"></script>-->

<!-- show -->


<div class="row ">
    <div class="card white darken-1">
        <div class="row">
            <div class="card-content  green white-text">                    
                <span class="card-title"><i class="material-icons modal-trigger right" href="#changeUSModal" style="padding-right:16px;" >create</i>{{ $userstory['name'] }} <small>(#{{ $userstory['id'] }})</small></span>                                
            </div>
            <div id="issueInfoModalTrigger">
                <a href="#" data-target="issueInfoModal" class="right green-text sidenav-trigger"><i class="material-icons">arrow_back</i></a>
                <!--   -->
            </div>
        </div>

        <!-- descrption -->  

        <div class="divider green darken-3"></div>
        
        <div class="row section white segment">
            <div class="card-content white section" style="padding-top: 2.5px !important;">
                <div class="row">
                    <h5 class="left">Descrption:</h5>
                    <i class="material-icons issueShowIcon right modal-trigger" href="#modalDescrption">create</i>
                </div>
                <div class="row descrptionWrapper">
                    {!! $userstory['descrption'] !!}
                </div>
                
                
            </div>
        </div>

        <!-- acceptancecriteria -->
        
            <div class="divider green darken-3"></div>

            <div class="row green lighten-3">
                <div class="card-content white section" style="padding-top: 2.5px !important;">
                    <h5></h5>
                    <div class="row">
                            <h5 class="left">Acceptance Criteria:</h5>
                            <i class="material-icons issueShowIcon right modal-trigger" href="#modalAddAcceptanceCriteria" style="font-size: 2rem;">add</i>
                    </div>
                    <div class="row">
                            @if(count($userstory['acceptancecriteria']) > 0)
                            <table class="highlight">
                                    <thead>
                                        <tr>
                                            <th>Precondition</th>
                                            <th>Action</th>
                                            <th>Result</th>
                                            <th></th>
                                        </tr>
                                    </thead> 
                                    <tbody>
                                        @foreach ($userstory['acceptancecriteria'] as $key=>$acceptancecriteria)
                                            <tr class="{{ ($key % 2 == 0) ? '' : 'card green lighten-4' }}" id="acceptancecriteria{{ $acceptancecriteria['id']}}">
                                                <td class="precondition">{{ $acceptancecriteria['precondition'] }} </td>
                                                <td class="action">{{ $acceptancecriteria['action'] }}</td>
                                                <td class="result">{{ $acceptancecriteria['result'] }}</td>
                                                <td style="width:auto;text-align:right;white-space: nowrap;" class="right">                                            
                                                    <div class="col">
                                                        <i class="material-icons waves-effect waves-light" onclick="openAcceptanceCriteriaChangeModal({{ $acceptancecriteria['id']}});">create</i>
                                                    </div>
                                                    <div class="col">
                                                        {!! Form::open(['action' => ['AcceptanceCriteriaController@destroy', $acceptancecriteria['id'] , 'method' => 'DELETE']]) !!}
                                                            {!! Form::hidden('_method', 'DELETE') !!}    
                                                            {{ Form::button("<i class='material-icons waves-effect waves-light'>delete</i>", ['type' => 'submit', 'class'=>'noStyleFormButton' ,'style'=>'padding-left: 4px; padding-right: 8px;']) }}                            
                                                        {!! Form::close() !!}                
                                                    </div>
                                                </td>                               
                                            </tr>
                                        @endforeach                      
                                    </tbody>    
                                </table>
                            @endif
                    </div>                    
                </div>
            </div>
        

        <!-- comments -->
        <div class="divider green darken-3"/></div>

        <div class="row white lighten-3">
            <div class="card-content white section" style="padding-top: 2.5px !important;">                
                <h5>Comments:</h5>
                @foreach($userstory['comments'] as $key=>$comment)
                    <div class="{{ ($key % 2 == 0) ? 'chatMessageContent card' : 'chatMessageContent card green lighten-4' }}">
                        <div class="row">
                            <div class="col s1 commentAutorInfo center-align" >
                                <div class="row">
                                    <a href="/users/{{$comment['user']['id']}}">
                                        <img src="{{App\Models\User::$avatarDir . $comment['user']['avatar']}}" alt=""
                                            class="image commentUserAvatar">
                                    </a>
                                </div>                          
                                <div class="row center-align">
                                    <a href="/users/{{$comment['user']['id']}}">
                                        <strong>{{ $comment['user']['name'] }}</strong>
                                    </a>
                                </div>
                            </div>   

                            <div class="col s11 commentWrapper">
                                {!! $comment['content'] !!}
                            </div>
 
                        </div> 
                        <div class="row commentCreatedAt">
                            <small  class="right">{{ $comment['created_at'] }}</small>
                        </div>
                        <!--
                        <div class="row">
                            
                        </div>
                    -->
                    </div>
                @endforeach   

                {!! Form::open(['action' => 'CommentController@store', 'method' => 'POST']) !!}
                {!! Form::hidden('issue_id', $userstory['id']) !!}
                <div class="input-field col s12">
                    {{ Form::textarea('content', '', ['class'=>'article-ckeditor form-control']) }}
                    @if ($errors->has('content'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('content') }}</strong>
                        </span>
                    @endif
                   
                </div>   
                
                {{ Form::submit('Send', ['class' => 'waves-effect waves-light btn right green submitButton']) }}    
                {!! Form::close() !!}
            </div>
        </div>
        <div class="footer"> </div>
    </div>
</div>


<!-- sidebar -->
<ul id="issueInfoModal" class="sidenav sidenav-fixed right">
        <li><a class="subheader">Creator</a></li>
        <li><a href="#!"><i class="sideBarIcon material-icons">account_circle</i>{{ $userstory['creator'] }}</a></li>

        <li><div class="divider"></div></li>

        <li><a class="subheader">Due date</a></li>
        <li><a href="#!"><i class="sideBarIcon material-icons">date_range</i>{{ $userstory['due_date'] }}</a></li>

        <li><div class="divider"></div></li>

        <li><a class="subheader">Risk</a></li>
        <li><a href="#!"><i class="sideBarIcon material-icons">attach_money</i>{{ $userstory['risk'] }}</a></li>
        
        <li><div class="divider"></div></li>

        <li><a class="subheader">Story Points</a></li>
        <li><a href="#!"><i class="sideBarIcon fa fa-calculator"></i>{{ $userstory['storyPoints'] }}</a></li>

        <li><div class="divider"></div></li>

        <li><a class="subheader">Estimated Time</a></li>

        <li>
            <a href="#!">
                <i class="sideBarIcon material-icons">grade</i><span id="estimatedTime">{{ $userstory['estimatedTime'] }}</span>
                <i class="fas fa-info-circle right tooltipped" data-position="left" data-tooltip="Write /estimated {time} in the Comments to add Time /remove estimated to remove estmiated Time" style="margin-right: 0px;"></i>
            </a>
        </li>

        <li><div class="divider"></div></li>

        <li><a class="subheader">Time Spend</a></li>
        <li>
            <a href="#!">
                <i class="sideBarIcon fa fa-clock-o"></i>
                <span id="timeSpend">{{ $userstory['timeSpend'] }}</span>
                <i class="fas fa-info-circle right tooltipped" data-position="left" data-tooltip="Write /spend {time} in the Comments to add Time /remove spend to remove estmiated Time" style="margin-right: 0px;"></i>
            </a>
        </li>

        <li><div class="divider"></div></li>

        <li><a class="subheader">Priority</a></li>
        <li><a href="#!"><i class="sideBarIcon fa fa-money"></i>{{ $userstory['priority'] }}</a></li>
    </ul>


    

    <!-- Modal Change Descrption -->
<div id="modalDescrption" class="modal modal-fixed-footer">
    {!! Form::open(['action' => ['IssueController@update', $userstory['id']], 'method' => 'POST' ]) !!}
    {!! Form::hidden('_method', 'PUT') !!}    
  <div class="modal-content">
    <h4>Change Descrption</h4>                 
    {!! Form::textarea('descrption', $userstory['descrption'], ['id' => 'article-ckeditor', 'class' => 'article-ckeditor form-control']) !!}    
        @if ($errors->has('descrption'))
            <span class="invalid-feedback" role="alert" parentModal='modalDescrption'>
                <strong>{{ $errors->first('descrption') }}</strong>
            </span>
        @endif
  </div>
  <div class="modal-footer">
    <a href="#!" class="modal-close waves-effect waves-green btn grey">Close</a>
    {{ Form::submit('Update', ['class' => 'modal-close waves-effect waves-green btn green submitButton']) }}        
  </div>  
  {!! Form::close() !!}  
</div>

<!-- Modal Change Acceptance Criteria -->
<div id="modalChangeAcceptanceCriteria" class="modal modal-fixed-footer">
    {!! Form::open(['action' => ['AcceptanceCriteriaController@update', -1], 'method' => 'POST' ]) !!}
    {!! Form::hidden('_method', 'PUT') !!}        
    {!! Form::hidden('issue_id', $userstory['id']) !!}    
    {!! Form::hidden('id', -1, ['id'=>'modalChangeAcceptanceCriteriaID']) !!}    
  <div class="modal-content">
    <h4>Change Acceptance Criteria </h4>                 
    <div class="row">
        <div class="input-field col s12">            
            {!! Form::text('precondition', '', ['id' => 'precondition', 'class' => 'validate', 'placeholder' => 'Precondition']) !!}
            @if ($errors->has('precondition'))
                <span class="invalid-feedback" role="alert" parentModal='modalChangeAcceptanceCriteria'>
                    <strong>{{ $errors->first('precondition') }}</strong>
                </span>
            @endif
            <label for="precondition">Precondition</label>
        </div>
    </div>
    <div class="row">
        <div class="input-field col s12">
            {!! Form::text('action', '', ['id' => 'action', 'class' => 'validate', 'placeholder' => 'Action']) !!}
            @if ($errors->has('action'))
                <span class="invalid-feedback" role="alert" parentModal='modalChangeAcceptanceCriteria'>
                    <strong>{{ $errors->first('action') }}</strong>
                </span>
            @endif
            <label for="action">Action</label>
        </div>
    </div>
    <div class="row">
        <div class="input-field col s12">
            {!! Form::text('result', '', ['id' => 'result', 'class' => 'validate', 'placeholder' => 'Result']) !!}
            @if ($errors->has('result'))
                <span class="invalid-feedback" role="alert" parentModal='modalChangeAcceptanceCriteria'>
                    <strong>{{ $errors->first('result') }}</strong>
                </span>
            @endif
            <label for="result">Result</label>
        </div>
    </div>
  </div>
  <div class="modal-footer">
    <a href="#!" class="modal-close waves-effect waves-green btn grey">Close</a>
    {{ Form::submit('Update', ['class' => 'modal-close waves-effect waves-green btn green submitButton']) }}        
  </div>  
  {!! Form::close() !!}  
</div>

<!-- Modal Add Acceptance Criteria -->
<div id="modalAddAcceptanceCriteria" class="modal modal-fixed-footer">
    {!! Form::open(['action' => ['AcceptanceCriteriaController@store'], 'method' => 'POST' ]) !!}
    {!! Form::hidden('_method', 'POST') !!}        
    {!! Form::hidden('issue_id', $userstory['id']) !!}    
  <div class="modal-content">
    <h4>Create Acceptance Criteria </h4>                 
    <div class="row">
        <div class="input-field col s12">            
            {!! Form::text('precondition', '', ['class' => 'validate', 'placeholder' => 'Precondition']) !!}
            @if ($errors->has('precondition'))
                <span class="invalid-feedback" role="alert" parentModal='modalAddAcceptanceCriteria'>
                    <strong>{{ $errors->first('precondition') }}</strong>
                </span>
            @endif
            <label for="precondition">Precondition</label>
        </div>
    </div>
    <div class="row">
        <div class="input-field col s12">
            {!! Form::text('action', '', ['class' => 'validate', 'placeholder' => 'Action']) !!}
            @if ($errors->has('action'))
                <span class="invalid-feedback" role="alert" parentModal='modalAddAcceptanceCriteria'>
                    <strong>{{ $errors->first('action') }}</strong>
                </span>
            @endif
            <label for="action">Action</label>
        </div>
    </div>
    <div class="row">
        <div class="input-field col s12">
            {!! Form::text('result', '', ['class' => 'validate', 'placeholder' => 'Result']) !!}
            @if ($errors->has('result'))
                <span class="invalid-feedback" role="alert" parentModal='modalAddAcceptanceCriteria'>
                    <strong>{{ $errors->first('result') }}</strong>
                </span>
            @endif
            <label for="result">Result</label>
        </div>
    </div>
  </div>
  <div class="modal-footer">
    <a href="#!" class="modal-close waves-effect waves-green btn grey">Close</a>
    {{ Form::submit('Create', ['class' => 'modal-close waves-effect waves-green btn green submitButton']) }}        
  </div>  
  {!! Form::close() !!}  
</div>

<!-- Modal Change changeUSModal -->
<div id="changeUSModal" class="modal modal-fixed-footer">
        {!! Form::open(['action' => ['IssueController@update', $userstory['id']], 'method' => 'POST' ]) !!}
        {!! Form::hidden('_method', 'PUT') !!}    
      <div class="modal-content">
        <h4>Change Issue</h4>                 
        <div class="row">
            <div class="input-field col s12">
                    <i class="material-icons prefix">assignment</i>                
                    {!! Form::text('name', $userstory['name'], ['class'=>'validate']) !!}                
                    @if ($errors->has('name'))
                        <span class="invalid-feedback" role="alert" parentModal='changeUSModal'>
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                    <label for="name">Name</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12 m6">
                <i class="material-icons prefix ">attach_money</i>                
                {!! Form::number('risk', $userstory['risk'], ['class'=>'validate', 'min' => '0', 'max' => '100']) !!}                
                @if ($errors->has('risk'))
                    <span class="invalid-feedback" role="alert" parentModal='changeUSModal'>
                        <strong>{{ $errors->first('risk') }}</strong>
                    </span>
                @endif
                <label for="risk">Risk</label>
            </div>
            <div class="input-field col s12 m6">
                <i class="material-icons prefix fa fa-money"></i>       
                {!! Form::number('priority', $userstory['priority'], ['class'=>'validate', 'min' => '0', 'max' => '100']) !!}                
                @if ($errors->has('priority'))
                    <span class="invalid-feedback" role="alert" parentModal='changeUSModal'>
                        <strong>{{ $errors->first('priority') }}</strong>
                    </span>
                @endif
                <label for="priority">Priority</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12 m6">
                <i class="material-icons prefix fa fa-calculator"></i>                
                {!! Form::number('storyPoints', $userstory['storyPoints'], ['class'=>'validate', 'min' => '0', 'max'=> '100']) !!}                
                @if ($errors->has('storyPoints'))
                    <span class="invalid-feedback" role="alert" parentModal='changeUSModal'>
                        <strong>{{ $errors->first('storyPoints') }}</strong>
                    </span>
                @endif
                <label for="storyPoints">Story Points</label>
            </div>
            <div class="input-field col s12 m6">
                <i class="material-icons prefix" style="    font-size: 2.25rem;">date_range</i>                
                {!! Form::text('due_date', $userstory['due_date'], ['class'=>'datepicker', 'id' => 'due_date_form', 'type' => 'text', '']) !!}      
                @if ($errors->has('due_date'))
                    <span class="invalid-feedback" role="alert" parentModal='changeUSModal'>
                        <strong>{{ $errors->first('due_date') }}</strong>
                    </span>
                @endif        
                <label for="due_date">Due date</label>
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <a href="#!" class="modal-close waves-effect waves-green btn grey">Close</a>
        {{ Form::submit('Update', ['class' => 'modal-close waves-effect waves-green btn green submitButton']) }}        
      </div>  
      {!! Form::close() !!}  
</div>


<div id="datepickerContainer">

</div>