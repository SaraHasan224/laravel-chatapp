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
</head>
<body>
    <div class="app-container app-theme-white body-tabs-shadow fixed-header fixed-sidebar">
        @include('admin.includes.header')    
        <div class="app-main">
            @include('admin.includes.sidebar')  
            <div class="app-main__outer">  

                <div class="app-main__inner">
                        {{--<div class="app-page-title">--}}
                            {{--<div class="page-title-wrapper">--}}
                                {{--<div class="page-title-heading">--}}
                                    {{--<div class="page-title-icon">--}}
                                        {{--<i class="metismenu-icon  @yield('icon_name') icon-gradient bg-plum-plate">--}}
                                        {{--</i>--}}
                                    {{--</div>--}}
                                    {{--<div>@yield('page_heading')</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}

                    @include('admin.includes.alerts')

                    @yield('content')
                </div>
            
                @include('admin.includes.footer')
            </div>
        </div>
    </div>

    @include('admin.includes.listing_include')
    <div class="app-drawer-overlay d-none animated fadeIn"></div>
    <script
            src="https://code.jquery.com/jquery-3.4.1.min.js"
            integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
            crossorigin="anonymous"></script>
    <script src="https://js.pusher.com/5.0/pusher.min.js"></script>
    <script type="text/javascript">
        // Enable pusher logging - don't include this in production (ENABLE LOGGING IN THE CHANNELS JAVASCRIPT LIBRARY)
        Pusher.logToConsole = true;
        //OPEN A CONNECTION TO CHANNELS
        var pusher = new Pusher('7c4aa3b4b157383f6bf7', {
            cluster: 'ap2',
            forceTLS: true
        });
        //DETECTING CONNECTION LIMITS
//        pusher.connection.bind( 'error', function( err ) {
//            if( err.error.data.code === 4004 ) {
//                log('>>> detected limit error');
//            }
//        });
        //SUBSCRIBE TO A CHANNEL
        var channel = pusher.subscribe('my-channel');
        //LISTEN FOR EVENTS ON YOUR CHANNEL
        channel.bind('my-event', function(data) {
            message = JSON.parse(JSON.stringify(data));
            $('.chat-box-event-sent-name').text(message.name);
            $('.chat-box-event-sent-message').text(message.message);

        });
        pusher.connection.bind('state_change', function(states) {
            // states = {previous: 'oldState', current: 'newState'}
            console.log("Channels current state is " + states.current);
        });
        //BINDING TO CONNECTION EVENTS
//        pusher.connection.bind('connected', function() {
//            $('.chat-box-event-sent').text(data);
//        });

        //DISCONNECTING FROM CHANNELS
//        pusher.disconnect();
    </script>
    <script type="text/javascript" src="{{ asset('assets/scripts/style.js') }}"></script>
    @yield('scripts')
</body>
</html>
