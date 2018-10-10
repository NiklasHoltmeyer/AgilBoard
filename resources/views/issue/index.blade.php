@extends('layouts.main')
@section('content')

@if(count ($userStoryGroups) > 0)
    <div class="row ">
        <div class="card white darken-1">
            <div class="row">
                <div class="card-content  green white-text">                    
                    <span class="card-title">Issues</span>                                
                </div>
            </div>

            @foreach ($userStoryGroups as $userStoryGroup)
                <div class="divider green darken-3"></div>                        
                <div class="row section white segment">
                    <div class="card-content white section" style="padding-top: 2.5px !important;">
                        <div class="row">
                            <h5 class="left">{{ $userStoryGroup['name'] }}:</h5>
                        </div>
                        <div class="row descrptionWrapper">
                            @foreach ($userStoryGroup['issues'] as $key=>$issue)
                                <div class="row">
                                    <div class="issue card {{ ($key % 2 == 0) ? '' : 'card green lighten-4' }}">
                                        <a href="{{ url( 'issues/' . $issue['id']) }}">#{{$issue['id']}} <span style="color: black;">{{$issue['name']}}</span></a>                                        
                                    </div>                                    
                                </div>                                
                            @endforeach                            
                        </div>                  
                    </div>
                </div>
            @endforeach

       
            
        </div>
    </div>

    
@else
    <div class="row">
        <div class="col s12 card" style="padding:0px;">
            <div class="card-content white-text  red lighten-1">
                <strong class="card-title" style="text-align: center;">No Issues</strong>
            </div>
            <div class="card-content">
                No records
            </div>
        </div>
    </div>
@endif

<link rel="stylesheet" href="{{asset('components/groups/css/index.css')}}"/>
<script src="{{asset('components/groups/js/groups.js')}}"></script>
@endsection