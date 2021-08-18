<?php
//Create database connection
$mysqli = mysqli_connect("localhost","root","","healthy_db");

if (!$mysqli) {

die("Connection error: " . mysqli_connect_error());

}
?>