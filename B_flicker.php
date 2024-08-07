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

<?php


// Set the cache expiration time (in seconds)
$cache_expire = 60 * 60 * 24; // 1 day

// Set a unique cache key for this file
$cache_key = 'birmingham_slideshow';

// Set the cache control headers
header('Cache-Control: public, max-age=' . $cache_expire);
header('Expires: ' . gmdate('D, d M Y H:i:s', time() + $cache_expire) . ' GMT');
header('Last-Modified: ' . gmdate('D, d M Y H:i:s', filemtime(__FILE__)) . ' GMT');
header('ETag: "' . md5(filemtime(__FILE__)) . '"');

// Check if the client has a valid cache
if (@strtotime($_SERVER['HTTP_IF_MODIFIED_SINCE']) == filemtime(__FILE__) ||
    @trim($_SERVER['HTTP_IF_NONE_MATCH']) == md5(filemtime(__FILE__))) {
    // If the cache is valid, send a 304 Not Modified response and exit
    header('HTTP/1.1 304 Not Modified');
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Birmingham Slideshow</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <!--  theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Bootstrap JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<!DOCTYPE html>
<html>
  <head>
    <title>Twin Cities</title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <div class="navbar">
      <a href="#">Home</a>
      <div class="dropdown">
        <button class="dropbtn">Birmingham</button>
        <div class="dropdown-content">
          <a href="birmingham1.html">Option 1</a>
          <a href="birmingham2.html">Option 2</a>
          <a href="birmingham3.html">Option 3</a>
        </div>
      </div>
      <div class="dropdown">
        <button class="dropbtn">Chicago</button>
        <div class="dropdown-content">
          <a href="chicago1.html">Option 1</a>
          <a href="chicago2.html">Option 2</a>
          <a href="chicago3.html">Option 3</a>
        </div>
      </div>
      <a href="#">Feedback</a>
    </div>
  </body>
</html>

    <?php
        
      
        //search and find image//
        
    
        include 'C:\xampp\htdocs\Cities\conf.php';

        $tags = 'birminghambullring';
        $perPage = 25;
        $url = 'https://api.flickr.com/services/rest/?method=flickr.photos.search';
        $url.= '&api_key='.$flicker_key;
        $url.= '&tags='.$tags;
        $url.= '&per_page='.$perPage;
        $url.= '&format=json';
        $url.= '&nojsoncallback=1';
         //response displayed//
        $response = json_decode(file_get_contents($url));
        $photo_array = $response->photos->photo;

        //build HTML markup for the slideshow
        //w3schools used as well as flicr api resources on flickr page
        echo '<div id="myCarousel" class="carousel slide" data-ride="carousel">';
        echo '<div class="carousel-inner" role="listbox">';

        $i = 0;
        foreach($photo_array as $single_photo){

            $farm_id = $single_photo->farm;
            $server_id = $single_photo->server;
            $photo_id = $single_photo->id;
            $secret_id = $single_photo->secret;
            $size = 'm';

            $title = $single_photo->title;
            $active_class = ($i == 0) ? ' active' : '';

            $photo_url = 'http://farm'.$farm_id.'.staticflickr.com/'.$server_id.'/'.$photo_id.'_'.$secret_id.'_'.$size.'.'.'jpg';

            echo '<div class="item'.$active_class.'">';
            echo '<img src="'.$photo_url.'" alt="'.$title.'">';
            echo '<div class="carousel-caption"><h3>'.$title.'</h3></div>';
            echo '</div>';

            $i++;
        }

        echo '</div>';
        echo '<a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">';
        echo '<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>';
        echo '<span class="sr-only">Previous</span>';
        echo '</a>';
        echo '<a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">';
        echo '<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>';
        echo '<span class="sr-only">Next</span>';
        echo '</a>';
        echo '</div>';
    ?>

    <script>
        $(document).ready(function(){
            $('.carousel').carousel({
                interval: 6000
            })
        });
    </script>
</body>
</html>

