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
                      <a class="navbar-item" href="{{ route('index') }}" style="font-weight:500;">
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
                        <a class="navbar-item" href="/posts">
                          Posts
                        </a>

                        <a class="navbar-item" href="/event_list">
                          Events
                        </a>

                        <a class="navbar-item" href="/group_list">
                          Groups
                        </a>
                        </div>
                      </div>

                      <div class="navbar-center">

                      </div>

                      <div class="navbar-end">
                      @guest
                            <li class="navbar-item">
                                <a class="button is-primary" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                        @else



                        @if($isAdmin ?? '')
                                  <a class="navbar-item" href="/event_rates">
                                      System Rates
                                  </a>
                        @endif
                        <a class="navbar-item" href="/dm_recipients">
                          Messages
                        </a>
                            <div class="navbar-item has-dropdown is-hoverable">
                                <a class="navbar-link" href="/profile">
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="navbar-dropdown">
                                <a class="navbar-item" href="{{ route('create_group')}}">Create Group</a>
                                <a class="navbar-item" href="/payment">Payment</a>

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
