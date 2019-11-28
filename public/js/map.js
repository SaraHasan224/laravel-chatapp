var map;
var icons;
var directionsService,directionsDisplay,request,infowindow,bounds;
var intialLatLng = new google.maps.LatLng(25.276987,55.296249); //DUBAI (LAT,LNG);

initMap();

/***** METHODS *****/
// INITIALIZE MAP
function initMap() {
    directionsService = new google.maps.DirectionsService;
    directionsDisplay = new google.maps.DirectionsRenderer({
        suppressMarkers: true
    });
    infowindow = new google.maps.InfoWindow();
    icons = {
        pickup: {
            url: "http://maps.google.com/mapfiles/ms/icons/green-dot.png"
        },
        dropoff: {
            url: "http://maps.google.com/mapfiles/ms/icons/red-dot.png"
        },
        driver: {
            url: "https://www.rctcbc.gov.uk/SiteElements/Images/Icons/LidoMapMarkers/CarMarker.png",
            scaledSize: new google.maps.Size(35, 50), // scaled size
            flat: true,
            setRotation: 145
        }
    };
    bounds = new google.maps.LatLngBounds();

    var mapOptions = {
        zoom: 16,
        center: intialLatLng,
        mapTypeId: google.maps.MapTypeId.ROADMAP,
        streetViewControl: false,
        mapTypeControl: false
    };
    map = new google.maps.Map(document.getElementById("map"), mapOptions);
    directionsDisplay.setMap(map);
    listen();
}

function listen() {
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
        var channelName = "private-routes."+"{{\Illuminate\Support\Facades\Auth::user()->id}}";
        var channel = pusher.subscribe(channelName);
        //LISTEN FOR EVENTS ON YOUR CHANNEL
        channel.bind('App\\Events\\CoordsLogged', function (data) {
            var data = JSON.parse(JSON.stringify(data));
            var routes = data.routes;
            var user = routes.user;
            console.log(routes);
            console.log(user);
            var content = '<div class="vertical-time-simple vertical-without-time vertical-timeline vertical-timeline--animate vertical-timeline--one-column">' +
                '    <div class="vertical-timeline-item dot-danger vertical-timeline-element">' +
                '        <div>' +
                '            <span class="vertical-timeline-element-icon bounce-in"></span>' +
                '            <div class="vertical-timeline-element-content bounce-in">' +
                '                <h4 class="timeline-title"> Coordinates:' + routes.coords +'<span class="text-success">&nbsp; sent by ' + user.name + '</span></h4>' +
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

}