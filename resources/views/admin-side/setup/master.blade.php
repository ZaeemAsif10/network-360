<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=5, user-scalable=1"
        name="viewport" />

    <meta name="csrf-token" content="5rUT9nnRuz9qzzoN08v8x5aGAlxysWxbGaVDIbpM">

    <!-- Fonts-->
    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,600,700,800" rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- CSS Library-->

    <style>
        :root {
            --primary-color: #1D5F6F;
            --primary-color-rgb: rgba(29, 95, 111, 0.8);
            --primary-color-hover: #063A5D;
            --primary-font: 'Nunito Sans';
        }
    </style>

    <link rel="shortcut icon" href="storage/logo/favicon.png">

    <title>Network 360</title>
    <meta name="description" content="Find your favorite homes at Flex Home">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta property="og:site_name" content="Flex Home">
    <meta property="og:title" content="Flex Home">
    <meta property="og:description" content="Find your favorite homes at Flex Home">
    <meta property="og:url" content="#">
    <meta property="og:type" content="article">
    <meta name="twitter:title" content="Home">
    <meta name="twitter:description" content="Find your favorite homes at Flex Home">

    <meta name="description" content="Find your favorite homes at Flex Home">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta property="og:site_name" content="Flex Home">
    <meta property="og:title" content="Flex Home">
    <meta property="og:description" content="Find your favorite homes at Flex Home">
    <meta property="og:url" content="#">
    <meta property="og:type" content="article">
    <meta name="twitter:title" content="Home">
    <meta name="twitter:description" content="Find your favorite homes at Flex Home">
    <link media="all" type="text/css" rel="stylesheet"
        href="{{ asset('public/assets/vendor/core/core/base/libraries/font-awesome/css/fontawesome.min.css') }}">
    <link media="all" type="text/css" rel="stylesheet"
        href="{{ asset('public/assets/vendor/core/core/base/libraries/select2/css/select2.min.css') }}">
    <link media="all" type="text/css" rel="stylesheet"
        href="{{ asset('public/assets/vendor/core/core/base/libraries/select2/css/select2-bootstrap.min.css') }}">
    <link media="all" type="text/css" rel="stylesheet"
        href="{{ asset('public/assets/vendor/core/core/base/libraries/toastr/toastr.min.css') }}">
    <link media="all" type="text/css" rel="stylesheet"
        href="{{ asset('public/assets/vendor/core/core/base/libraries/bootstrap-datepicker/css/bootstrap-datepicker3.min.css') }}">
    <link media="all" type="text/css" rel="stylesheet"
        href="{{ asset('public/assets/vendor/core/core/base/css/core.css') }}">
    <link media="all" type="text/css" rel="stylesheet"
        href="{{ asset('public/assets/vendor/core/plugins/language/css/language.css') }}">
    <script src="{{ asset('public/assets/vendor/core/core/base/libraries/bootstrap.bundle.min.js') }}"></script>
    <link media="all" type="text/css" rel="stylesheet"
        href="{{ asset('public/assets/vendor/core/core/base/css/themes/default.css') }}">

    <!-- Styles -->
    <link href="{{ asset('public/assets/vendor/core/plugins/real-estate/css/app.css') }}" rel="stylesheet">

    <script src="{{ asset('public/assets/libraries/jquery.min.js') }}"></script>
    <script src="{{ asset('public/assets/libraries/bootstrap/popper.min.js') }}"></script>
    <script src="{{ asset('public/assets/libraries/bootstrap/bootstrap.min.js') }}"></script>
    <script src="{{ asset('public/assets/libraries/owl-carousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('public/assets/libraries/jquery.matchHeight-min.js') }}"></script>
</head>

<body>


    <div id="alert-container"></div>

    <div id="app">

        @include('admin-side.setup.header')

        @yield('content')

        @include('admin-side.setup.footer')

    </div>



    <script src="{{ asset('public/assets/libraries/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('public/assets/vendor/core/core/base/libraries/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('public/assets/js/app.js') }}"></script>
    <script src="{{ asset('public/assets/js/components.js') }}"></script>
    <script src="{{ asset('public/assets/js/wishlist.js') }}"></script>
    <script src="{{ asset('public/assets/vendor/core/plugins/cookie-consent/js/cookie-consent.js') }}"></script>
    <script src="{{ asset('public/assets/vendor/core/plugins/language/js/language-public.js') }}"></script>
    <script src="{{ asset('public/superadmin-assets/validation/validate.js') }}"></script>
    <script src="{{ asset('public/assets/vendor/core/core/base/libraries/toastr/toastr.min.js') }}"></script>

    <script>
        function reveal() {
            var reveals = document.querySelectorAll(".reveal");

            for (var i = 0; i < reveals.length; i++) {
                var windowHeight = window.innerHeight;
                var elementTop = reveals[i].getBoundingClientRect().top;
                var elementVisible = 150;

                if (elementTop < windowHeight - elementVisible) {
                    reveals[i].classList.add("active");
                } else {
                    reveals[i].classList.remove("active");
                }
            }
        }

        window.addEventListener("scroll", reveal);
    </script>

    @yield('scripts')

            <!-- CDN for Sweet Alert -->
            <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>


            @yield('scripts')
        
            @include('superadmin-side.setup.message.message')

</body>

</html>
