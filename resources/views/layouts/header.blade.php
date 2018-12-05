
{{--/**--}}
 {{--* Created by PhpStorm.--}}
 {{--* User: tim--}}
 {{--* Date: 29/08/18--}}
 {{--* Time: 5:55 PM--}}
 {{--*/--}}

<nav class="navbar navbar-expand-md navbar-light navbar-laravel font-weight-bold bg-light">
    <div class="container">
        <a class="navbar-brand text-secondary" href="{{ url('/') }}">
        <img src={{ asset('img/logo.png') }} style="width:150px;" class="mr-3">  </a>
        <a class="navbar-brand text-secondary" href="{{ url('/') }}">

            <span>{{ config('app.name', 'Laravel') }}</span>

        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">
                <li class="">
                    <a class="nav-link" href="{{url('/posts')}}">Posts</a>
                </li>


            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">

                <li><a class="nav-link" href="{{ url('/posts/create') }}"><i class="fas fa-plus"></i>   </a></li>
                <li></li>

                <!-- Authentication Links -->
                @guest
                    <li><a class="nav-link" href="{{ url('/login') }}">Login</a></li>
                    <li><a class="nav-link" href="{{ url('/register') }}">Register</a></li>
                @else
                    <li class="nav-item dropdown">


                        <a id="navbarDropdown"
                           class="nav-link dropdown-toggle"
                           href="#" role="button"
                           data-toggle="dropdown"
                           aria-haspopup="true"
                           aria-expanded="false">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ url('/logout') }}"
                               onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                Logout
                            </a>

                            <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                            <a class="dropdown-item" href="{{ url('/user') }}">
                                User
                            </a>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>

{{--<nav class="navbar navbar-expand-md bg-dark navbar-dark">--}}
    {{--<a class="navbar-brand" href="#">Trip Sharing</a>--}}
    {{--<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">--}}
        {{--<span class="navbar-toggler-icon"></span>--}}
    {{--</button>--}}
    {{--<div class="collapse navbar-collapse" id="collapsibleNavbar">--}}
        {{--<ul class="navbar-nav">--}}

        {{--</ul>--}}
    {{--</div>--}}
{{--</nav>--}}
