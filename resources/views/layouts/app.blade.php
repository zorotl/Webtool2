@php
    $links_nav = App\Link::orderBy('link_sort')->get();
@endphp

<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Webtools | @yield('sitetitle')</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/custom.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark bg-primary shadow-sm">
            <div class="container-xl">
                <a class="navbar-brand" href="{{ url('/home') }}">
                    <i class="fas fa-warehouse"></i>
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('home') ? 'active' : '' }}" href="{{ route('home') }}">Home</a>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle {{ Request::is('warehouse*') ? 'active' : '' }}"
                               href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Lager
                            </a>
                            <div class="dropdown-menu" aria-labelledby="dropdown01">
                                <a class="dropdown-item" href="{{ route('item.index') }}">Artikel anzeigen</a>
                                <a class="dropdown-item" href="{{ route('item.create') }}">Artikel hinzufügen</a>
                                @auth
                                    <a class="dropdown-item bg-primary text-white" href="{{ route('warehouse.index') }}">Lager</a>
                                    <a class="dropdown-item bg-primary text-white" href="{{ route('brand.index') }}">Marken</a>
                                    <a class="dropdown-item bg-primary text-white" href="{{ route('itemType.index') }}">Artikel-Arten</a>
                                    <a class="dropdown-item bg-primary text-white" href="{{ route('itemCondition.index') }}">Artikel-Zustände</a>
                                @endauth
                            </div>
                        </li>

                        {{--                    <li class="nav-item dropdown">--}}
                        {{--                        <a class="nav-link dropdown-toggle {{ Request::is('shop*') ? 'active' : '' }}"--}}
                        {{--                           href="#" id="dropdown02" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
                        {{--                            Shop--}}
                        {{--                        </a>--}}
                        {{--                        <div class="dropdown-menu" aria-labelledby="dropdown02">--}}
                        {{--                            <a class="dropdown-item" href="#">Suche</a>--}}
                        {{--                            <a class="dropdown-item" href="#">Bestellungen</a>--}}
                        {{--                            <a class="dropdown-item" href="#">Verwaltung</a>--}}
                        {{--                            <a class="dropdown-item" href="#">Statistik</a>--}}
                        {{--                            <a class="dropdown-item" href="#">History</a>--}}
                        {{--                        </div>--}}
                        {{--                    </li>--}}

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle {{ Request::is('calculator*') ? 'active' : '' }}"
                               href="#" id="dropdown03" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Rechner
                            </a>
                            <div class="dropdown-menu" aria-labelledby="dropdown03">
                                <a class="dropdown-item" href="{{ route('calculator.index') }}">Rechner</a>
                                @auth
                                    <a class="dropdown-item bg-primary text-white" href="{{ route('calculator.edit', '1') }}">Konfiguration</a>
                                @endauth
                            </div>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle {{ Request::is('links*') ? 'active' : '' }}"
                               href="#" id="dropdown05" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Links
                            </a>
                            <div class="dropdown-menu" aria-labelledby="dropdown05">
                                @foreach($links_nav as $link_nav)
                                    <a class="dropdown-item" target="_blank" href="{{ $link_nav->link_url }}">{{ $link_nav->link_name }}</a>
                                @endforeach
                                @auth
                                    <a class="dropdown-item bg-primary text-white" href="{{ route('link.index') }}">Links bearbeiten</a>
                                @endauth
                            </div>
                        </li>

                        {{--                    <li class="nav-item dropdown">--}}
                        {{--                        <a class="nav-link dropdown-toggle {{ Request::is('account*') ? 'active' : '' }}"--}}
                        {{--                           href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
                        {{--                            Mein Konto--}}
                        {{--                        </a>--}}
                        {{--                        <div class="dropdown-menu" aria-labelledby="dropdown04">--}}
                        {{--                            <a class="dropdown-item" href="#">Mein Konto</a>--}}
                        {{--                            <a class="dropdown-item" href="#">User: Verwaltung</a>--}}
                        {{--                            <a class="dropdown-item" href="#">Link: Verwaltung</a>--}}
                        {{--                            <a class="dropdown-item" href="#">Website: Verwaltung</a>--}}
                        {{--                        </div>--}}
                        {{--                    </li>--}}
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @isset($msg_success)
                <div class="container">
                    <div class="alert alert-success">
                        {!! $msg_success !!}
                    </div>
                </div>
            @endisset

            @if($errors->any())
                <div class="container">
                    <div class="alert alert-danger">
                        Bitte überprüfe deine Eingaben.
                        <ul class="mb-0">
                            @foreach($errors->all() as $error)
                                <li>{!! $error !!}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endif

            @yield('content')
        </main>

        <!-- Footer -->
        <footer class="footer mt-auto py-3 bg-primary text-white text-center">
            <ul class="list-inline">
                <li class="list-inline-item pr-3">
                    <a class="text-white"
                       href="mailto:info@stws.ch?subject=Anfrage%20von%20webtools.stws.ch">info@stws.ch</a>
                </li>
                <li class="list-inline-item pr-3">
                    <a class="text-white" href="#" data-toggle="modal" data-target="#modalImpressum">Impressum</a>
                </li>
                <li class="list-inline-item pr-3">
                    <a class="text-white" href="#" data-toggle="modal" data-target="#modalDatenschutz">Datenschutz</a>
                </li>
                <li class="list-inline-item">&copy; 2021 Webtools</li>
            </ul>
        </footer>

        @include('impressum')
        @include('datenschutz')
        <!-- End Footer -->
    </div>
</body>
</html>
