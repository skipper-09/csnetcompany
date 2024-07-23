@extends('backend.layout.app')

@section('title', $page_name)

@push('css')
<link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
<style>
    #map {
        height: 500px;
        width: 100%;
    }
</style>
@endpush
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
  <div class="card mb-4 ">
    <div class="d-flex align-items-center align-content-center justify-content-between px-4 pt-3 pb-1">
      <h4 class="fw-bold">{{$page_name}}</h4>
      <ol class="breadcrumb">
        <li class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item">{{$page_name}}</li>
      </ol>
    </div>
  </div>
  <!-- Striped Rows -->
  <div class="card px-4 py-4">
    <div class="mb-4">
      <a href="{{ route('backend.add.area') }}" class="btn btn-sm btn-primary">Tambah {{$page_name}}</a>
    </div>

    <div id="map"></div>
  </div>
  <!--/ Striped Rows -->
</div>
@endsection


@push('js')
<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
<script>
    // Initialize the map
    var map = L.map('map', {
            minZoom: 5, // Set minimum zoom level
            maxZoom: 15, // You can adjust the maximum zoom level as well
        }).setView([-8.169251421942706, 113.70118915367036], 10); 

    // Add a tile layer to the map
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);

    // Add markers for each location
    var locations = @json($maps);
    locations.forEach(function(location) {
        var latitude = location.latitude;
        var longitude = location.longitude;
        var name = location.name;

        // Add marker to the map
        L.marker([latitude, longitude,name]).addTo(map)
            .bindPopup('Latitude: ' + latitude + '<br>Longitude: ' + longitude + '<br>Name: ' + name);
    });

    // Adjust map view to fit all markers
    // if (locations.length > 0) {
    //     var bounds = L.latLngBounds(locations.map(function(location) {
    //         return [location.latitude, location.longitude];
    //     }));
    //     map.fitBounds(bounds);
    // }
</script>
<script>
  

</script>

@endpush