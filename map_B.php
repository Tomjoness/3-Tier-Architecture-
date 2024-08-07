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
    const map = new google.maps.Map(document.getElementById("map-canvas"), {
      zoom: 13,
      center: bullring,
    });
    const bullringContent =
      '<div id="content">' +
      '<div id="siteNotice">' +
      "</div>" +
      '<h1 id="firstHeading" class="firstHeading">Bullring Birmingham</h1>' +
      '<div id="bodyContent">' +
      "<p>The Bullring Birmingham is a large shopping centre in the heart of Birmingham, England. It is one of the busiest shopping centres in the UK, with over 200 shops and restaurants, as well as a cinema and other leisure facilities.</p>" +
      '<p>Attribution: <a href="https://en.wikipedia.org/wiki/Bullring,_Birmingham">' +
      "https://en.wikipedia.org/wiki/Bullring,_Birmingham</a>.</p>" +
      "</div>" +
      "</div>";
    const bullringInfowindow = new google.maps.InfoWindow({
      content: bullringContent,
      ariaLabel: "Bullring Birmingham",
    });
    const bullringMarker = new google.maps.Marker({
      position: bullring,
      map,
      title: "Bullring Birmingham",
    });

    bullringMarker.addListener("click", () => {
      bullringInfowindow.open({
        anchor: bullringMarker,
        map,
      });
    });

    const museumContent =
      '<div id="content">' +
      '<div id="siteNotice">' +
      "</div>" +
      '<h1 id="firstHeading" class="firstHeading">Birmingham Museum and Art Gallery</h1>' +
      '<div id="bodyContent">' +
      "<p>Birmingham Museum and Art Gallery is a museum and art gallery in Birmingham, England. It has a collection of international importance covering fine art, ceramics, metalwork, jewellery, natural history, archaeology, ethnography, local history and industrial history.</p>" +
      '<p>Attribution: <a href="https://en.wikipedia.org/wiki/Birmingham_Museum_and_Art_Gallery">' +
      "https://en.wikipedia.org/wiki/Birmingham_Museum_and_Art_Gallery</a>.</p>" +
      "</div>" +
      "</div>";
    const museumInfowindow = new google.maps.InfoWindow({
      content: museumContent,
      ariaLabel: "Birmingham Museum and Art Gallery",
    });
    const museumMarker = new google.maps.Marker({
      position: museum,
      map,
      title: "Birmingham Museum and Art Gallery",
    });

    museumMarker.addListener("click", () => {
      museumInfowindow.open({
        anchor: museumMarker,
        map,
      });
    });

  }
  
  google.maps.event.addDomListener(window, 'load', initMap);

</script>
<style>
  #map-canvas {
    height: 400px;
    width: 80%;
  }
</style>
  </head>
  <body>
    <h1>Birmingham Map</h1>
    <div id="map-canvas"></div>
  </body>
</html>