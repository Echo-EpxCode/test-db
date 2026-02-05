<?php

// Database connection ni Juday
$host = "localhost";
$user = "root";
$pwd = "";
$db = "test_db";

$conn = mysqli_connect($host,$user,$pwd,$db);
  if(mysqli_connect_error()) {
    die ("Failed to connect" .mysqli_connect_error());
  }





