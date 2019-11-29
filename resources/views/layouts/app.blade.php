<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
            <nav class="navbar" role="navigation" aria-label="main navigation">
                    <div class="navbar-brand">
                      <a class="navbar-item" href="/">
                        {{ config('app.name', 'Laravel') }}
                      </a>
                  
                      <a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
                        <span aria-hidden="true"></span>
                        <span aria-hidden="true"></span>
                        <span aria-hidden="true"></span>
                      </a>
                    </div>
                  
                    <div id="navbarBasicExample" class="navbar-menu">
                      <div class="navbar-start">
                        <a class="navbar-item">
                          Home
                        </a>
                  
                        <a class="navbar-item" href="posts">
                          Posts
                        </a>

                        <a class="navbar-item" href="event_list">
                          Events
                        </a>
                  
                        <div class="navbar-item has-dropdown is-hoverable">
                          <a class="navbar-link">
                            More
                          </a>
                  
                          <div class="navbar-dropdown">
                            <a class="navbar-item">
                              About
                            </a>
                            <a class="navbar-item">
                              Jobs
                            </a>
                            <a class="navbar-item">
                              Contact
                            </a>
                            <hr class="navbar-divider">
                            <a class="navbar-item">
                              Report an issue
                            </a>
                          </div>
                        </div>
                      </div>
                  
                      <div class="navbar-end">
                          

                      @guest
                            <li class="navbar-item">
                                <a class="button is-info" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                {{-- <li class="navbar-item">
                                    <a class="button is-light" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li> --}}
                            @endif
                        @else
                            <div class="navbar-item has-dropdown is-hoverable">
                                <a class="navbar-link" href="/profile">
                                    {{ Auth::user()->name }}
                                </a>
                        
                                <div class="navbar-dropdown">
                                  <a class="navbar-item" href="{{ route('logout') }}"
                                  onclick="event.preventDefault();
                                              document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                                </div>
                            </div>
                        @endguest
                      </div>
                    </div>
                  </nav>
        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
