@extends('layouts.main')
@section('content')

@if($messageCount > 0)
<div class="row">
        <div class="card white darken-1">
            <div class="row" id="headerRow">
                <div class="card-content  green white-text">                    
                    <span class="card-title">Messages:</span>                                
                </div>
            </div>
            <div class="divider green darken-3"></div>        
            <div class="row">                 
            </div>
            <div class="row section white segment">
                <table>
                    @foreach($messages as $message)
                        <tr>
                            <!--<td>read created_at </td>-->
                            <td style="width: 72px;padding-left: 32px;" >
                                <a href="/messages/{{$message['id']}}">
                                    <i class="fas {{$message['read'] ? 'fa-envelope-open' : 'fa-envelope red-text' }} "></i>
                                </a>
                            </td>
                            <td>
                                <a href="/messages/{{$message['id']}}">{{$message['subject']}}</a>
                            </td>  
                            <td>{{$message['from_user']}}</td>                 
                        </tr>
                    @endforEach
                </table>
            </div>
        </div>
    </div>
@else
<div class="row">
        <div class="col s12 card" style="padding:0px;">
            <div class="card-content white-text  red lighten-1">
                <strong class="card-title" style="text-align: center; ">No Messages</strong>
            </div>
            <div class="card-content">                                
                <a href="/groups" class="btn green center-align" style="width: 100%;">Go back</a>
            </div>
        </div>
    </div>
@endif

@endsection