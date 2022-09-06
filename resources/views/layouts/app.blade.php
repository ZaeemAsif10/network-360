<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('public/js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('public/css/app.css') }}" rel="stylesheet">
</head>

<body>
    <div id="app">

        <header class="topmenu bg-light" style="position: sticky;">
            <div id="header-waypoint" class="main-header">
                <div class="container-fluid w90">
                    <div class="row">
                        <div class="col-12">
                            <nav class="navbar navbar-expand-lg navbar-light">
                                <h4 class="font-wieght-bold">NETWORK-360</h4>
                                <button class="navbar-toggler" type="button" data-toggle="collapse"
                                    id="header-waypoint" data-target="#navbarSupportedContent"
                                    aria-controls="navbarSupportedContent" aria-expanded="false"
                                    aria-label="Toggle navigation">
                                    <span class="fas fa-bars"></span>
                                </button>

                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </header>

    </div>

    <main class="py-4">
        @yield('content')
    </main>
    </div>
</body>

</html>
