<!-- resources/views/layouts/main.blade.php -->
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts / Styles / Fonts -->
    <!-- <script src="{{ asset('js/app.js') }}" defer></script> -->

    <script src="{{asset('jquery/js/jquery.min.js')}}"></script>
    <link rel="stylesheet" href="{{asset('materialize/css/icon.css')}}"/>

    <link rel="stylesheet" href="{{asset('materialize/css/materialize.min.css')}}"/>
    <script src="{{asset('materialize/js/materialize.min.js')}}"></script>
    
    <script src="{{asset('header/js/header.js')}}"></script>
    <link rel="stylesheet" href="{{asset('header/css/header.css')}}"/>

    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <!-- <link rel="stylesheet" href="{{asset('font-awesome/css/font-awesome.min.css')}}"> -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"/>

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">


    <!-- wieso auch imemr geht daas nur via cdn und nicht lokal im projekt!? -->

    <script src="{{ asset('js/main.js') }}" defer></script>
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">

    <title>AgilBoard</title>
  </head>
  <body>
      <!-- Dropdown Structure -->
      <ul id="dropdown1" class="dropdown-content" style="position: fixed !important; top: 64px !important;">       
        <!-- kann nur geoeffnet werden wenn user eingeloggt ist also kein guest annotation vonnoeten -->   
            <li>
                <a href="/users/{{Auth::id()}}">
                    <i class="material-icons fa fa-user"></i> 
                    Profil                   
                </a>
            </li>       
            <li class="divider"></li>
            <li>
                <a class="dropdown-item" href="{{ route('logout') }}"
                  onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                <i class="material-icons fas fa-sign-out-alt" ></i>
                    {{ __('Logout') }} 
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>
       </ul>

       <div class="navbar-fixed">
        <nav class="grey darken-4" id="header">
            <div class="nav-wrapper">            
                <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
                <ul class="right hide-on-med-and-down">
                @guest
                    <li><a href="{{ route('login') }}">{{ __('Login') }}</a></li>
                    <li><a href="{{ route('register') }}">{{ __('Register') }}</a></li>
                @else
                    @if(\App\Models\Message::getUnreadReceiveMessagesCount(Auth::id())> 0)
                        <li>
                            <a href="/messages"><i class="material-icons fas fa-envelope red-text"></i>Messages</a>
                        </li>
                    @endif
                    <li><a class="dropdown-trigger" href="#!" data-target="dropdown1">{{ Auth::user()->name }}<i class="material-icons right">arrow_drop_down</i></a></li>                      
                @endguest
                </ul>
            </div>
            </nav> 
    </div>
        <ul class="sidenav" id="mobile-demo">
                @if(Auth::check() && !empty($group) && (Request::url() != url('/groups')))                  
                        <li class="grey"><a href="/groups/{{$group['id']}}">
                            <span class="white-text name" style="padding: 8px;">{{$group['name']}}</span></a>
                        </li>           
                        <li>
                            <a href="/groups/{{$group['id']}}/boards" class="{{ Request::url() == url('/groups/' . $group['id'] . '/boards') ? 'green lighten-4' : '' }}"><div class="{{ Request::url() == url('/groups/' . $group['id'] . '/boards') ? 'sideBarIndicator green' : 'hide' }}">&nbsp;</div><i class="material-icons fas fa-object-group"></i>Board</a>                             
                        </li>   
                        <li>
                            <a href="/groups/{{$group['id']}}/issues" class="{{ starts_with(Request::url(), url('/groups/' . $group['id'] . '/issues'))? 'green lighten-4' : '' }}"><div class="{{ starts_with(Request::url(), url('/groups/' . $group['id'] . '/issues')) ? 'sideBarIndicator green' : 'hide' }}">&nbsp;</div><i class="material-icons">assignment</i>Issues</a>                             
                        </li>

                        @if(isset($userstory))
                            <li>
                                <a href="/" class="green lighten-4">
                                    <div class="sideBarIndicator green">&nbsp;</div>
                                    <i class="fas fa-tasks"></i>Issue
                                </a>                             
                            </li>
                        @endif


                        <li>
                            <a href="/groups/{{$group['id']}}" class="{{ (Request::url() == url('/groups/'.$group['id']))? 'green lighten-4' : '' }}"><div class="{{ (Request::url() == url('/groups/'.$group['id'])) ? 'sideBarIndicator green' : 'hide' }}">&nbsp;</div><i class="material-icons">group</i>Member</a>                                                         
                        </li>   
                        <li class="divider"></li>    
                        <li class="{{Request::url() == url('/groups') ? 'active' : '' }}">
                            <a href="/groups"><i class="material-icons fas fa-layer-group" style="font-size: 1.5rem;"></i>Groups</a>
                        </li>
                        <li class="divider"></li>       
                        <li>
                            <a href="/users/{{Auth::id()}}"><i class="material-icons fa fa-user" style="font-size: 1.5rem;"></i>Profil</a>
                        </li>
                        <li>
                            <a href="/messages"><i class="material-icons fas fa-envelope {{\App\Models\Message::getUnreadReceiveMessagesCount(Auth::id())> 0? 'red-text' : ''}}"></i>Messages</a>
                        </li>
                            <li>   <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                            <i class="material-icons fas fa-sign-out-alt" style="font-size: 1.5rem;"></i>
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form></li>
                @elseif(Auth::check())                              
                            <li>
                                <a href="/users/{{Auth::id()}}"><i class="material-icons fa fa-user"></i>Profil</a>
                            </li>
                            <li>
                                <a href="/messages"><i class="material-icons fas fa-envelope {{\App\Models\Message::getUnreadReceiveMessagesCount(Auth::id())> 0? 'red-text' : ''}}"></i>Messages</a>
                            </li>
                            <li class="divider"></li> 
                            <li class="{{Request::url() == url('/groups') ? 'active' : '' }}">
                                <a href="/groups"><i class="material-icons fas fa-layer-group" style="font-size: 1.5rem;"></i>Groups</a>
                            </li>
                            <li class="divider"></li>     
             
                            <li>                                    <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                            <i class="material-icons fas fa-sign-out-alt" style="font-size: 1.5rem;"></i>
                                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form></li>
                @else
                    <li><a href="{{ route('login') }}">{{ __('Login') }}</a></li>
                    <li><a href="{{ route('register') }}">{{ __('Register') }}</a></li>                                     
                @endif
        </ul>
    
        @if(Auth::check() && !empty($group) && (Request::url() != url('/groups')))
                <div id="sideBarWrapper">                    
                    <ul id="slide-out" class="sidenav sidenav-fixed">                            
                        <li class="grey"><a href="/groups/{{$group['id']}}">
                            <span class="white-text name" style="padding: 8px;">{{$group['name']}}</span></a>
                        </li>           
                        <li>
                            <a href="/groups/{{$group['id']}}/boards" class="{{ Request::url() == url('/groups/' . $group['id'] . '/boards') ? 'green lighten-4' : '' }}"><div class="{{ Request::url() == url('/groups/' . $group['id'] . '/boards') ? 'sideBarIndicator green' : 'hide' }}">&nbsp;</div><i class="material-icons fas fa-object-group"></i>Board</a>                             
                        </li>   
                        <li>
                            <a href="/groups/{{$group['id']}}/issues" class="{{ starts_with(Request::url(), url('/groups/' . $group['id'] . '/issues'))? 'green lighten-4' : '' }}"><div class="{{ starts_with(Request::url(), url('/groups/' . $group['id'] . '/issues')) ? 'sideBarIndicator green' : 'hide' }}">&nbsp;</div><i class="material-icons">assignment</i>Issues</a>                             
                        </li>
                        @if(isset($userstory))
                            <li>
                                <a href="/" class="green lighten-4">
                                    <div class="sideBarIndicator green">&nbsp;</div>
                                    <i class="fas fa-tasks"></i>Issue
                                </a>                            
                            </li>
                        @endif
                        <li>
                            <a href="/groups/{{$group['id']}}" class="{{ (Request::url() == url('/groups/'.$group['id']))? 'green lighten-4' : '' }}"><div class="{{ (Request::url() == url('/groups/'.$group['id'])) ? 'sideBarIndicator green' : 'hide' }}">&nbsp;</div><i class="material-icons">group</i>Member</a>                                                         
                        </li>
                        <li class="divider"></li>                  
                        <li class="{{Request::url() == url('/groups') ? 'active' : '' }}">
                            <a href="/groups"><i class="material-icons fas fa-layer-group" style="font-size: 1.5rem;"></i>Groups</a>
                        </li>      
                    </ul>
                </div>
        @endif
        <div class="container" id='mainContainer'>
            @yield('content')       
        </div>
  </body>
</html>



