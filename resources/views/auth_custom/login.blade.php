@extends('layouts.main')
<script defer src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>
<link href="{{ asset('components/auth/css/loginRegistrate.css') }}" rel="stylesheet">

@section('content')

<script src="{{asset('components/auth/js/loginRegistrate.js')}}"></script>

<!-- Quelle: https://bootsnipp.com/materialize/snippets/gNK6e -->
<!--Contenedor General-->
<div class="container" id="loginContainer">
    <div class="row">
        <div class="col s8 offset-s2">
            <div class="card center-align">
                <div class="card-tabs">
                <ul class="tabs tabs-fixed-width">
                    <li class="tab"><a href="#loginTab">{{ __('Login') }}</a></li>
                    <li class="tab"><a target="_self" href="/register">{{ __('Register') }}</a></li>
                </ul>
                </div>
                <div class="card-content grey lighten-4">
                <div id="loginTab">
                    <div class="row">
                        <form  method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
                            @csrf
                            <div class="input-field col s12">
                                <i class="material-icons prefix">account_circle</i>
                                <input placeholder="max@mustermann.com" 
                                        id="email" name="email" type="email"
                                        class="validate form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                        value="{{ old('email') }}" required autofocus>                                        
                                <label for="email">{{ __('E-Mail Address') }}</label>
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div> 
                            <div class="input-field col s12">
                                <i class="material-icons prefix">vpn_key</i>
                                <input placeholder="Password" id="password" name="password" type="password" class="validate form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" required>
                                <label for="password">{{ __('Password') }}</label>
                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>  

                            <div class="input-field col s11 offset-s1" style="margin-bottom: 80px;">
                                <label>
                                    <input type="checkbox" checked="{{ old('remember') ? 'checked' : '' }}" name="remember" id="remember" />
                                    <span>{{ __('Remember Me') }}</span>
                                </label>
                            </div>

                            <div class="submitButton">
                                <button type="submit" class="waves-effect waves-light btn green"><i class="material-icons right">arrow_forward</i>{{ __('Login') }}</button>
                                <a class="" href="{{ route('password.request') }}" disabled>{{ __('Forgot Your Password?') }}</a>
                            </div>                             
                        </form>                          
                    </div>                       
                </div>
                </div>
            </div>            
        </div>
    </div>
</div>
@endsection
