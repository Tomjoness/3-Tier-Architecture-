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
    const map = new google.maps.Map(document.getElementById("map-canvas2"), {
      zoom: 13,
      center: bullring,
    });
    const bullringContent =
      '<div id="content">' +
      '<div id="siteNotice">' +
      "</div>" +
      '<h1 id="firstHeading" class="firstHeading">The Shops at North Bridge</h1>' +
      '<div id="bodyContent">' +
      "<p>The Shops at North Bridge is a large shopping centre in the heart of Chicago, Illinois. It is one of the busiest shopping centres in the US, with over 200 shops and restaurants, as well as a cinema and other leisure facilities.</p>" +
      '<p>Attribution: <a href="https://en.wikipedia.org/wiki/The_Shops_at_North_Bridge">' +
      "https://en.wikipedia.org/wiki/The Shops_at_North_Bridge,_Chicago</a>.</p>" +
      "</div>" +
      "</div>";
    const bullringInfowindow = new google.maps.InfoWindow({
      content: bullringContent,
      ariaLabel: "The Shops at North Bridge",
    });
    const bullringMarker = new google.maps.Marker({
      position: bullring,
      map,
      title: "The Shops at North Bridge",
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
      '<h1 id="firstHeading" class="firstHeading">WNDR museum</h1>' +
      '<div id="bodyContent">' +
      "<p>WNDR museum is a museum and art gallery in Chicago, Illinois. It has a collection of international importance covering fine art, ceramics, metalwork, jewellery, natural history, archaeology, ethnography, local history and industrial history.</p>" +
      '<p>Attribution: <a href="https://en.wikipedia.org/wiki/WNDR_museum">' +
      "https://en.wikipedia.org/wiki/WNDR_museum</a>.</p>" +
      "</div>" +
      "</div>";
    const museumInfowindow = new google.maps.InfoWindow({
      content: museumContent,
      ariaLabel: "WNDR museum",
    });
    const museumMarker = new google.maps.Marker({
      position: museum,
      map,
      title: "WNDR museum",
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
  #map-canvas2 {
    height: 400px;
    width: 80%;
  }
</style>
  </head>
  <body>
    <h1>Chicago Map</h1>
    <div id="map-canvas2"></div>
  </body>
</html>