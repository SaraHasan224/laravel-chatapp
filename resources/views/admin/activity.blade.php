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
                            Private Events
                        </div>
                    </div>
                    <div class="scroll-area-lg">
                        <div class="scrollbar-container">
                            <div class="p-4 events-append">
                                @foreach($activities as $activity)
                                    <div class="vertical-time-simple vertical-without-time vertical-timeline vertical-timeline--animate vertical-timeline--one-column">
                                        <div class="vertical-timeline-item dot-danger vertical-timeline-element">
                                            <div>
                                                <span class="vertical-timeline-element-icon bounce-in"></span>
                                                <div class="vertical-timeline-element-content bounce-in">
                                                    <h4 class="timeline-title">
                                                        Subject Id : {{ $activity->subject_id }} <br/>
                                                        Subject Type : {{ $activity->subject_type }} <br/>
                                                        Subject Name : {{ $activity->name }} <br/>
                                                        <span class="text-success">&nbsp; sent by {{$activity->user->name}}</span>
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
                            Generate an Activity
                        </div>
                    </div>
                    <div class="scroll-area-lg">
                        <div class="scrollbar-container">
                            <div class="p-4">
                                <form id="activity-form" action="{{ url('record-activity') }}" method="POST">
                                    {{ csrf_field() }}
                                    <div class="position-relative form-group">
                                        <label for="exampleEmail" class="">Subject Id</label>
                                        <input name="subject_id" id="subject_id" class="form-control" type="number" required/>
                                    </div>
                                    <div class="position-relative form-group">
                                        <label for="exampleEmail" class="">Subject Type</label>
                                        <input type="text" name="subject_type" id="subject_type" class="form-control" required/>
                                    </div>
                                    <div class="position-relative form-group">
                                        <label for="exampleEmail" class="">Name</label>
                                        <input type="text" name="name" id="name" class="form-control" required/>
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
        $('#activity-form').submit(function (event) {
            event.preventDefault();
            $.ajax({
                type: "POST",
                headers:
                    {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                url: "{{ url('record-activity') }}",
                data: $("#activity-form").serialize(),
                success: function (response) {

                }
            });
        });


        // Enable pusher logging - don't include this in production (ENABLE LOGGING IN THE CHANNELS JAVASCRIPT LIBRARY)
        Pusher.logToConsole = true;
        //OPEN A CONNECTION TO CHANNELS
        var pusher = new Pusher('7c4aa3b4b157383f6bf7', {
            cluster: 'ap2',
            forceTLS: true,
            authEndpoint: 'http://chat-app.local/broadcasting/auth',
            auth: {
                headers: {
                    'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
                }
            }
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
            var channelName = "private-activity."+"{{\Illuminate\Support\Facades\Auth::user()->id}}";
            var channel = pusher.subscribe(channelName);
            //LISTEN FOR EVENTS ON YOUR CHANNEL
            channel.bind('App\\Events\\ActivityLogged', function (data) {
                var data = JSON.parse(JSON.stringify(data));
                var activity = data.activity;
                var user = activity.user;
                console.log(activity);
                console.log(user);
                var content = '<div class="vertical-time-simple vertical-without-time vertical-timeline vertical-timeline--animate vertical-timeline--one-column">' +
                    '    <div class="vertical-timeline-item dot-danger vertical-timeline-element">' +
                    '        <div>' +
                    '            <span class="vertical-timeline-element-icon bounce-in"></span>' +
                    '            <div class="vertical-timeline-element-content bounce-in">' +
                    '                <h4 class="timeline-title"> Subject ID:' + activity.subject_id + '<br/>Subject Type: '+activity.subject_type+'<br/>Subject Name: '+activity.name+'<span class="text-success">&nbsp; sent by ' + user.name + '</span></h4>' +
                    '            </div>' +
                    '        </div>' +
                    '    </div>' +
                    '</div>';
                $('.events-append').prepend(content);
            });
        });
        // Unsubscribe
        //        pusher.unsubscribe(channelName);
        //DISCONNECTING FROM CHANNELS
        //        pusher.disconnect();

    </script>
@endsection
