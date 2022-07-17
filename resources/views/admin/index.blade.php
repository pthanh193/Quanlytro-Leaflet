@extends('layouts.admin')
<title>Quản lý nhà trọ</title>
@section('content')
@include('layouts.inc.navbar')
<style> 
.info {
    padding: 6px 8px;
    font: 14px/14px Arial, Helvetica, sans-serif;
    background: white;
    background: rgba(255,255,255,0.8);
    box-shadow: 0 0 15px rgba(0,0,0,0.2);
    border-radius: 5px;
}
.info h5 {
    margin: 0 0 5px;
    color: black;
}
</style>
<div class="card" style="margin-top:95px">
    <div class="card-body">
        <h1>Tổng quan</h1>
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                <div class="card-body ">
                    <div class="row">
                    <div class="col-5 col-md-4">
                        <div class="icon-big text-center icon-warning">
                        <i class="nc-icon nc-single-02 text-danger"></i>
                        </div>
                    </div>
                    <div class="col-7 col-md-8">
                        <div class="numbers">
                        <p class="card-category">Chủ trọ</p>
                        <p class="card-title">{{$chutro}}<p>
                        </div>
                    </div>
                    </div>
                </div>
                <div class="card-footer ">
                    <hr>
                    <div class="stats">
                    <i class="fa fa-arrow-right"></i>
                    <a href="/chutro"> Xem chi tiết</a>
                    </div>
                </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                <div class="card-body ">
                    <div class="row">
                    <div class="col-5 col-md-4">
                        <div class="icon-big text-center icon-warning">
                        <i class="nc-icon nc-bank text-warning"></i>
                        </div>
                    </div>
                    <div class="col-7 col-md-8">
                        <div class="numbers">
                        <p class="card-category">Khu trọ</p>
                        <p class="card-title">{{$kt}}<p>
                        </div>
                    </div>
                    </div>
                </div>
                <div class="card-footer ">
                    <hr>
                    <div class="stats">
                    <i class="fa  fa-arrow-right"></i>
                        <a href="/khutro">Xem chi tiết</a>
                    
                    </div>
                </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                <div class="card-body ">
                    <div class="row">
                    <div class="col-5 col-md-4">
                        <div class="icon-big text-center icon-warning">
                        <i class="nc-icon nc-tile-56 text-primary"></i>
                        </div>
                    </div>
                    <div class="col-7 col-md-8">
                        <div class="numbers">
                        <p class="card-category">Loại phòng</p>
                        <p class="card-title">{{$lp}}<p>
                        </div>
                    </div>
                    </div>
                </div>
                <div class="card-footer ">
                    <hr>
                    <div class="stats">
                    <i class="fa fa-arrow-right"></i>
                    <a href="/loaiphong"> Xem chi tiết</a>
                    </div>
                </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                <div class="card-body ">
                    <div class="row">
                    <div class="col-5 col-md-4">
                        <div class="icon-big text-center icon-warning">
                        <i class="nc-icon nc-shop text-danger"></i>
                        </div>
                    </div>
                    <div class="col-7 col-md-8">
                        <div class="numbers">
                        <p class="card-category">Phòng</p>
                        <p class="card-title">{{$phong}}<p>
                        </div>
                    </div>
                    </div>
                </div>
                <div class="card-footer ">
                    <hr>
                    <div class="stats">
                    <i class="fa fa-arrow-right"></i>
                    <a href="/phong"> Xem chi tiết</a>
                    </div>
                </div>
                </div>
            </div>
        </div>   
    </div>
</div>

<h2>Vị trí các khu trọ trên bản đồ</h2>
<div id="map">
</div>

<script src="https://unpkg.com/leaflet@1.3.1/dist/leaflet.js"
    integrity="sha512-/Nsx9X4HebavoBvEBuyp3I7od5tA0UzAxs+j83KgC8PU0kgB4XiK4Lfe4y4cgBtaRJQEIFCW+oC506aPT2L1zw=="
    crossorigin=""></script>

    <script>

        var mapOptions = {
            center: [10.045003213684495, 105.74778484677381],
            zoom: 13
        };
        var map = new L.map("map",mapOptions);
       
        var layer = L.tileLayer('http://{s}.google.com/vt/lyrs=m&x={x}&y={y}&z={z}',{
            maxZoom: 20,
            subdomains:['mt0','mt1','mt2','mt3']
        });
        map.addLayer(layer);
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
        var popup = '<p>{{$kt->ten}}</p><p>{{$kt->diachi}}</p>';
        markers.push(marker);
        marker.addTo(map);
        marker.bindPopup(popup, customOptions);
        @endforeach



        function style(feature){
            return {
                weight: 2,
                opacity:1,
                dashArray:'3',
                fillOpacity: 0.3
            };
        };

        function highlightFeature(e) {
            var layer = e.target;

            layer.setStyle({
                weight: 5,
                color: '#1d60de',
                dashArray: '',
                fillOpacity: 0.7
            });

            if (!L.Browser.ie && !L.Browser.opera && !L.Browser.edge) {
                layer.bringToFront();
            }
            info.update(layer.feature.properties);
        }
        function resetHighlight(e) {
            geojson.resetStyle(e.target);
            info.update();
        }


        function zoomToFeature(e) {
            map.fitBounds(e.target.getBounds());
        }

        function onEachFeature(feature, layer) {
            layer.on({
                mouseover: highlightFeature,
                mouseout: resetHighlight,
                click: zoomToFeature
            });
        }

        <?php 


            // kết nối data

            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "quanlytro";

            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);
            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
            $len = "SELECT * FROM phuong";
            $kq = mysqli_query($conn, $len);
            $qty = mysqli_num_rows($kq);


            $temp  = "SELECT a.ten, COUNT(b.id_phuong) as soluong FROM phuong a, khutro b where a.id = b.id_phuong GROUP by a.ten;";
            $dem = mysqli_query($conn, $temp);
            $cnt = mysqli_num_rows($dem);


            $sql = "SELECT a.ten, COUNT(b.id_phuong) as soluong , AsText(POLYGON) AS POLYGON FROM phuong a, khutro b where a.id = b.id_phuong GROUP by a.ten;"; 
            $result = $conn->query($sql);

            while($row = $result->fetch_assoc()) {
            
                $name = $row['ten'];
                $quantity = $row['soluong'];
                $polygon = $row['POLYGON'];

                $string = $row["POLYGON"]; 
                $string = str_replace('POLYGON', '', $string);
                $string = str_replace('(', '', $string);
                $string = str_replace(')', '', $string);
                $coords = explode(',' ,$string);
            
                $coordinates = [];
                foreach ($coords as $co) {
                    $ex = explode(' ',$co);
                    $coordinates[] =
                        [$ex[0],$ex[1]];
                }  

                $arr = [];
                $id = 1;
                for($id;$id<=$qty;$id++){
                
                    $arr=[
                        'type' => 'FeatureCollection',
                        'features'=>[[
                        'type' => 'Feature',
                        'properties'=>[
                            'name' => $name,
                            'quantity' => $quantity
                        ],
                        'geometry' => [
                            'type' => 'Polygon',
                            'coordinates' => [$coordinates]
                        ]
                        ]]
                    ];
                };              
                ?>
                var data = [<?php printf(print_r(json_encode($arr),true));?>];  
                geojson = L.geoJson(data, {
                    style: style,
                    onEachFeature: onEachFeature
                }).addTo(map);
                <?php
                }
            ?>
  
        
    	

    geojson = L.geoJson(data, {
        style: style,
        onEachFeature: onEachFeature
    }).addTo(map);


          var info= L.control();
          info.onAdd = function(map){
              this._div = L.DomUtil.create('div','info');
              this.update();
              return this._div;
          };
          info.update = function (props){
              this._div.innerHTML = '<h5>Thống kê số lượng khu trọ</h5>' + (props ? 
              'Số khu trọ của '+ '<b>'+ props.name +'</b>' +' là ' +props.quantity : 'Di chuột lên một xã, phường');
          };
          info.addTo(map);
         

    </script>
@endsection