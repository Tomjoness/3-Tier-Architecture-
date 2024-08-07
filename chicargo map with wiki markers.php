<!DOCTYPE html>
<html>
  <head>
    <title>Chicago Map</title>
    <?php
     
    
     include 'C:\xampp\htdocs\Cities\conf.php';
   
    ?>
    <script src="https://maps.googleapis.com/maps/api/js?key=<?php echo $map_key; ?>&callback=initMap&v=weekly"></script>
    <script>

    function initMap() {
        const bullring = { lat: 41.89408691706372, lng: -87.62645134406179}; 
        const museum = { lat: 41.88065, lng: -87.65582 };
        const artInstitute = { lat: 41.8796, lng: -87.6237 };
        const navyPier = { lat: 41.8917, lng: -87.6043 };
        const milleniumPark = { lat: 41.8834, lng: -87.6233 };
        const sheddAquarium = { lat: 41.8676, lng: -87.6140 };
        const museumScienceIndustry = { lat: 41.7910, lng: -87.5839 };
        const fieldMuseum = { lat: 41.8663, lng: -87.6168 };
        const map = new google.maps.Map(document.getElementById("map-canvas2"), {
            zoom: 12,
            center: bullring,
        }); 

        const markers = [
            { position: bullring, title: "The Shops at North Bridge", wikiPageId: 16937145 },
            { position: museum, title: "WNDR museum", wikiPageId: 59273363 },
            { position: artInstitute, title: "Art Institute of Chicago", wikiPageId: 266897 },
            { position: navyPier, title: "Navy Pier", wikiPageId: 1572613 },
            { position: milleniumPark, title: "Millennium Park", wikiPageId: 684406 },
            { position: sheddAquarium, title: "Shedd Aquarium", wikiPageId: 126702 },
            { position: museumScienceIndustry, title: "Museum of Science and Industry", wikiPageId: 39352 },
            { position: fieldMuseum, title: "Field Museum of Natural History", wikiPageId: 40112 }
        ];

        const infowindow = new google.maps.InfoWindow();
        markers.forEach(marker => {
            const markerObj = new google.maps.Marker({
                position: marker.position,
                title: marker.title,
                map: map
            });
            markerObj.addListener("click", () => {
                fetch(`https://en.wikipedia.org/w/api.php?format=json&action=query&prop=extracts&pageids=${marker.wikiPageId}&exintro&explaintext`)
                    .then(response => response.json())
                    .then(data => {
                        const extract = data.query.pages[marker.wikiPageId].extract;
                        infowindow.setContent(`<div><h3>${marker.title}</h3><p>${extract}</p></div>`);
                        infowindow.open(map, markerObj);
                    });
            });
        });
    }

    </script>
  </head>
  <body>
    <div id="map-canvas2" style="height: 600px; width: 100%;"></div>
  </body>
</html>
