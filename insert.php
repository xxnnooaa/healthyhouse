<?php
include('database.php');

$msg = "";
//add food
if(isset($_POST['add-food'])){

    $target = "food-images/".basename($_FILES['image']['name']);

    $image = $_FILES['image']['name'];
    $name = $_POST['name'];
    $foodtype = $_POST['foodtype'];
    $ingredients = $_POST['ingredients'];
    $cook = $_POST['cook'];
    $calorie = $_POST['calorie'];

    $sql = "INSERT INTO food (image, name, foodtype, ingredients, cook, calorie) VALUES ('$image', '$name', '$foodtype', '$ingredients', '$cook','$calorie')";
    
    
    if(move_uploaded_file($_FILES['image']['tmp_name'], $target)){
        $msg = "Image uploaded successfully";
        header('location: manage-food.php');
    }else{
        $msg = "There was a problem uploading image";
    }

  
}


//add exercise
if(isset($_POST['add-exercise'])){
    $name = $_POST['name'];
    $detail = $_POST['detail'];
    $exercisetype = $_POST['exercisetype'];
    $burn = $_POST['burn'];

    $mysqli->query("INSERT INTO exercise (name, detail, exercisetype, burn) VALUES ('$name', '$detail', '$exercisetype','$burn')");
 
    $res = $mysqli->query("SELECT id FROM exercise ORDER BY id DESC");
    $row = $res->fetch_row();
    $id = $row[0];
 
// Set a constant
    define ("FILEREPOSITORY","exercise-images/");
 
// Make sure that the file was POSTed.
    if (is_uploaded_file($_FILES['pimage']['tmp_name'])) {
// Was the file a JPEG?
    if ($_FILES['pimage']['type'] != "image/jpeg") {
        echo "<p>Profile image must be uploaded in JPEG format.</p>";
    } else {
//$name = $_FILES['classnotes']['name'];
    $filename=$id.".jpg";
    $result = move_uploaded_file($_FILES['pimage']['tmp_name'],FILEREPOSITORY.$filename);
//$result = move_uploaded_file($_FILES['pimg']['tmp_name'],"http://localhost/php_crud/profile_images/28.jpg");
if ($result == 1) echo "<p>File successfully uploaded.</p>";
else echo "<p>There was a problem uploading the file.</p>";
}
    }
header('location: manage-exercise.php');
}


//add member
if(isset($_POST['add-member'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];

    $mysqli->query("INSERT INTO member (name, email, phone,password) VALUES ('$name', '$email', '$phone','$password')");
 
    $res = $mysqli->query("SELECT id FROM member ORDER BY id DESC");
    $row = $res->fetch_row();
    $id = $row[0];
 
// Set a constant
    define ("FILEREPOSITORY","food-images/");
 
// Make sure that the file was POSTed.
    if (is_uploaded_file($_FILES['pimage']['tmp_name'])) {
// Was the file a JPEG?
    if ($_FILES['pimage']['type'] != "image/jpeg") {
        echo "<p>Profile image must be uploaded in JPEG format.</p>";
    } else {
//$name = $_FILES['classnotes']['name'];
    $filename=$id.".jpg";
    $result = move_uploaded_file($_FILES['pimage']['tmp_name'],FILEREPOSITORY.$filename);
//$result = move_uploaded_file($_FILES['pimg']['tmp_name'],"http://localhost/php_crud/profile_images/28.jpg");
if ($result == 1) echo "<p>File successfully uploaded.</p>";
else echo "<p>There was a problem uploading the file.</p>";
}
    }
header('location: manage-member.php');
}
?>