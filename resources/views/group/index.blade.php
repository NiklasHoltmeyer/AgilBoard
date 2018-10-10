@extends('layouts.main')
@section('content')

@if(count ($groups) > 0)
    <div class="row">
        <div class="card white darken-1">
            <div class="row" id="headerRow">
                <div class="card-content  green white-text">                    
                    <span class="card-title">Groups:</span>                                
                </div>
            </div>
            <div class="divider green darken-3"></div>        
            <div class="row"> 
                
            </div>
                <div class="row section white segment">
                    @groupTable(['groups' => $groups, 'title' => '', 'editable' => true])
                    @endgroupTable
                </div>
        </div>
    </div>
    
@else
    <div class="row">
        <div class="col s12 card" style="padding:0px;">
            <div class="card-content white-text  red lighten-1">
                <strong class="card-title" style="text-align: center; ">Your not part of any Group</strong>
            </div>
            <div class="card-content">                                
                <a href="" class="btn green center-align" style="width: 100%;"> Create Group //TODO: TODO</a>
            </div>
        </div>
    </div>
@endif

<link rel="stylesheet" href="{{asset('components/groups/css/groups.css')}}"/>
<script src="{{asset('components/groups/js/groups.js')}}"></script>
@endsection
