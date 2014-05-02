OpenLayers.ImgPath='../OpenLayers/img/';

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
    theme: '../OpenLayers/css/style.css'
});

var renderCluster = function(feature, tipo) {
    var qtd = feature.attributes.count;
    if (qtd > 200) {
        return (tipo == 'img') ? '../OpenLayers/img/m3.png' : 64;
    } else if (qtd > 20) {
        return (tipo == 'img') ? '../OpenLayers/img/m2.png' : 48;
    } else {
        return (tipo == 'img') ? '../OpenLayers/img/m1.png' : 32;
    }
}

var pontoStyle = new OpenLayers.StyleMap({
    'default': new OpenLayers.Style({
        externalGraphic: "${iconImg}",
        graphicWidth: "${iconSize}",
        graphicHeight: "${iconSize}",
        label: "${getName}",
        fontSize: "9px",
        fontFamily: "Trebuchet MS, sans-serif",
        labelAlign: "cm"
    } , {
        context: {
            iconImg: function (feature) {
                return renderCluster (feature, 'img');
            },
            iconSize: function (feature) {
                return renderCluster (feature, 'size');
            },
            getName: function (feature) {
                return feature.attributes.count;
            }
        }
    })
});

var points = new OpenLayers.Layer.Vector('Cluster', {
    strategies: [
        new OpenLayers.Strategy.Fixed(),
        new OpenLayers.Strategy.Cluster(),
        new OpenLayers.Strategy.BBOX()
    ],
    visibility: true,
    protocol: new OpenLayers.Protocol.HTTP({
        url: "../OpenLayers/shps/lances.json",
        format: new OpenLayers.Format.GeoJSON()
    }),
    styleMap: pontoStyle
});

map.addLayer(points);

map.setCenter(
	new OpenLayers.LonLat(-5112108.4510014, -1854056.5578272), 4
);