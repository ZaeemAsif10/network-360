<!DOCTYPE html>
<html>

<head>
    <!-- Basic Page Info -->
    <meta charset="utf-8" />
    <title>Super Admin</title>

    <!-- Site favicon -->
    <link rel="apple-touch-icon" sizes="180x180"
        href="{{ asset('public/superadmin-assets/vendors/images/apple-touch-icon.png') }}" />
    <link rel="icon" type="image/png" sizes="32x32"
        href="{{ asset('public/superadmin-assets/vendors/images/favicon-32x32.png') }}" />
    <link rel="icon" type="image/png" sizes="16x16"
        href="{{ asset('public/superadmin-assets/vendors/images/favicon-16x16.png') }}" />

    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet" />
    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('public/superadmin-assets/vendors/styles/core.css') }}" />
    <link rel="stylesheet" type="text/css"
        href="{{ asset('public/superadmin-assets/vendors/styles/icon-font.min.css') }}" />

    <link rel="stylesheet" type="text/css" href="{{ asset('public/superadmin-assets/vendors/styles/style.css') }}" />

    <link rel="stylesheet" type="text/css" href="{{ asset('public/superadmin-assets/src/styles/toastr.css') }}" />

    @yield('styles')

</head>

<body>

    <!-- Preloader Start -->
    {{-- <div class="pre-loader">
        <div class="pre-loader-box">
            <div class="loader-logo">
                <img src="{{ asset('public/superadmin-assets/vendors/images/deskapp-logo.svg') }}" alt="" />
            </div>
            <div class="loader-progress" id="progress_div">
                <div class="bar" id="bar1"></div>
            </div>
            <div class="percent" id="percent1">0%</div>
            <div class="loading-text">Loading...</div>
        </div>
    </div> --}}
    <!-- Preloader End -->




    @include('superadmin-side.setup.header')
    @include('superadmin-side.setup.sidebar')

    <div class="mobile-menu-overlay"></div>
    <div class="main-container">
        @yield('content')

        @include('superadmin-side.setup.footer')
    </div>







    <!-- js -->
    <script src="{{ asset('public/superadmin-assets/vendors/scripts/core.js') }}"></script>
    <script src="{{ asset('public/superadmin-assets/vendors/scripts/script.min.js') }}"></script>
    <script src="{{ asset('public/superadmin-assets/vendors/scripts/process.js') }}"></script>
    <script src="{{ asset('public/superadmin-assets/src/scripts/toastr.min.js') }}"></script>
    <script src="{{ asset('public/superadmin-assets/vendors/scripts/layout-settings.js') }}"></script>
    <script src="{{ asset('public/superadmin-assets/validation/validate.js') }}"></script>
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NXZMQSS" height="0" width="0"
            style="display: none; visibility: hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
    
    <!-- CDN for Sweet Alert -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    @yield('scripts')

    @include('superadmin-side.setup.message.message')


</body>

</html>
