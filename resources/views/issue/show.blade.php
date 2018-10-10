@extends('layouts.main')

@section('content')

<link rel="stylesheet" href="{{asset('components/board/issue/css/issueShow.css')}}"/>
<script src="{{asset('components/board/issue/js/issueShow.js')}}"></script>

@if(empty ($userstory))
    <div class="row">
        <div class="col s12 card" style="padding:0px;">
            <div class="card-content white-text  red lighten-1">
                <strong class="card-title" style="text-align: center;">Invalid ID</strong>
            </div>
            <div class="card-content">
                The given ID doesnt match any Issue</br>
                <a href="/board/">Return to Agil-Board</a>
            </div>
        </div>
    </div>


@else
    @issueshow(['userstory' => $userstory])
    @endissueshow
@endif
@endsection

