@extends('layouts.main')
@section('content')

<div class="row">
        <div class="card white darken-1">
            <div class="row" id="headerRow">
                <div class="card-content  green white-text">                    
                    <span class="card-title">{{$message['subject']}}:</span>                                
                </div>
            </div>
            <div class="divider green darken-3"></div>        
            <div class="row">                 
            </div>
            <div class="row section white segment">
                <div id="content">
                        {!! $message['content'] !!}
                </div>
            </div>

            <div class="divider green darken-3"></div>        
            @if(Auth::id() != $message['from_user_id'])
                <div class="row white segment" style="padding: 16px !important"> 
                    <span class="card-title">Answer:</span>                                
                    {!! Form::open(['action' => 'MessagController@store', 'method' => 'POST']) !!}
                    {{ Form::hidden('to_user_id', $message['from_user_id']) }}
                    {{ Form::hidden('messageID', $message['id']) }}
                    {{ Form::hidden('subject', 'Aw: ' . $message['subject']) }}
                    {{ Form::hidden('redirctURL', '/messages') }}



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
            @endif

        </div>        

    </div>
</br></br></br></br></br>

<script src="{{asset('/vendor/unisharp/laravel-ckeditor/ckeditor.js')}}"></script>
<script src="{{asset('/vendor/unisharp/laravel-ckeditor/adapters/jquery.js')}}"></script>
<script>
    $('textarea').ckeditor();
    // $('.textarea').ckeditor(); // if class is prefered.
</script>
<link rel="stylesheet" href="{{asset('components/message/css/show.css')}}"/>
@endsection