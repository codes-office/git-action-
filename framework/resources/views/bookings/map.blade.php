@extends('layouts.app')

@section('content')
<div class="container">
    <h1>User Locations Map</h1>
    <div id="map" style="width: 100%; height: 500px;"></div>
</div>
<script
 src="https://maps.googleapis.com/maps/api/js?key={{ Hyvikk::api('api_key') }}&callback=initMap"
 async defer></script>
<script>
    // Convert Laravel's PHP variable to JavaScript
    const users = @json($users);

    function initMap() {
        // Default location (center of Bengaluru)
        const center = { lat: 12.9716, lng: 77.5946 };

        // Create the map
        const map = new google.maps.Map(document.getElementById('map'), {
            zoom: 12,
            center: center,
        });

        // Add markers for each user
        users.forEach(user => {
            if (user.latitude && user.longitude) { // Ensure coordinates exist
                const position = { lat: parseFloat(user.latitude), lng: parseFloat(user.longitude) };
                new google.maps.Marker({
                    position: position,
                    map: map,
                    title: `User:  ${user.id}`, // Use the user's ID or other unique identifier
                });
            }
        });
    }

    // Initialize the map when the page loads
    window.onload = initMap;
</script>
@endsection





{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <h1>User Locations Map</h1>
    <div id="map" style="width: 100%; height: 500px;"></div>
</div>
<script
 src="https://maps.googleapis.com/maps/api/js?key={{ Hyvikk::api('api_key') }}&callback=initMap"
 async defer></script>
<script>
    // Convert Laravel's PHP variable to JavaScript
    const users = @json($users);

    // 
    function initMap() {
            // Initialize Google Map
            map = new google.maps.Map(document.getElementById("map"), {
                center: { lat: 12.9716, lng: 77.5946 }, // Default to Bangalore
                zoom: 11
            });

            // Add user location markers from backend (PHP/Blade)
            @foreach ($userLocations as $location)
                var latitude = {{ $location->latitude }};
                var longitude = {{ $location->longitude }};
                if (latitude && longitude) {
                    new google.maps.Marker({
                        position: { lat: latitude, lng: longitude },
                        map: map,
                        title: 'User ID: {{ $location->id }}'
                    });
                }
            @endforeach

            // Refresh driver markers every 2 seconds
            setInterval(fetchDriverLocations, 2000);
        }
</script>
@endsection --}}
