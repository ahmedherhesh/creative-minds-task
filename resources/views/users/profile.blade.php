@extends('base')
@section('content')
    <x-nav />
    <h3 class="text-center">Google Maps Does not Working</h3>
    <!--The div element for the map -->
    <div id="map"></div>

    <!-- prettier-ignore -->


@endsection

@section('scripts')
    <script>
        // Initialize and add the map
        let map;

        async function initMap() {
            // The location of Uluru
            const position = {
                lat: -25.344,
                lng: 131.031
            };
            // Request needed libraries.
            //@ts-ignore
            const {
                Map
            } = await google.maps.importLibrary("maps");
            const {
                AdvancedMarkerElement
            } = await google.maps.importLibrary("marker");

            // The map, centered at Uluru
            map = new Map(document.getElementById("map"), {
                zoom: 4,
                center: position,
                mapId: "DEMO_MAP_ID",
            });

            // The marker, positioned at Uluru
            const marker = new AdvancedMarkerElement({
                map: map,
                position: position,
                title: "Uluru",
            });
        }
    </script>
    <script async src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBCoU5YisydhoCp1KHBHgVcUVkvhis0yh0&loading=async&callback=initMap"></script>
@endsection
