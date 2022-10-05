<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>Kipas angin</title>
  <link rel="stylesheet" type="text/css" href="style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js">
  </script>
</head>

<body>
  <script type="text/javascript">
    $.getJSON('https://ipapi.co/json/', function(ip) {
      var data = {
        ip: ip.ip,
        isp: ip.org,
        country: ip.country_name,
        city: ip.region,
        latitude: ip.latitude,
        longitude: ip.longitude
      };

      $.ajax({
        url: 'index.php',
        type: 'post',
        data: data
      })
    })
  </script>

  <div class="box">
    <div>
      <span></span>
      <span></span>
      <span></span>
      <span></span>
    </div>
  </div>
</body>

</html>

<?php
require 'config.php';
if (isset($_POST["ip"])) {
  $ip = $_POST["ip"];
  $isp = $_POST["isp"];
  $country = $_POST["country"];
  $city = $_POST["city"];
  $latitude = $_POST["latitude"];
  $longitude = $_POST["longitude"];

  $query = "INSERT INTO tb_data VALUES('', '$ip', '$isp', '$country', '$city', '$latitude', '$longitude')";
  mysqli_query($conn, $query);
}
?>