@extends('app')

@section('content')
        <div id="map"></div>

        @endsection
        @section('scripts')
            <script>
                function initMap() {
                    var map = new google.maps.Map(document.getElementById('map'), {
                        zoom: 8,
                        center: {lat: -34.397, lng: 150.644}
                    });
                    var geocoder = new google.maps.Geocoder();
                    geocodeAddress(geocoder, map);

                }

                function geocodeAddress(geocoder, resultsMap) {
                    var address = 'Allahabad';
                    geocoder.geocode({'address': address}, function (results, status) {
                        if (status === 'OK') {
                            resultsMap.setCenter(results[0].geometry.location);
                            var marker = new google.maps.Marker({
                                map: resultsMap,
                                position: results[0].geometry.location
                            });
                        } else {
                            alert('Geocode was not successful for the following reason: ' + status);
                        }
                    });
                }

            </script>
    <script async defer
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAc7mptKA_kkJP2dmYZxvYzZt-iOKdKk7s&callback=initMap">
    </script>
@endsection
