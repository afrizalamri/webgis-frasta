<div id="map" style="width: 100%; height: 520px;"></div>
<style>
    .leaflet-container{
        cursor :crosshair;
    }
    table{
        border-collapse: collapse;
    }
    
    th{
        text-align: center;
        font-weight: bold;
        background-color: inherit;
    }
    th,td{
        padding: 0px 10px 0px 10px;
        border: 1px solid grey;
    }
</style>


<script>
//basemap
var osm = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 19,
    attribution: '© OpenStreetMap'
});

var osmHOT = L.tileLayer('https://{s}.tile.openstreetmap.fr/hot/{z}/{x}/{y}.png', {
    maxZoom: 19,
    attribution: '© OpenStreetMap contributors, Tiles style by Humanitarian OpenStreetMap Team hosted by OpenStreetMap France'});

var map = L.map('map', {
    zoom: 10,
    layers: [osm]
});

//geolocation
map.locate({setView: true, maxZoom: 16});
function onLocationFound(e) {
    var radius = e.accuracy;

    L.marker(e.latlng).addTo(map)
        .bindPopup("Anda Berada Disini").openPopup();
}
map.on('locationfound', onLocationFound);

//overlay map

var stakeout = L.tileLayer.wms("http://20.255.48.195/geoserver/frastagis/wms",{
    attribution:'&copy; FSI',
    layers :"frastagis:STAKEOUT",
    maxZoom: 19,
    srs:"EPSG:4326",
    format: "image/png",
    transparent:true
});

var basemap = {
    "OpenStreetMap": osm,
    "OpenStreetMap.HOT": osmHOT
};
var overlaymap={
    "Stake Out" :stakeout
}
var layerControl = L.control.layers(basemap,overlaymap).addTo(map);
    
//Popup Info
map.on('click',function(e){
    var pos = e.latlng;
    var pt = map.latLngToContainerPoint(pos);
    var w = map.getSize().x;
    var h = map.getSize().y;
    var bnd = map.getBounds();
    var west = bnd.getWest();
    var east = bnd.getEast();
    var north = bnd.getNorth();
    var south = bnd.getSouth();

    $.ajax({
        url:"http://20.255.48.195/geoserver/frastagis/wms",
        data :{
            service:"WMS",
            version:"1.1.1",
            srs:"EPSG:4326",
            request:"GetFeatureInfo",
            info_format:'application/json',
            layers:'frastagis:STAKEOUT',
            query_layers:'frastagis:STAKEOUT',
            width :w,
            height:h,
            x: parseInt(pt.x),
            y: parseInt(pt.y),
            bbox :west+','+south+','+east+','+north,
        },
        success : function(ajaxresult){
            console.log(ajaxresult);
            var pro = ajaxresult.features[0].properties;
            var content = "<table border=1><tr><th>Field</th><th>Value</th></tr>";
                $.each(pro, function(index, value) {
                    content += "<tr><td>" + index + "</td><td>" + value + "</td></tr>"
                });
                content +="</table>";
            L.popup().setLatLng(pos).setContent(content).openOn(map);
            
        },
        error:function(jqHXR,textStatus, errorThrown){
            console.log("Error");
        }
    });
});
</script>