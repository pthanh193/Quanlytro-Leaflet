@extends('layouts.frontend')

@section('content')

<div class="tab-content" id="myTabContent">
    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">   
        <div id="map">
        </div>
    </div>
    
    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
        <div class="py-5">
            <div class="container">
            <div class="card-body">
                <div class="row">
                    @foreach($phong as $p)
                    <div class="col-md-4">   
                        <p>Khu trọ: {{$p->khutro->ten}}</p>
                        <p>Tên chủ trọ: {{$p->khutro->chutro->ten}}</p>
                        <p>Số điện thoại: {{$p->khutro->chutro->sdt}}</p>
                        <p>Địa chỉ: {{$p->khutro->diachi}}</p>
                    </div> 
                    <div class="col-md-2">                    
                        <p>Loại phòng: {{$p->loaiphong->ten}}</p>
                        <p>Diện tích: {{$p->loaiphong->dientich}} m2</p>
                        <p>Số người: {{$p->loaiphong->songuoi}} người</p>
                    </div> 
                    <div class="col-md-3">   
                        <p>Số thứ tự phòng: {{$p->stt}}</p>
                        <p>Giá phòng: {{$p->loaiphong->gia}} đ</p>
                        <p>Tình trạng phòng: {{$p->tinhtrang}}</p>
                    </div> 
                    <div class="col-md-3">   
                        <p style="width:180px;text-align:center;"> 
                            <a href="{{ url('edit-khutro/'.$p->id) }}" class="btn btn-primary">Hiển thị</a>
                            <a href="#" class="btn btn-danger delete" data-id="{{$p->id}}">Chỉ đường</a>                
                        </p>
                    </div> 
                    <hr style="height:2px; width:100%; border-width:0; color:#03265b; background-color:#03265b">
                    @endforeach
                </div>
            </div>
        </div> 
    </div>
</div>


   



    
    <script src="https://unpkg.com/leaflet@1.3.1/dist/leaflet.js"
    integrity="sha512-/Nsx9X4HebavoBvEBuyp3I7od5tA0UzAxs+j83KgC8PU0kgB4XiK4Lfe4y4cgBtaRJQEIFCW+oC506aPT2L1zw=="
    crossorigin=""></script>

    <script>
        var mapOptions = {
             center: [10.037681717461588, 105.78367065713977],
            zoom: 10
        };
        var map = new L.map("map",mapOptions);
       
        var layer = L.tileLayer('http://{s}.google.com/vt/lyrs=m&x={x}&y={y}&z={z}',{
            maxZoom: 20,
            subdomains:['mt0','mt1','mt2','mt3']
        });
        map.addLayer(layer);

        var geocoder  = L.Control.Geocoder.nominatim();
        var control = L.Control.geocoder({geocoder: geocoder}).addTo(map);

        @foreach($khutro as $kt)

        var markers= [];
        var Icon = L.icon({
            iconUrl: 'img/marker.png',
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

        var marker = new L.marker([{{$kt->latitude}},{{$kt->longitude}}], {icon: Icon, title: '{{$kt->ten}}'});
        //var marker = new L.map('map').setView([{{ $kt->latitude }}, {{ $kt->longitude }}],{icon: Icon, title:"{{$kt->ten}}" });
        var popup = '<p>{{$kt->ten}}</p><p>{{$kt->diachi}}</p>';
        markers.push(marker);
        marker.addTo(map);
        marker.bindPopup(popup, customOptions);
        @endforeach
    </script>
@endsection