@extends('layouts.admin')
<title>
    Quản lý nhà trọ | Kết quả tìm kiếm
</title>
@section('content')
@include('layouts.inc.navbar')
<div class="card" style="margin-top:95px">
    <div class="card-header">
        <h2>Kết quả tìm kiếm </h2>
        </div>
        <div class="card-body">
        <table class="table">
            <thead style="text-align:center;">
            <tr>
                <th scope="col" style="width:160px;text-align:left;">Tên khu trọ</th>
                <th style="text-align:left;width:150px;" scope="col">Tên chủ trọ</th>
                <th style="text-align:left;width:120px;" scope="col">Số điện thoại</th>
                <th style="text-align:left;width:250px;" scope="col">Địa chỉ</th>
                <th scope="col" style="width:150px;"></th>
            </tr>
            </thead>
        @foreach($khutro as $kt)
            <tbody class="latlong" >
                <tr>
                <input type="hidden" class="kt_lat" value="{{$kt->latitude}}" style="margin:auto; display:block;">
                <input type="hidden" class="kt_long" value="{{$kt->longitude}}" style="margin:auto; display:block;">
                    <td class="kt_ten">{{$kt->ten}}</td>
                    <td>{{$kt->chutro->ten}}</td>
                    <td>{{$kt->chutro->sdt}}</td>
                    <td class="kt_diachi">{{$kt->diachi}}</td>
                    <td style="width:200px;text-align:center;"> 
                        <button type="button" class="btn btn-primary" onclick="buildMap([{{$kt->latitude}}, {{$kt->longitude}}, '{{$kt->ten}}', '{{$kt->diachi}}'])" >Hiển thị vị trí</button>
                        <a href="{{ url('routing/'.$kt->id) }}" target="_blank"><button type="button" class="btn btn-danger">Chỉ đường</button></a>            
                    </td>
                </tr>
                @endforeach
        </table>
    </div>
</div>

<div id="map">
</div>
@endsection

@section('scripts')

<script src="https://unpkg.com/leaflet@1.3.1/dist/leaflet.js" integrity="sha512-/Nsx9X4HebavoBvEBuyp3I7od5tA0UzAxs+j83KgC8PU0kgB4XiK4Lfe4y4cgBtaRJQEIFCW+oC506aPT2L1zw=="  crossorigin=""></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

<script type="text/javascript">

   
    var map = null;
    function buildMap(location){
        if (map !== undefined && map !== null) { map.remove(); }

                
        var mapOptions = {
            center: [10.045003213684495, 105.74778484677381],
            zoom: 13
        };
        
        map = new L.map("map",mapOptions);

        var layer = L.tileLayer('http://{s}.google.com/vt/lyrs=m&x={x}&y={y}&z={z}',{
            maxZoom: 20,
            subdomains:['mt0','mt1','mt2','mt3']
        });
        map.addLayer(layer);

        

        var Icon = L.icon({
            iconUrl: 'img/marker.png',
            shadowUrl: '',
            iconSize: [56, 56],
            shadowSize: [56, 56],
            iconAnchor: [28, 28],
            shadowAnchor: [0, 0],
            popupAnchor: [-3, -76]
        });

        
        var marker = new L.marker([location[0],location[1]], {icon: Icon, title: location[2]});
        marker.addTo(map);

        var customOptions = {
        'minWidth': '300',
        'maxWidth': '500',
        'className': 'custom'
        };
        // var popup = '<p>'location[2]'</p><p>'location[3]'</p>';
        marker.bindPopup(location[2]);

    }

</script>
@endsection
