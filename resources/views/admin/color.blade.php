<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bt1.css">
  <link rel="stylesheet" href="css/leaflet.css">
  <script src = "script/leaflet.js"></script>
  <script src = "script/leaflet-heat.js"></script>   
	
	<!-- thư viện control geocoder bt7 -->
	<link rel="stylesheet" href="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.css" />
	<script src="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.js"></script>
	
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/opencagedata/leaflet-opencage-geocoding@v2.0.0/dist/css/L.Control.OpenCageGeocoding.min.css" />
	<script src="https://cdn.jsdelivr.net/gh/opencagedata/leaflet-opencage-geocoding@v2.0.0/dist/js/L.Control.OpenCageGeocoding.min.js"></script>

<style> 
.info {
    padding: 6px 8px;
    font: 14px/16px Arial, Helvetica, sans-serif;
    background: white;
    background: rgba(255,255,255,0.8);
    box-shadow: 0 0 15px rgba(0,0,0,0.2);
    border-radius: 5px;
}
.info h4 {
    margin: 0 0 5px;
    color: #777;
}
</style>
</head>

    <body>
        <div id = "left"></div>
        <div id = "map">        </div>
        <div id="right"></div>
        

    <script type="text/javascript">
        <?php
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

                $sql = "SELECT id,ten,AsText(POLYGON) AS POLYGON FROM `phuong` WHERE 1";

                $sql1 = "SELECT id_phuong, count(id_phuong) from table khutro group by id_phuong"; 
                $result = $conn->query($sql);

                while($row = $result->fetch_assoc()) {

                  $string = $row["POLYGON"]; 
                  // bỏ polygon
                  $string = str_replace('POLYGON', '', $string);
                  //bỏ ( )
                  $string = str_replace('(', '', $string);
                   $string = str_replace(')', '', $string);
                  
                   $coords = explode(',' ,$string);
                  
                   $coordinates = [];
                   foreach ($coords as $co) {
                       $ex = explode(' ',$co);
                       $coordinates[] =
                           [$ex[0],$ex[1]];                  
                    }
                  
                  $array = []; //empty array
                  $array = [
                      'type' => 'Polygon',
                      'coordinates' => [$coordinates]
                  ];
                  $json = json_encode($array);                  
                }                  

                $sql1 = "SELECT b.ten, count(a.id_phuong) as soluong from khutro a, phuong b where a.id_phuong = b.id;"; 
                $result1 = $conn->query($sql1);

                while($row = $result1->fetch_assoc()) {
                    $name = $row['ten'];
                    $quantity = $row['soluong'];
                    $arr = [];
                    $arr = [
                        'name' => [$name],
                        'quantity' => [$quantity]
                    ];
                    $json1 = json_encode($arr);

                }
            ?>
      
        var data =[{  
            'type': 'FeatureCollection',
            'features': [{
                'type':'Feature',
                'properties':<?php print_r($json1); ?>,
                'geometry':<?php print_r($json); ?>
            }]
        }];

        var mapOptions = {
            center: [10.044524204128596, 105.73980943604396],
            zoom: 13
        };
        var map = new L.map("map",mapOptions);
        
        var layer = L.tileLayer('http://{s}.google.com/vt/lyrs=m&x={x}&y={y}&z={z}',{
                maxZoom: 19,
                subdomains:['mt0','mt1','mt2','mt3']
        }).addTo(map);


    	function getColor(d){
    		return d> 120? '#800026':
    				d> 100 ? '#BD0026':
    				'#FFEDAO';
    	}

    	   // GÁN MÀU CHO POLYGON
        	function style(feature){
        		return {
        			fillColor: getColor(feature.properties.density),
        			weight: 2,
        			opacity:1,
        			color: 'white',
        			dashArray:'3',
        			fillOpacity: 0.7
        		};
        	};

    function highlightFeature(e) {
        var layer = e.target;

        layer.setStyle({
            weight: 5,
            color: '#666',
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

    // //them polygon vao bang do 
    // var geoJson;
    // geoJson =L.geoJson(data, {style: style}).addTo(map);

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
              this._div.innerHTML = '<h4>Thống kê số lượng khu trọ</h4>' + (props ? 
              '<br/> Số khu trọ của '+ props.name +' là' +props.quantity +'<br/>' : 'Di chuột lên một xã, phường');
          };
          info.addTo(map);
       </script>
    </body>
</html>