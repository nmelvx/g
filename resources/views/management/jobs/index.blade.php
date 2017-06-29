@extends('layouts.default')

@section('content')
    <div id="google-map" class="no-transition"></div>
@endsection

@section('javascripts')

    <script src="https://maps.googleapis.com/maps/api/js?sensor=false&key=AIzaSyCrLskdAYlCA-OqHcq6e33ytU32PrkzRVs"></script>

    <script type="text/javascript">

        $(document).ready(function () {

            var map, pos;
            function initMap() {

                pos = {lat: 44.4268, lng: 26.1025};

                map = new google.maps.Map(document.getElementById('google-map'), {
                    center: pos,
                    zoom: 14,
                    scrollwheel: false
                    /*mapTypeControl: false,
                    scaleControl: false,
                    draggable: false,*/
                    //styles: [{"featureType":"administrative","elementType":"labels.text.fill","stylers":[{"color":"#444444"}]},{"featureType":"landscape","elementType":"all","stylers":[{"color":"#f2f2f2"}]},{"featureType":"poi","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"road","elementType":"all","stylers":[{"saturation":-100},{"lightness":20}]},{"featureType":"road.highway","elementType":"all","stylers":[{"visibility":"simplified"}]},{"featureType":"road.arterial","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"transit","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"water","elementType":"all","stylers":[{"color":"#46bcec"},{"visibility":"on"}]}]
                });

                new google.maps.Marker({
                    position: pos,
                    icon: 'assets/images/marker.png',
                    map: map
                });

            }




            initMap();

        });
    </script>

@endsection