<?php

  //Display XML Format
  header('Content-type: text/xml');
  //Connect to DB
  //conn = mysqli_connect('localhost','root','','dsa-cwk');
  $conn = mysqli_connect("localhost", "root", "", "dsa_coursework");

  //Initiate RSS feed
  $rss = '<?xml version="1.0" encoding="ISO-8859-1"?>';
  $rss .= '<rss version="2.0">';
  $rss .= '<channel>';

  //RSS Feed for 'city' dataset
  $rss .= '<title> RSS FEED CITY </title>';
  //SQL Query to select all entities from city table.
  $citysql = "SELECT * FROM citys";
  $cityquery = mysqli_query($conn,$citysql);

  //Loop through array of all database items and place into relevant tags and display to RSS feed.
  while($cityrow = mysqli_fetch_array($cityquery)){
    $rss .= '<item>';
    $rss .= '<CityID>' . $cityrow['id'] . '</CityID>';
    $rss .= '<CityName>' . $cityrow['c_name'] . '</CityName>';
    $rss .= '<Country>' . $cityrow['country'] . '</Country>';
    $rss .= '<Population>' . $cityrow['population'] . '</Population>';
    $rss .= '<Size>' . $cityrow['size'] . '</size>';
    $rss .= '</item>';
  }

  //RSS Feed for 'places_of_interest' dataset
  $rss .= '<title> RSS FEED POI </title>';
  //SQL Query to select all entities from places_of_interest table.
  $poisql = "SELECT * FROM places";
  $poiquery = mysqli_query($conn,$poisql);

  //Loop through array of all database items and place into relevant tags and display to RSS feed.
  while($poirow = mysqli_fetch_array($poiquery)){
    $rss .= '<item>';
    $rss .= '<PlaceOfInterestID>' . $poirow['poi_id'] . '</PlaceOfInterestID>';
    $rss .= '<POIName>' . $poirow['p_name'] . '</POIName>';
    $rss .= '<POIdec>' . $poirow['p_dec'] . '</POIdec>';
    $rss .= '<rating>' . $poirow['p_rating'] . '</rating>';
    $rss .= '<GeoLoc>' . $poirow['p_lat'] . '</GeoLoc>';
    $rss .= '<POI_loc>' . $poirow['p_long'] . '</POI_loc>';
    $rss .= '</item>';
  }

  

  //RSS Feed for 'photos' dataset
  $rss .= '<title> RSS FEED PHOTOS </title>';
  //SQL Query to select all entities from places_of_interest table.
  $photosql = "SELECT * FROM photos";
  $photoquery = mysqli_query($conn,$photosql);

  //Loop through array of all database items and place into relevant tags and display to RSS feed.
  while($photorow = mysqli_fetch_array($photoquery)){
    $rss .= '<item>';
    $rss .= '<PhotoID>' . $photorow['id'] . '</PhotoID>';
    $rss .= '<PathLink>' . $photorow['site_link'] . '</PathLink>';
    $rss .= '<desc>' . $photorow['desc'] . '</desc>';
    $rss .= '</item>';
  }

  //RSS Feed for 'comments' dataset
  $rss .= '<title> RSS FEED COMMENTS</title>';
  //SQL Query to select all entities from places_of_interest table.
  $commentsql = "SELECT * FROM comments";
  $commentquery = mysqli_query($conn,$commentsql);

  //Loop through array of all database items and place into relevant tags and display to RSS feed.
  while($commentrow = mysqli_fetch_array($commentquery)){
    $rss .= '<item>';
    $rss .= '<CommentID>' . $commentrow['id'] . '</CommentID>';
    $rss .= '<Comment>' . $commentrow['date_time'] . '</Comment>';
    $rss .= '<City_ID>' . $commentrow['city_fk'] . '</City_ID>';
    $rss .= '<User_ID>' . $commentrow['photo_fk'] . '</User_ID>';
    $rss .= '</item>';
  }

  //Close RSS & channel tags
  $rss .= '</channel>';
  $rss .= '</rss>';

  //Display RSS feed
  echo $rss;

  ?>
