@extends('layouts.admin')
<title>
    Quản lý nhà trọ | Chỉ đường
</title>
@section('content')
<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-absolute fixed-top navbar-transparent cus-adbar">
    <div class="container-fluid">
        <div class="navbar-wrapper">
            <button class="btn btn-secondary routing" onclick="currentNav();">Vị trí hiện tại</button>
            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Chọn trường
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    @foreach($truong as $tr)    
                        <div class="truong-data">
                            <input type="hidden" class="truong-lat" value="{{$tr->latitude}}" style="margin:auto; display:block;">
                            <input type="hidden" class="truong-long" value="{{$tr->longitude}}" style="margin:auto; display:block;">
                            <a class="dropdown-item uniRoute" href="#">{{$tr->ten}}</a>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>

    </div>
</nav>
<div id="map" style="margin-top:95px"></div>
<!-- End Navbar -->

@endsection

@section('scripts')

<script src="https://unpkg.com/leaflet@1.3.1/dist/leaflet.js" integrity="sha512-/Nsx9X4HebavoBvEBuyp3I7od5tA0UzAxs+j83KgC8PU0kgB4XiK4Lfe4y4cgBtaRJQEIFCW+oC506aPT2L1zw=="  crossorigin=""></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

<script type="text/javascript">

        var map = null;

        var mapOptions = {
            center: [10.037681717461588, 105.78367065713977],
            zoom: 10
        };
        map = new L.map("map",mapOptions);
       
        var layer = L.tileLayer('http://{s}.google.com/vt/lyrs=m&x={x}&y={y}&z={z}',{
            maxZoom: 20,
            subdomains:['mt0','mt1','mt2','mt3']
        });
        map.addLayer(layer);

        var markers= [];
        var Icon = L.icon({
            iconUrl: '{{ asset('img/marker.png')}}',
            shadowUrl: '',
            iconSize: [56, 56],
            shadowSize: [56, 56],
            iconAnchor: [28, 28],
            shadowAnchor: [0, 0],
            popupAnchor: [-3, -76]
        });

        var customOptions = {
            'minWidth': '300',
            'maxWidth': '500',
            'className': 'custom'
        };

        var marker = new L.marker([{{$khutro->latitude}},{{$khutro->longitude}}], {icon: Icon, title: '{{$khutro->ten}}'});
        var popup = '<p>{{$khutro->ten}}</p><p>{{$khutro->diachi}}</p>';
        markers.push(marker);
        marker.addTo(map);
        marker.bindPopup(popup, customOptions);

    

        function currentNav(){

            if(navigator.geolocation){
            
            } 
            navigator.geolocation.getCurrentPosition(function(position){
                var lat = position.coords.latitude;
                var long = position.coords.longitude;

                if (map !== undefined && map !== null) { map.remove(); }
                var mapOptions = {
                    center: [10.037681717461588, 105.78367065713977],
                    zoom: 10
                };
                map = new L.map("map",mapOptions);

                var layer = L.tileLayer('http://{s}.google.com/vt/lyrs=m&x={x}&y={y}&z={z}',{
                    maxZoom: 20,
                    subdomains:['mt0','mt1','mt2','mt3']
                });
                map.addLayer(layer);


                L.Routing.control({
                    waypoints: [
                        L.latLng({{$khutro->latitude}}, {{$khutro->longitude}}),
                        L.latLng(lat, long)
                    ],
                    routeWhileDragging: true,
                    language: 'vi',
                    //geocoder: L.Control.Geocoder.nominatim()
                }).addTo(map);
            
            })
        } 

        $(document).ready(function() {
    $('.uniRoute').click(function (e){
        e.preventDefault();
        
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        if (map !== undefined && map !== null) { map.remove(); }

            var mapOptions = {
                center: [10.037681717461588, 105.78367065713977],
                zoom: 10
            };
            
            map = new L.map("map",mapOptions);

            var layer = L.tileLayer('http://{s}.google.com/vt/lyrs=m&x={x}&y={y}&z={z}',{
                maxZoom: 20,
                subdomains:['mt0','mt1','mt2','mt3']
            });
            map.addLayer(layer);

            var lat = $(this).closest('.truong-data').find('.truong-lat').val();
            var long = $(this).closest('.truong-data').find('.truong-long').val();


            L.Routing.control({
                    waypoints: [
                        L.latLng(lat, long),
                        L.latLng({{$khutro->latitude}}, {{$khutro->longitude}})
                    ],
                    routeWhileDragging: true,
                    language: 'vi',
                }).addTo(map);
        
        });     
    });

        
</script>
@endsection