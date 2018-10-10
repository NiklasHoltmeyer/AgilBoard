@extends('layouts.main')
@section('content')

<div class="row">
    <div class="col s12 card" style="padding:0px;">
        <div class="card-content white-text  red lighten-1">
            <strong class="card-title" style="text-align: center; ">Your not part of the requested Group</strong>
        </div>
        <div class="card-content">                                
            <a href="/groups" class="btn green center-align" style="width: 100%;"> Go back</a>
        </div>
    </div>
</div>

<link rel="stylesheet" href="{{asset('components/groups/css/groups.css')}}"/>
<script src="{{asset('components/groups/js/groups.js')}}"></script>
@endsection
