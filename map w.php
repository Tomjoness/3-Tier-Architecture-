

<!DOCTYPE html> 
<html> 

  <head> 

    <title>Twin city Map</title> 

    <style> 

      #map { 

        height: 614px; 

        width: 97%; 

      } 

    </style> 

  </head> 

  <body> 
  <html>
  <head>
    <title>Twin Cities</title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <div class="navbar">
      <a href="main.html">Home</a>
      <div class="dropdown">
        <button class="dropbtn">Birmingham</button>
        <div class="dropdown-content">
          <a href="map q.php">Map</a>
          <a href="wea.php">Weather</a>
          <a href="B_flicker.php">Images</a>
        </div>
      </div>
      <div class="dropdown">
        <button class="dropbtn">Chicago</button>
        <div class="dropdown-content">
          <a href="map w.php">Map</a>
          <a href="wea1.php">Weather</a>
          <a href="C_flicker.php">Images</a>
        </div>
      </div>
      <a href="feedback.html">Feedback</a>
    </div>
      </div>
    </div>
  </body>
</html>


    <div id="map"></div> 

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD3Nic-C4L6jrSPbwFg-ZSJgy4_ol2Ap9I"></script> 

    <script> 

      function initMap() { 

        const map = new google.maps.Map(document.getElementById("map"), { 

          zoom: 14, 

                  center: { lat: 41.8834, lng: -87.6233 }, 
                 draggable: false,
                scrollwheel: false,
              zoomControl: false,

        }); 

        const locations = [ 

          { 

            name: "Willis Tower", 

            position: { lat: 41.8789, lng: -87.6359 }, 

          }, 

          { 

            name: "Museum of Science and Industry (Chicago)", 

            position: { lat: 41.7910, lng: -87.5839 }, 

          }, 

          { 

            name: "Shedd Aquarium", 

            position: { lat: 41.8676, lng: -87.6140 }, 

          }, 

          { 

            name: "Field Museum", 

            position: { lat: 41.8663, lng: -87.6168 }, 

          }, 

          { 

            name: "Navy Pier", 

            position: { lat: 41.8917, lng: -87.6043 }, 

          }, 

          { 

            name: "Millennium Park", 

            position: { lat: 41.8834, lng: -87.6233 }, 

          }, 

          { 

            name: "Art Institute of Chicago", 

            position: { lat: 41.8796, lng: -87.6237 }, 

          }, 

          { 

            name: "Museum of Contemporary Art Chicago", 

            position: { lat: 41.8972, lng: -87.6213 }, 

          }, 

        ]; 

        locations.forEach(location => { 

          const marker = new google.maps.Marker({ 

            position: location.position, 

            map, 

            title: location.name 

          }); 

          marker.addListener("click", () => { 

            const url = `https://en.wikipedia.org/api/rest_v1/page/summary/${location.name.replace(/ /g, '_')}`; 

            fetch(url) 

              .then(response => response.json()) 

              .then(data => { 

                const description = data.extract || "No description available."; 

                const imageUrl = data.thumbnail ? data.thumbnail.source : "https://via.placeholder.com/150"; 

                const detailsWindow = window.open("", "_blank", "height=550,width=550"); 

                const content = ` 

                  <div> 

                    <h2>${location.name}</h2> 

                    <img src="${imageUrl}" /> 

                    <p>${description}</p> 

                  </div> 

              

            
            `; 

              detailsWindow.document.write(content); 

            }) 

            .catch(error => console.log(error)); 

          }); 

        }); 

    } 

  </script> 

  <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD3Nic-C4L6jrSPbwFg-ZSJgy4_ol2Ap9I&callback=initMap"></script> 

    </body> 

    </div> 

    </html> 