<?php
	session_start(); //Abre a sessão. Usado para verificar se o login foi efetuadao

	//Verifica se a variavel da sessão SESS_MEMBER_ID está presente ou não
	if(!isset($_SESSION['SESS_MEMBER_ID']) || (trim($_SESSION['SESS_MEMBER_ID']) == '')) {
		header("location: ../index.php");
		exit();
	}
	require_once('../database/conexao.php');
	require_once('../functions/funcoes.php'); //importa o arquivo com as funções a serem utilizadas
?>

<!DOCTYPE html>
<html>
    <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta name="apple-mobile-web-app-capable" content="yes">
        <title>SisAlbatroz - GeoNetwork</title>
        <script src="http://maps.google.com/maps/api/js?sensor=false&v=3.2"></script>
        <link rel="stylesheet" href="../OpenLayers/theme/default/style.css" type="text/css">
        <link rel="stylesheet" href="../OpenLayers/style.css" type="text/css">
        <script src="../OpenLayers/lib/OpenLayers.js"></script>
        <script type="text/javascript">
            var map;

            function init() {
                map = new OpenLayers.Map('map', {
                    projection: new OpenLayers.Projection('EPSG:4326'),
                    displayProjection: new OpenLayers.Projection("EPSG:4326"),

                    layers: [
                        new OpenLayers.Layer.Google(
                            "Google Satellite",
                            {type: google.maps.MapTypeId.SATELLITE}
                        ),
                        new OpenLayers.Layer.Google(
                            "Google Streets", // the default
                            {numZoomLevels: 20}
                        ),
                        new OpenLayers.Layer.Google(
                            "Google Hybrid",
                            {type: google.maps.MapTypeId.HYBRID}
                        ),
                        new OpenLayers.Layer.Google(
                            "Google Physical",
                            {type: google.maps.MapTypeId.TERRAIN}
                        )                        
                    ],
                    center: new OpenLayers.LonLat(47.35387, 8.43609),
                        // Google.v3 uses web mercator as projection, so we have to
                        // transform our coordinates
                        /*.transform('EPSG:4326', 'EPSG:900913'), */
                    zoom: 2
                });

                var estilo = new OpenLayers.Style({
                    'pointRules': 10
                });

                var alba = new OpenLayers.Layer.Vector("Albatrozes", {
                    strategies: [
                        new OpenLayers.Strategy.Fixed()
                    ],
                        visibility: false,
                        protocol: new OpenLayers.Protocol.HTTP({
                        url: "../OpenLayers/data/area_albatrozes.json",
                        format: new OpenLayers.Format.GeoJSON()
                    }),
                    isBaseLayer: false
                });

                var petrels = new OpenLayers.Layer.Vector("Petreis", {
                    strategies: [
                        new OpenLayers.Strategy.Fixed()
                    ],
                        visibility: false,
                        protocol: new OpenLayers.Protocol.HTTP({
                        url: "../OpenLayers/data/poly_petrels.json",
                        format: new OpenLayers.Format.GeoJSON()
                    }),
                    isBaseLayer: false
                });

                var lances = new OpenLayers.Layer.Vector('Lances', { 
                strategies: [
                    new OpenLayers.Strategy.Fixed()
                ], 
                        visibility: false,  
                        protocol: new OpenLayers.Protocol.HTTP({  
                        url: "../OpenLayers/data/lances2.json",  
                        format: new OpenLayers.Format.GeoJSON()  
                    }),
                    isBaseLayer: false,
                });                   
       
                map.addLayers([alba,petrels,lances]);

                var minimap = new OpenLayers.Control.OverviewMap({
                    mapOptions: {
                        projection: new OpenLayers.Projection("EPGS:4326"),
                        numZoomLevels: 5
                    }
                });

                /*map.addControl(minimap);*/

                map.addControl(new OpenLayers.Control.Navigation());
                map.addControl(new OpenLayers.Control.PanZoomBar());
                map.addControl(new OpenLayers.Control.LayerSwitcher({'ascending':false}));
                map.addControl(new OpenLayers.Control.ScaleLine());
                map.addControl(new OpenLayers.Control.Permalink());
                map.addControl(new OpenLayers.Control.Permalink('permalink'));
                map.addControl(new OpenLayers.Control.MousePosition());
                map.addControl(new OpenLayers.Control.KeyboardDefaults());
                /*map.addControl(new OpenLayers.Control.OverviewMap());*/

            }  

        </script>
    </head>
    <body onload="init()">
        <div id="map">
            <!--<div id="banner">
                <a href="projetoalbatroz.org.br"><img width="10%" src="../OpenLayers/img/projeto-albatroz.png"></a>
            </div>-->
        </div>
    </body>
</html>