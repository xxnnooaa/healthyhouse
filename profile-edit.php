<?php

include('database.php');

if(isset($_POST['update-member'])){

    $id=$_GET['id'];
    
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $name = $_POST['name'];
    $email = $_POST['email'];
     
    $mysqli->query("UPDATE member SET firstname='$firstname', lastname='$lastname',name='$name', email='$email' WHERE id=$id");
     
    header('location: profile.php');
    }


?>