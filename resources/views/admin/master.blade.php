<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Caravan - @yield('page_title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no"/>
    <meta name="description" content="This is an example dashboard created using build-in elements and components.">
    <!-- Disable tap highlight on IE -->
    <meta name="msapplication-tap-highlight" content="no">
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}" type="image/x-icon">
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
    <div class="app-container app-theme-white body-tabs-shadow fixed-header fixed-sidebar">
        @include('admin.includes.header')    
        <div class="app-main">
            @include('admin.includes.sidebar')  
            <div class="app-main__outer">  

                <div class="app-main__inner">
                    @include('admin.includes.alerts')

                    @yield('content')
                </div>
            
                @include('admin.includes.footer')
            </div>
        </div>
    </div>

    @include('admin.includes.listing_include')
    <div class="app-drawer-overlay d-none animated fadeIn"></div>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/scripts/style.js') }}"></script>

    @yield('scripts')
</body>
</html>
