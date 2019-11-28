@extends('admin.master')
@section('page_title','Admin Dashboard')
@section('page_heading','Admin Dashboard')
@section('icon_name','pe-7s-rocket')
@section('content')
    <div class="tabs-animation">
        <div class="row">
            <div class="col-sm-12 col-lg-6">
                <div class="card-hover-shadow-2x mb-3 card">
                    <div class="card-header-tab card-header">
                        <div class="card-header-title font-size-lg text-capitalize font-weight-normal">
                            <i class="header-icon lnr-lighter icon-gradient bg-amy-crisp"> </i>
                            Public Events
                        </div>
                    </div>
                    <div class="scroll-area-lg">
                        <div class="scrollbar-container">
                            <div class="p-4 events-append">
                                @foreach($messages as $message)
                                    <div class="vertical-time-simple vertical-without-time vertical-timeline vertical-timeline--animate vertical-timeline--one-column">
                                        <div class="vertical-timeline-item dot-danger vertical-timeline-element">
                                            <div>
                                                <span class="vertical-timeline-element-icon bounce-in"></span>
                                                <div class="vertical-timeline-element-content bounce-in">
                                                    <h4 class="timeline-title">{{ $message->message }}<span
                                                                class="text-success">&nbsp; sent by {{$message->user->name}}</span>
                                                    </h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-lg-6">
                <div class="card-hover-shadow-2x mb-3 card">
                    <div class="card-header-tab card-header">
                        <div class="card-header-title font-size-lg text-capitalize font-weight-normal">
                            <i class="header-icon lnr-lighter icon-gradient bg-amy-crisp"> </i>
                            Generate Event
                        </div>
                    </div>
                    <div class="scroll-area-lg">
                        <div class="scrollbar-container">
                            <div class="p-4">
                                <form id="event-form" action="{{ url('generate-event') }}" method="POST">
                                    {{ csrf_field() }}
                                    <div class="position-relative form-group">
                                        <label for="exampleEmail" class="">Message</label>
                                        <textarea name="message" id="message" class="form-control" required></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-secondary btn-wide pull-right">Trigger</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script type="text/javascript">
        $('#event-form').submit(function (event) {
            event.preventDefault();
            $.ajax({
                type: "POST",
                headers:
                    {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                url: "{{ url('generate-event') }}",
                data: $("#event-form").serialize(),
                success: function (response) {

                }
            });
        });


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

        pusher.connection.bind('state_change', function (states) {
            // states = {previous: 'oldState', current: 'newState'}
            console.log("Channels current state is " + states.current);
        });
        //BINDING TO CONNECTION EVENTS
        pusher.connection.bind('connected', function () {
            //SUBSCRIBE TO A CHANNEL
            var channel = pusher.subscribe('my-channel');
            //LISTEN FOR EVENTS ON YOUR CHANNEL
            channel.bind('my-event', function (data) {
                var data = JSON.parse(JSON.stringify(data));
                var message = data.message;
                var user = data.user;
                var content = '<div class="vertical-time-simple vertical-without-time vertical-timeline vertical-timeline--animate vertical-timeline--one-column">' +
                    '    <div class="vertical-timeline-item dot-danger vertical-timeline-element">' +
                    '        <div>' +
                    '            <span class="vertical-timeline-element-icon bounce-in"></span>' +
                    '            <div class="vertical-timeline-element-content bounce-in">' +
                    '                <h4 class="timeline-title">' + message.message + '<span class="text-success">&nbsp; sent by ' + user.name + '</span></h4>' +
                    '            </div>' +
                    '        </div>' +
                    '    </div>' +
                    '</div>';
                $('.events-append').prepend(content);
            });
        });

        //DISCONNECTING FROM CHANNELS
        //        pusher.disconnect();

    </script>
@endsection
