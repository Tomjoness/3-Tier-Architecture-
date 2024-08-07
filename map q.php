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

                  center: { lat: 52.4708, lng: -1.8986 }, 
                 draggable: false,
                scrollwheel: false,
              zoomControl: false,
        }); 

        const locations = [ 

          { 

            name: "Birmingham New Street railway station", 

            position: { lat: 52.4778, lng: -1.8990 }, 

          }, 

          { 

            name: "Birmingham Museum and Art Gallery", 

            position: { lat: 52.4801, lng: -1.9035 }, 

          }, 

          { 

            name: "Cadbury World", 

            position: { lat: 52.4300, lng: -1.9325 }, 

          }, 

          { 

            name: "National Sea Life Centre, Birmingham", 

            position: { lat: 52.4786, lng: -1.9134 }, 

          }, 

          { 

            name: "Birmingham Botanical Gardens, England", 

            position: { lat: 52.4672, lng: -1.9296 }, 

          }, 

          { 

            name: "Bull Ring, Birmingham", 

            position: { lat: 52.4776, lng: -1.8944 }, 

          }, 

          { 

            name: "Library of Birmingham", 

            position: { lat: 52.4797, lng: -1.9085 }, 

          }, 

          { 

            name: "O2 Academy Birmingham", 

            position: { lat: 52.4733, lng: -1.8999 }, 

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

              }); 

          }); 

        }); 

      } 

    </script> 

<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD3Nic-C4L6jrSPbwFg-ZSJgy4_ol2Ap9I&callback=initMap"></script> 

</body> 

</div> 

</html> 
