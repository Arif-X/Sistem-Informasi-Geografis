<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>SIG Stadion di Kalimantan Selatan</title>
    <meta name="viewport" content="initial-scale=1,maximum-scale=1,user-scalable=no">
    <link href="https://api.mapbox.com/mapbox-gl-js/v2.2.0/mapbox-gl.css" rel="stylesheet">
    <script src="https://api.mapbox.com/mapbox-gl-js/v2.2.0/mapbox-gl.js"></script>
    <style>
        body { margin: 0; padding: 0; }
        #map { position: absolute; top: 0; bottom: 0; width: 100%; }
    </style>
    <style>
        .mapboxgl-popup {
            max-width: 400px;
            font: 12px/20px 'Helvetica Neue', Arial, Helvetica, sans-serif;
        }
    </style>
</head>
<body>
    <?php 
    include_once('backend/connection.php');
    $result = "SELECT * FROM markers;";
    $getData = $connect->query($result);
    ?>
    <div id="map"></div>
    <script>
        mapboxgl.accessToken = 'pk.eyJ1IjoiYXJpcG9uIiwiYSI6ImNrbjV3cmZ5NTA4aDUyd25zenk3MmlwYzgifQ.YbJ_Ir794eD8VlrVvpX64g';
        var map = new mapboxgl.Map({
            container: 'map', // container id
            style: 'mapbox://styles/mapbox/streets-v11',
            center: [115.45, -2.9102], // starting position
            zoom: 7 // starting zoom
        });

        // Add zoom and rotation controls to the map.
        map.addControl(new mapboxgl.NavigationControl());

        var geoJson = {
            'type': 'FeatureCollection',
            'features': [
            
            ]
        };      

        map.on('load', function () {
            // Add an image to use as a custom marker
            map.loadImage(
                'https://docs.mapbox.com/mapbox-gl-js/assets/custom_marker.png', 
                function (error, image) {
                    if (error) throw error;
                    map.addImage('custom-marker', image);
                    // Add a GeoJSON source with 2 points
                    map.addSource('points', {
                        'type': 'geojson',
                        'data': {
                            'type': 'FeatureCollection',
                            'features': [
                            <?php
                            while ($row = $getData->fetch_array()){
                                echo '{
                                    "type": "Feature",
                                    "properties": {
                                        "title": "'. $row['nama'] .'",
                                        "description": "<strong>'. $row['nama'] .'</strong><br>'. $row['alamat'] .'",
                                        "marker-color": "#f86767",
                                        "marker-size": "large",
                                        "marker-symbol": "star"
                                    },
                                    "geometry": {
                                        "type": "Point",
                                        "coordinates": ['. $row['longitude'] .', '. $row['latitude'] .']
                                    }
                                },';
                            };
                            ?>
                            ]
                        }
                    });

                    // Add a symbol layer
                    map.addLayer({
                        'id': 'points',
                        'type': 'symbol',
                        'source': 'points',
                        'layout': {
                            'icon-image': 'custom-marker',
                            // get the title name from the source's "title" property
                            'text-field': ['get', 'title'],
                            'text-font': [
                            'Open Sans Semibold',
                            'Arial Unicode MS Bold'
                            ],
                            'text-offset': [0, 1.25],
                            'text-anchor': 'top'
                        }
                    });

                    // When a click event occurs on a feature in the points layer, open a popup at the
                    // location of the feature, with description HTML from its properties.
                    map.on('click', 'points', function (e) {
                        var coordinates = e.features[0].geometry.coordinates.slice();
                        var description = e.features[0].properties.description;

                        // Ensure that if the map is zoomed out such that multiple
                        // copies of the feature are visible, the popup appears
                        // over the copy being pointed to.
                        while (Math.abs(e.lngLat.lng - coordinates[0]) > 180) {
                            coordinates[0] += e.lngLat.lng > coordinates[0] ? 360 : -360;
                        }

                        new mapboxgl.Popup()
                        .setLngLat(coordinates)
                        .setHTML(description)
                        .addTo(map);
                    });

                    // Change the cursor to a pointer when the mouse is over the points layer.
                    map.on('mouseenter', 'points', function () {
                        map.getCanvas().style.cursor = 'pointer';
                    });

                    // Change it back to a pointer when it leaves.
                    map.on('mouseleave', 'points', function () {
                        map.getCanvas().style.cursor = '';
                    });
                }
                );
        });
    </script>

</body>
</html>