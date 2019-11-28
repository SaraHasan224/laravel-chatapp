@extends('admin.master')
@section('page_title','Admin Dashboard')
@section('page_heading','Admin Dashboard')
@section('icon_name','pe-7s-rocket')
@section('content')
    <div class="tabs-animation">
        <div class="row">

            <div class="mb-3 card col-md-12">
                <div class="card-header-tab card-header">
                    <div class="card-header-title font-size-lg text-capitalize font-weight-normal">
                        <i class="header-icon pe-7s-signal icon-gradient bg-happy-green"> </i>
                        Live Tracking
                    </div>
                </div>
                <div class="no-gutters row">
                    <div class="col-sm-12 col-md-12 col-xl-12">
                        <div class="card-body">
                            <div id="map" style="height:400px"></div>
                        </div>
                        <div class="divider m-0 d-md-none d-sm-block"></div>
                    </div>
                </div>
                <div class="text-center d-block p-3 card-footer">
                    <button class="btn-pill btn-shadow btn-wide fsize-1 btn btn-primary btn-lg" onclick="location.href='{{ url("caravan-base/trip/logs") }}'">
                    <span class="mr-2 opacity-7">
                        <i class="icon icon-anim-pulse ion-ios-analytics-outline"></i>
                    </span>
                        <span class="mr-1">Track Specific Trip</span>
                    </button>
                </div>
            </div>
        </div>
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
                                @foreach($routes as $activity)
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
    <script src="https://maps.googleapis.com/maps/api/js?key={{ env('GM_API_KEY') }}"></script>
    <script type="text/javascript" src="{{ asset('js/map.js') }}"></script>
    <script type="text/javascript">
//        http://constituteweb.com/php-var-to-javascript-in-laravel
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


    </script>
@endsection
