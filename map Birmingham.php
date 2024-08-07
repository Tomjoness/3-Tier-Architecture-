<!DOCTYPE html>
<html>
  <head>
    <title>Birmingham Map</title>
    <?php
     
     include 'C:\xampp\htdocs\Cities\conf.php';
   
    ?>
    <script src="https://maps.googleapis.com/maps/api/js?key=<?php echo $map_key; ?>&callback=initMap&v=weekly"></script>
    <script>

      function initMap() {
        const bullring = { lat: 52.4776, lng: -1.8944 };
        const museum = { lat: 52.4801, lng: -1.9035 };
        const cadburyWorld = { lat: 52.4080, lng: -1.9321 };
        const seaLifeCentre = { lat: 52.4762, lng: -1.9122 };
        const botanicalGardens = { lat: 52.4549, lng: -1.9304 };
        const bullringCentral = { lat: 52.4775, lng: -1.8962 };
        const library = { lat: 52.4796, lng: -1.9036 };
        const academy = { lat: 52.4790, lng: -1.9101 };
        
        const map = new google.maps.Map(document.getElementById("map-canvas"), {
          zoom: 12,
          center: bullring,
        });

        // function to create marker and infowindow for each location
        function createMarkerAndInfoWindow(location, title, url) {
          const marker = new google.maps.Marker({
            position: location,
            map,
            title: title,
          });

          // retrieve wikipedia content
          fetch(url)
            .then(response => response.json())
            .then(data => {
              const pageId = Object.keys(data.query.pages)[0];
              const pageContent = data.query.pages[pageId].extract;
              const infowindow = new google.maps.InfoWindow({
                content: '<div>' + pageContent + '</div>',
                ariaLabel: title,
              });

              // add listener for marker click
              marker.addListener("click", () => {
                infowindow.open({
                  anchor: marker,
                  map,
                });
              });
            })
            .catch(error => {
              console.error(error);
              const infowindow = new google.maps.InfoWindow({
                content: '<div>Error retrieving content from Wikipedia</div>',
                ariaLabel: title,
              });
              marker.addListener("click", () => {
                infowindow.open({
                  anchor: marker,
                  map,
                });
              });
            });
        }

    // call function to create marker and infowindow for each location
createMarkerAndInfoWindow(bullring, "Bullring", "https://en.wikipedia.org/w/api.php?action=query&prop=extracts&format=json&exintro=&titles=Bullring%2C+Birmingham");
createMarkerAndInfoWindow(museum, "Birmingham Museum & Art Gallery", "https://en.wikipedia.org/w/api.php?action=query&prop=extracts&format=json&exintro=&titles=Birmingham+Museum+and+Art+Gallery");
createMarkerAndInfoWindow(cadburyWorld, "Cadbury World", "https://en.wikipedia.org/w/api.php?action=query&prop=extracts&format=json&exintro=&titles=Cadbury+World");
createMarkerAndInfoWindow(seaLifeCentre, "Sea Life Centre", "https://en.wikipedia.org/w/api.php?action=query&prop=extracts&format=json&exintro=&titles=National+Sea+Life+Centre");
createMarkerAndInfoWindow(botanicalGardens, "Birmingham Botanical Gardens", "https://en.wikipedia.org/w/api.php?action=query&prop=extracts&format=json&exintro=&titles=Birmingham+Botanical+Gardens+and+Glasshouses");
createMarkerAndInfoWindow(bullringCentral, "Bullring Central", "https://en.wikipedia.org/w/api.php?action=query&prop=extracts&format=json&exintro=&titles=Bullring+Shopping+Centre");
createMarkerAndInfoWindow(library, "Library of Birmingham", "https://en.wikipedia.org/w/api.php?action=query&prop=extracts&format=json&exintro=&titles=Library+of+Birmingham");
createMarkerAndInfoWindow(academy, "O2 Academy Birmingham", "https://en.wikipedia.org/w/api.php?action=query&prop=extracts&format=json&exintro=&titles=O2+Academy+Birmingham");


  }
</script>
  </head>
  <body onload="initMap()">
    <div id="map-canvas" style="height: 100%; width: 100%;"></div>
  </body>
</html>


