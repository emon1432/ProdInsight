<!DOCTYPE html>
<html lang="en" class="layout-navbar-fixed layout-compact layout-menu-fixed" dir="ltr" data-skin="default"
    data-assets-path="/assets/" data-template="vertical-menu-template" data-bs-theme="light">

<head>
    <meta charset="utf-8">
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">
    <meta name="robots" content="noindex">
    <title>Demo: Dashboard - Analytics | Vuexy - Bootstrap Dashboard PRO</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('assets') }}/img/favicon/favicon.ico">
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&amp;ampdisplay=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets') }}/vendor/fonts/iconify-icons.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/vendor/libs/node-waves/node-waves.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/vendor/libs/pickr/pickr-themes.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/vendor/css/core.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/css/demo.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/vendor/libs/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/vendor/fonts/flag-icons.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/vendor/css/pages/cards-advance.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/vendor/libs/iziToast/iziToast.css">
    <script src="{{ asset('assets') }}/vendor/js/helpers.js"></script>
    <script src="{{ asset('assets') }}/vendor/js/template-customizer.js"></script>
    <script src="{{ asset('assets') }}/js/config.js"></script>
    @stack('styles')
</head>

<body style="--bs-scrollbar-width: 15px;">
    <div class="layout-wrapper layout-content-navbar  ">
        <div class="layout-container">
            @include('layouts.includes.sidebar')
            <div class="layout-page">
                @include('layouts.includes.navbar')
                <div class="content-wrapper">
                    <div class="container-fluid flex-grow-1 container-p-y">
                        <div class="row g-6">
                            @yield('content')
                        </div>
                    </div>
                    @include('layouts.includes.footer')
                </div>
            </div>
        </div>
        @include('layouts.includes.layout-menu-toggle')
    </div>
    <script src="{{ asset('assets') }}/vendor/libs/jquery/jquery.js"></script>
    <script src="{{ asset('assets') }}/vendor/libs/popper/popper.js"></script>
    <script src="{{ asset('assets') }}/vendor/js/bootstrap.js"></script>
    <script src="{{ asset('assets') }}/vendor/libs/node-waves/node-waves.js"></script>
    <script src="{{ asset('assets') }}/vendor/libs/@algolia/autocomplete-js.js"></script>
    <script src="{{ asset('assets') }}/vendor/libs/pickr/pickr.js"></script>
    <script src="{{ asset('assets') }}/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="{{ asset('assets') }}/vendor/libs/i18n/i18n.js"></script>
    <script src="{{ asset('assets') }}/vendor/js/menu.js"></script>
    <script src="{{ asset('assets') }}/vendor/libs/iziToast/iziToast.js"></script>
    <script src="{{ asset('assets') }}/js/main.js"></script>
    @include('layouts.includes.toast')
    @stack('scripts')
</body>

</html>
