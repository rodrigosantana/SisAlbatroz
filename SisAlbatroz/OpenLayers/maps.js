OpenLayers.ImgPath='img/';  
  
var map = new OpenLayers.Map({  
  controls: [  
    new OpenLayers.Control.Navigation(),  
    new OpenLayers.Control.Zoom(),  
    new OpenLayers.Control.MousePosition(),  
    new OpenLayers.Control.ScaleLine(),  
    new OpenLayers.Control.LayerSwitcher()  
  ],  
  div: "map",  
  projection: "EPSG:4326",  
  layers: [  
    new OpenLayers.Layer.OSM(null, null, {isBaseLayer: true}),  
    new OpenLayers.Layer.Google("Google Streets")  
  ],  
});

map.setCenter(  
  new OpenLayers.LonLat(-5112108.4510014, -1854056.5578272), 4  
);