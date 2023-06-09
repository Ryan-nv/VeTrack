<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    {{-- style --}}
    <link rel="stylesheet" href="{{ asset('css/sidebar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/select2/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    @stack('styles')

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <script src="{{ asset('js/sidebar.js') }}" defer></script>
    <script src="{{ asset('js/jquery.js') }}" defer></script>
    {{-- <script src="https://kit.fontawesome.com/b0b9583fe0.js" crossorigin="anonymous" defer></script> --}}
    <script src="{{ asset('js/select2/select2.min.js') }}" defer></script>

    <script type="module" defer>
        $(document).ready(function() {
             $('.select2').select2({
                 width: '100%'
             });
             flatpickr(".datetimeinput", {
                 enableTime : true,
                 dateFormat : 'Y-m-d H:i'
             });
             flatpickr(".dateinput", {
                 enableTime : false,
                 dateFormat : 'Y-m-d'
             });

        });

    </script>
    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>

    @stack('scripts')
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark bg-primary shadow-lg">
            <div class="container-fluid px-3">
                <a class="navbar-brand text-light fw-bold me-auto" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <!-- Right Side Of Navbar -->
                <div class="ms-auto ">
                    <!-- Authentication Links -->
                    @guest
                        @if (Route::has('login'))
                                <a class="text-light mx-1 text-decoration-none" href="{{ route('login') }}">{{ __('Login') }}</a>
                        @endif

                        @if (Route::has('register'))
                                <a class="text-light mx-1 text-decoration-none" href="{{ route('register') }}">{{ __('Register') }}</a>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle text-light" href="#" role="button"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </div>
                {{-- <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                   
                </div> --}}
            </div>
        </nav>
        <div class="app-container position-absolute bottom-0 d-flex w-100">
            {{-- @include('components.sidebar') --}}
            <div class="mx-4 my-3 w-100" id="content">
                @yield('content')
            </div>
        </div>
    </div>
</body>

</html>
