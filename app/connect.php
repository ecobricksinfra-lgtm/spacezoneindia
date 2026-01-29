<?php
$connect = mysqli_connect("localhost","root","","spacezoneindia");
//$connect = mysqli_connect("localhost","spacezon_india_Dev","SpaceZoneDev@2025$$","spacezon_india");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
?>