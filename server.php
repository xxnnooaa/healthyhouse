<?php
  //Create Connection
  //ส่ง argument 4 ตัว
  $conn = mysqli_connect('localhost', 'root', '', 'healthy_db');
  //check connection ว่ามีการเชื่อมต่อจริง
  if(!$conn){
      die("Connection failed" . mysqli_connect_error());
  }
?>