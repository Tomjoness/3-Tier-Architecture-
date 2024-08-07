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
$location = "Chicago, US";
include 'C:\xampp\htdocs\Cities\conf.php';

// Get current weather data
$current_weather_url = "http://api.openweathermap.org/data/2.5/weather?q=$location&appid=$weather_key&units=metric";
$current_weather_json = file_get_contents($current_weather_url);
$current_weather_data = json_decode($current_weather_json, true);
$current_temperature = $current_weather_data["main"]["temp"];
$current_humidity = $current_weather_data["main"]["humidity"];
$current_wind_speed = $current_weather_data["wind"]["speed"];
$current_condition = $current_weather_data["weather"][0]["description"];
$current_icon_url = "http://openweathermap.org/img/w/" . $current_weather_data["weather"][0]["icon"] . ".png";

// Get 5-day forecast data
$forecast_url = "http://api.openweathermap.org/data/2.5/forecast?q=$location&appid=$weather_key&units=metric";
$forecast_json = file_get_contents($forecast_url);
$forecast_data = json_decode($forecast_json, true);

// Define function to get weather icon URL from OpenWeatherMap API
function getWeatherIconUrl($iconCode) {
  return "http://openweathermap.org/img/w/" . $iconCode . ".png";
}

// Print current weather data
echo "<div class='weather-card'>";
echo "<h2>Current Weather in $location</h2>";
echo "<div class='current-weather'>";
echo "<div class='weather-icon'><img src='$current_icon_url'></div>";
echo "<div class='weather-info'>";
echo "<div class='temperature'>$current_temperature&deg;C</div>";
echo "<div class='humidity'>Humidity: $current_humidity%</div>";
echo "<div class='wind-speed'>Wind Speed: $current_wind_speed m/s</div>";
echo "<div class='condition'>$current_condition</div>";
echo "</div>"; // end .weather-info
echo "</div>"; // end .current-weather

// Print 5-day forecast data
echo "<h3>5-Day Forecast:</h3>";
$current_date = null;
foreach ($forecast_data["list"] as $forecast) {
  $forecast_date = date("Y-m-d", $forecast["dt"]);
  if ($forecast_date !== $current_date) {
    $current_date = $forecast_date;
    $temperature = $forecast["main"]["temp"];
    $humidity = $forecast["main"]["humidity"];
    $wind_speed = $forecast["wind"]["speed"];
    $condition = $forecast["weather"][0]["description"];
    $icon_url = getWeatherIconUrl($forecast["weather"][0]["icon"]);
    echo "<div class='forecast'>";
    echo "<div class='forecast-date'>$forecast_date</div>";
    echo "<div class='forecast-icon'><img src='$icon_url'></div>";
    echo "<div class='forecast-info'>";
    echo "<div class='temperature'>$temperature&deg;C</div>";
    echo "<div class='humidity'>Humidity: $humidity%</div>";
    echo "<div class='wind-speed'>Wind Speed: $wind_speed m/s</div>";
    echo "<div class='condition'>$condition</div>";
    echo "</div>"; // end .forecast-info
    echo "</div>"; // end .forecast
  }
}
echo "</div>"; // end .weather-card
?>

<style>
  .weather-card {
    border: 1px solid #ccc;
    border-radius: 5px;
    padding: 20 px;">"

// Display current weather data with icon
$current_icon = "http://openweathermap.org/img/wn/" . $current_weather_data["weather"][0]["icon"] . ".png";
echo "<div class='current-weather'>";
echo "<img src='$current_icon' alt='Current weather icon'>";
echo "<h2>Current Weather in $location:</h2>";
echo "<p>Temperature: $current_temperature ℃</p>";
echo "<p>Humidity: $current_humidity%</p>";
echo "<p>Wind Speed: $current_wind_speed m/s</p>";
echo "<p>Condition: $current_condition</p>";
echo "</div>";

// Display 5-day forecast with icons
echo "<div class='forecast'>";
echo "<h2>5-Day Forecast:</h2>";
$current_date = null;
foreach ($forecast_data["list"] as $forecast) {
$forecast_date = date("Y-m-d", $forecast["dt"]);
if ($forecast_date !== $current_date) {
$current_date = $forecast_date;
$forecast_icon = "http://openweathermap.org/img/wn/" . $forecast["weather"][0]["icon"] . ".png";
$temperature = $forecast["main"]["temp"];
$humidity = $forecast["main"]["humidity"];
$wind_speed = $forecast["wind"]["speed"];
$condition = $forecast["weather"][0]["description"];
echo "<div class='forecast-item'>";
echo "<img src='$forecast_icon' alt='Forecast weather icon'>";
echo "<p>$forecast_date</p>";
echo "<p>Temperature: $temperature ℃</p>";
echo "<p>Humidity: $humidity%</p>";
echo "<p>Wind Speed: $wind_speed m/s</p>";
echo "<p>Condition: $condition</p>";
echo "</div>";
}
}
echo "</div>";

// Close container div
echo "</div>";
?>

</body>
</html>
<!-- CSS styles for weather display -->
<style>
  .weather-container {
    max-width: 800px;
    margin: 0 auto;
    padding: 20px;
    background-color: #f9f9f9;
    border-radius: 10px;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
  }

  .current-weather img {
    height: 100px;
    margin-right: 20px;
    vertical-align: middle;
  }

  .forecast {
    display: flex;
    justify-content: space-between;
    margin-top: 20px;
  }

  .forecast-item {
    text-align: center;
    width: 150px;
    background-color: #fff;
    border-radius: 5px;
    padding: 10px;
    box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.1);
  }

  .forecast-item img {
    height: 50px;
    margin-bottom: 10px;
  }

  @media (max-width: 480px) {
    .forecast {
      flex-wrap: wrap;
      justify-content: center;
    }

    .forecast-item {
      margin-top: 10px;
      margin-right: 10px;
      margin-left: 10px;
    }
  }
</style>

<div class="weather-container">
  <div class="weather-current">
    <div class="weather-icon">
      <img src="<?php echo $current_icon_url; ?>" alt="<?php echo $current_condition; ?>">
    </div>
    <div class="weather-info">
      <h2><?php echo $location; ?></h2>
      <p><?php echo $current_condition; ?></p>
      <p>Temperature: <?php echo $current_temperature; ?> &#8451;</p>
      <p>Humidity: <?php echo $current_humidity; ?>%</p>
      <p>Wind Speed: <?php echo $current_wind_speed; ?> m/s</p>
    </div>
  </div>
  <div class="weather-forecast">
    <?php foreach ($forecast_data["list"] as $forecast) : ?>
      <?php
      $forecast_date = date("Y-m-d", $forecast["dt"]);
      if ($forecast_date !== $current_date) :
        $current_date = $forecast_date;
        $temperature = $forecast["main"]["temp"];
        $humidity = $forecast["main"]["humidity"];
        $wind_speed = $forecast["wind"]["speed"];
        $condition = $forecast["weather"][0]["description"];
        $icon_code = $forecast["weather"][0]["icon"];
        $icon_url = "http://openweathermap.org/img/wn/$icon_code.png";
      ?>
        <div class="weather-forecast-day">
          <h3><?php echo date("D, M jS", strtotime($forecast_date)); ?></h3>
          <div class="weather-icon">
            <img src="<?php echo $icon_url; ?>" alt="<?php echo $condition; ?>">
          </div>
          <div class="weather-info">
            <p><?php echo $condition; ?></p>
            <p>Temperature: <?php echo $temperature; ?> &#8451;</p>
            <p>Humidity: <?php echo $humidity; ?>%</p>
            <p>Wind Speed: <?php echo $wind_speed; ?> m/s</p>
          </div>
        </div>
      <?php endif; ?>
    <?php endforeach; ?>
  </div>
</div>

