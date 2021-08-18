<?php
include('database.php');

        $id=$_GET['id'];
        $mysqli->query("DELETE FROM food WHERE id=$id");
        unlink("food-images/".$id.".jpg");
        header('location: manage-food.php');


?>