<div class="card sticky-action userstorygroup hoverable"> 
    <!-- header-->
            <div class="card-panel  green usgHeader">                
                <div class="icons valign-wrapper left">
                    <strong class="green-text text-lighten-5" style="font-size: 1.25rem;">{{$userstorygroup['name']}}</strong>
                </div>
                <div class="icons valign-wrapper right">                        
                        <i class="waves-effect waves-light material-icons green-text text-darken-4 activator addIssueButton" 
                                    style="font-size: 2rem;"
                                    onclick="toggleSubmitIssue({{$userstorygroup['id']}});"
                                    >add</i>
                        <i class="waves-effect waves-light material-icons green-text text-darken-4"
                                    onclick="openChangeUSGModal({{$userstorygroup['id']}}, '{{$userstorygroup['name']}}');">create</i>                        
                        
                        
                        {!! Form::open(['action' => ['BoardController@destroy', $userstorygroup['id'], 'method' => 'DELETE']]) !!}
                            {!! Form::hidden('_method', 'DELETE') !!}       
                            {{ Form::button("<i class='waves-effect waves-light material-icons green-text text-darken-4'>delete</i>", ['type' => 'submit', 'class'=>'green btn-flat ']) }}                            
                        {!! Form::close() !!}
                </div>
            </div>
            <!-- add Issue -->
                <div class="card-panel hoverable userStory submitIssue" id="submitIssue{{$userstorygroup['id']}}">
                    {!! Form::open(['action' => 'IssueController@store', 'method' => 'POST']) !!}
                        {!! Form::hidden('userstorygroupid', $userstorygroup['id']) !!}
                        <div class="row" style="padding: 0px !important; margin: 0px !important;">
                            <div class="input-field col s12" style="padding: 0px !important; margin: 0px !important;">
                                {{ Form::text('issueName', '', ['class' => 'validate', 'placeholder' => 'Name']) }}
                                @if ($errors->has('issueName'))
                                    <span class="invalid-feedback" role="alert" targetID="submitIssue{{$errors->first('usgID')}}" >
                                        <strong>{{ $errors->first('issueName') }}</strong>
                                    </span>
                                @endif
                            </div>    
                        </div>   
                        
                        <div class="row" style="padding: 0px !important; margin: 0px !important;">
                            <div class="input-field col s6" style="padding: 0px !important; margin: 0px !important;">
                                <a class="waves-effect waves-light btn grey left" onclick="hideSubmitIssue({{$userstorygroup['id']}});">Cancel</a>                        
                            </div>    
                            {{ Form::submit('Create Issue', ['class' => 'waves-effect waves-light btn right green input-field col s6 submitButton', 'style' => 'padding: 0px !important; margin: 0px !important;']) }}    
                        </div>   
                    {!! Form::close() !!}
                </div>
                
            <!-- all issues -->
            <div class="usgContentWrapper" boardID="{{$userstorygroup['id']}}">       
                <div class="usgContent">
                    
                @forelse ($userstorygroup['issues'] as $key=>$issue)           
                    <div class="{{ ($key % 2 == 0) ? 'card-panel hoverable userStory' : 'card-panel hoverable userStory green lighten-4'}}" class="issueWrapper">
                        @issuepreview(['issue' => $issue, 'boardID' => $userstorygroup['id'] ])@endissuepreview      
                    </div>                
                @empty
                    <div class="card-panel userStory grey lighten-1">
                        <p>No UserStories available</p>
                    </div>
                @endforelse              
            </div>     
        </div>      
</div>



