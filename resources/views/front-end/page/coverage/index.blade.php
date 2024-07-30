@extends('front-end.layout.base')

@push('css')
    {{--
<link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" /> --}}

    <style>
        .view {
            margin-top: 80px;
        }

        #map {
            height: 500px;
            width: 100%;
        }

        .custom-map-control-button {
            padding: 10px;
            margin-top: 10px;
        }
    </style>
@endpush

@section('title', $page_name)

@section('content')
    @if (count($area) > 0)
        <div class="view">
            <div id="map"></div>
        </div>
    @else
        <h1 class="mt-100 text-center">Belum tercover</h1>
        <p class="text-center">Ingin di daerah ini terjangkau layanan idnet hubungi kami!!</p>
    @endif

@endsection

@push('js')
    <script async
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAedENQWqgCX2bUzcJGHK3SuhRncQon1Gc&loading=async&callback=initMap"
        async defer></script>
    <script>
        // Initialize the map
        let map, infoWindow;

        function initMap() {
            // Data from the controller
            var locations = @json($area);
            var centerLat = @json($centerlat);
            var centerLon = @json($centerlon);
            // Define the center of the map
            var center = {
                lat: centerLat,
                lng: centerLon
            }; // Default to Jakarta

            // Create a map centered on the defined center
            map = new google.maps.Map(document.getElementById('map'), {
                zoom: 16,
                center: center
            });

            infoWindow = new google.maps.InfoWindow();

            const locationButton = document.createElement("button");

            locationButton.textContent = "Lokasi Saya";
            locationButton.classList.add("custom-map-control-button");
            map.controls[google.maps.ControlPosition.TOP_CENTER].push(locationButton);
            locationButton.addEventListener("click", () => {
                // Try HTML5 geolocation.
                if (navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition(
                        (position) => {
                            const pos = {
                                lat: position.coords.latitude,
                                lng: position.coords.longitude,
                            };

                            infoWindow.setPosition(pos);
                            infoWindow.setContent("Location found.");
                            infoWindow.open(map);
                            map.setCenter(pos);
                        },
                        () => {
                            handleLocationError(true, infoWindow, map.getCenter());
                        },
                    );
                } else {
                    // Browser doesn't support Geolocation
                    handleLocationError(false, infoWindow, map.getCenter());
                }
            });



            // Add markers for each ODP
            locations.forEach(area => {
                var odpCoords = [];
                area.odp.forEach(odp => {
                    var position = {
                        lat: parseFloat(odp.latitude),
                        lng: parseFloat(odp.longitude)
                    };
                    odpCoords.push(position);
                    var marker = new google.maps.Marker({
                        position: position,
                        map: map,
                        title: odp.name,
                    });

                    var infowindow = new google.maps.InfoWindow({
                        content: `<b>${odp.name}</b>`
                    });

                    marker.addListener('click', function() {
                        infowindow.open(map, marker);
                    });
                });

                // // Draw polyline connecting ODPs
                // var odpLine = new google.maps.Polyline({
                // path: odpCoords,
                // geodesic: false,
                // strokeColor: '#FF0000',
                // strokeOpacity: 1.0,
                // strokeWeight: 2
                // });

                // odpLine.setMap(map);
            });


        }
    </script>
    {{-- <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

<script>
  // call data from controller
  var locations = @json($area);
  var centerLat = @json($centerlat);
  var centerLon = @json($centerlon);
  // Initialize the map
        var map = L.map('map', {
            minZoom: 8, // Set minimum zoom level
            maxZoom: 20, // You can adjust the maximum zoom level as well
        }).setView([centerLat,centerLon], 16);

        // Add a tile layer to the map
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);


        // Add markers for each location
        
        locations.forEach(area => {
            area.odp.forEach(odp => {
                L.marker([odp.latitude, odp.longitude]).addTo(map)
                    .bindPopup(`<b>${odp.name}</b>`);
            });
        });


        // Adjust map view to fit all markers
        // if (locations.length > 0) {
        //     var bounds = L.latLngBounds(locations.map(function(location) {
        //         return [location.latitude, location.longitude];
        //     }));
        //     map.fitBounds(bounds);
        // }
</script> --}}
@endpush
