<?php

include('database/server.php');

//add admin
if(isset($_POST['registerbtn']))
{

    $fullname = $_POST['fullname'];
    $name = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];

    $email_query = "SELECT * FROM admin WHERE email='$email' ";
    $email_query_run = mysqli_query($connection, $email_query);
    if(mysqli_num_rows($email_query_run) > 0)
    {
        $_SESSION['status'] = "Email Already Taken. Please Try Another one.";
        $_SESSION['status_code'] = "error";
        header('Location: admin-info.php');  
    }
    else
    {
        if($password === $cpassword)
        {
            $query = "INSERT INTO admin (fullname,username,email,password) VALUES ('$fullname','$name','$email','$password')";
            $query_run = mysqli_query($connection, $query);
            
            if($query_run)
            {
                // echo "Saved";
                $_SESSION['status'] = "Admin Profile Added";
                $_SESSION['status_code'] = "success";
              
                header('Location: admin-info.php');
            }
            else 
            {
                $_SESSION['status'] = "Admin Profile Not Added";
                $_SESSION['status_code'] = "error";
                header('Location: admin-info.php');  
            }
        }
        else 
        {
            $_SESSION['status'] = "Password and Confirm Password Does Not Match";
            $_SESSION['status_code'] = "warning";
            header('Location: admin-info.php');  
        }
    }
}

//admin signup
if(isset($_POST['admin_signup_btn']))
{
    $fullname = $_POST['fullname'];
    $name = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];

    $email_query = "SELECT * FROM admin WHERE email='$email' ";
    $email_query_run = mysqli_query($connection, $email_query);
    if(mysqli_num_rows($email_query_run) > 0)
    {
        $_SESSION['status'] = "Email Already Taken. Please Try Another one.";
        $_SESSION['status_code'] = "error";
        header('Location: admin-signup.php');  
    }
    else
    {
        if($password === $cpassword)
        {
            $query = "INSERT INTO admin (fullname,username,email,password) VALUES ('$fullname','$name','$email','$password')";
            $query_run = mysqli_query($connection, $query);
            
            if($query_run)
            {
                // echo "Saved";
                $_SESSION['status'] = "Admin Profile Added";
                $_SESSION['status_code'] = "success";
              
                header('Location: index.php');
            }
            else 
            {
                $_SESSION['status'] = "Admin Profile Not Added";
                $_SESSION['status_code'] = "error";
                header('Location: admin-signup.php');  
            }
        }
        else 
        {
            $_SESSION['status'] = "Password and Confirm Password Does Not Match";
            $_SESSION['status_code'] = "warning";
            header('Location: admin-signup.php');  
        }
    }
}

//admin login
if(isset($_POST['login_btn']))
{
    $email = $_POST['email']; 
    $password = $_POST['password']; 

    $query = "SELECT * FROM admin WHERE email='$email' AND password='$password' LIMIT 1";
    $query_run = mysqli_query($connection, $query);

   if(mysqli_fetch_array($query_run))
   {
        $_SESSION['username'] = $email;
        header('Location: index.php');
   } 
   else
   {
        $_SESSION['status'] = "Email / Password is Invalid";
        header('Location: signin.php');
   }
}

//update admin
if(isset($_POST['updatebtn']))
{
    $id = $_POST['edit_id'];
    $fullname = $_POST['edit_fullname'];
    $name = $_POST['edit_username'];
    $email = $_POST['edit_email'];
    $password = $_POST['edit_password'];

    $query = "UPDATE admin SET fullname='$fullname', username='$name', email='$email', password='$password' WHERE admin_id='$id' ";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        $_SESSION['status'] = "Your Data is Updated";
        $_SESSION['status_code'] = "success";
        header('Location: admin-info.php'); 
    }
    else
    {
        $_SESSION['status'] = "Your Data is NOT Updated";
        $_SESSION['status_code'] = "error";
        header('Location: admin-info.php'); 
    }
}

//delete admin
if(isset($_POST['delete_btn']))
{
    $id = $_POST['delete_id'];

    $query = "DELETE FROM admin WHERE admin_id='$id' ";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        $_SESSION['status'] = "Your Data is Deleted";
        header('Location: admin-info.php'); 
    }
    else
    {
        $_SESSION['status'] = "Your Data is NOT DELETED";       
        header('Location: admin-info.php'); 
    }    
}


//delete multiple admin
if(isset($_POST['search_data_admin']))
{
    $id = $_POST['admin_id'];
    $visible = $_POST['visible'];

    $query = "UPDATE admin SET visible='$visible' WHERE admin_id='$id'";
    $query_run = mysqli_query($connection, $query);
}

if(isset($_POST['delete-admin-multiple']))
{
    $id = "1";
    $query = "DELETE FROM admin WHERE visible='$id'";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        $_SESSION['success'] = "Data is Delete Successfully";
        header('Location: admin-info.php');
    }
    else{
        $_SESSION['success'] = "Data is Not Delete";
        header('Location: admin-info.php');
    }
}

//admin forgot password

//////////////////////////////////////////////

//add member
if(isset($_POST['memberbtn']))
{
    $firstname = mysqli_real_escape_string($connection, $_POST['firstname']);
    $lastname = mysqli_real_escape_string($connection, $_POST['lastname']);
    $name = mysqli_real_escape_string($connection, $_POST['name']);
    $email = mysqli_real_escape_string($connection, $_POST['email']);
    $password = mysqli_real_escape_string($connection, $_POST['password']);
    $cpassword = mysqli_real_escape_string($connection, $_POST['cpassword']);
    
    $email_query = "SELECT * FROM member WHERE email='$email' ";
    $email_query_run = mysqli_query($connection, $email_query);
    if(mysqli_num_rows($email_query_run) > 0)
    {
        $_SESSION['status'] = "Email Already Taken. Please Try Another one.";
        $_SESSION['status_code'] = "error";
        header('Location: member-info.php');  
    }else
    {
            
        if($password === $cpassword)
        {
            $encpass = password_hash($password, PASSWORD_BCRYPT);
            $code = rand(999999, 111111);
            $query = "INSERT INTO member (firstname, lastname, name, email, password, code, status)  VALUES ('$firstname','$lastname','$name', '$email', '$encpass', '$code', 'verified')";
            $query_run = mysqli_query($connection, $query);
            
            if($query_run)
            {
                // echo "Saved";
                $_SESSION['status'] = "Member Profile Added";
                $_SESSION['status_code'] = "success";
              
                header('Location: member-info.php');
            }
            else 
            {
                $_SESSION['status'] = "Member Profile Not Added";
                $_SESSION['status_code'] = "error";
                header('Location: member-info.php');  
            }
        }
        else 
        {
            $_SESSION['status'] = "Password and Confirm Password Does Not Match";
            $_SESSION['status_code'] = "warning";
            header('Location: member-info.php');  
        }
    }
}

//update mamber
if(isset($_POST['memberupdatebtn']))
{
    $id = $_POST['edit_id'];
    $firstname = $_POST['edit_firstname'];
    $latstname = $_POST['edit_lastname'];
    $name = $_POST['edit_username'];
    $email = $_POST['edit_email'];
    $password = $_POST['edit_password'];

    $query = "UPDATE member SET firstname='$firstname', lastname='$lastname', username='$name', email='$email' WHERE id='$id' ";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        $_SESSION['status'] = "Your Data is Updated";
        $_SESSION['status_code'] = "success";
        header('Location: member-info.php'); 
    }
    else
    {
        $_SESSION['status'] = "Your Data is NOT Updated";
        $_SESSION['status_code'] = "error";
        header('Location: member-info.php'); 
    }
}

//delete member

if(isset($_POST['member_delete_btn']))
{
    $id = $_POST['delete_id'];

    $query = "DELETE FROM member WHERE id='$id' ";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        $_SESSION['status'] = "Your Data is Deleted";
        header('Location: member-info.php'); 
    }
    else
    {
        $_SESSION['status'] = "Your Data is NOT DELETED";       
        header('Location: member-info.php'); 
    }    
}


//delete multiple member
if(isset($_POST['search_data']))
{
    $id = $_POST['id'];
    $visible = $_POST['visible'];

    $query = "UPDATE member SET visible='$visible' WHERE id='$id'";
    $query_run = mysqli_query($connection, $query);
}

if(isset($_POST['delete-member-multiple']))
{
    $id = "1";
    $query = "DELETE FROM member WHERE visible='$id'";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        $_SESSION['success'] = "Data is Delete Successfully";
        header('Location: member-info.php');
    }
    else{
        $_SESSION['success'] = "Data is Not Delete";
        header('Location: member-info.php');
    }
}

///////////////////////////////////

//add exercise
if(isset($_POST['exercisebtn']))
{
    $exercisetype_id = $_POST['exercisetype_id'];
    $name = $_POST['name'];
    $detail = $_POST['detail'];
    $burn = $_POST['burn'];
    $image = $_FILES['image']['name'];

    $target = "exercise-images/".basename($image);

    $query = "INSERT INTO exercise (ex_type_id, exercisename, detail, burn, image) VALUES ('$exercisetype_id', '$name', '$detail', '$burn', '$image')";
    $query_run = mysqli_query($connection, $query);

    if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
        $_SESSION['success'] = "Image uploaded successfully";
        header('Location: exercise-info.php');
    }else{
        $_SESSION['success'] = "Failed to upload image";
        header('Location: exercise-info.php');
    }
}

//update exercise
if(isset($_POST['update-exericse-btn']))
{
    $id = $_POST['edit_id'];
    $exercisetype_id = $_POST['exercisetype_id'];
    $exercisename = $_POST['exercisename'];
    $detail = $_POST['detail'];
    $burn = $_POST['burn'];
    $image = $_FILES['image']['name'];

    $target = "exercise-images/".basename($image);

    $exercise_query = "SELECT * FROM exercise WHERE id='$id'";
    $exercise_query_run = mysqli_query($connection, $exercise_query);

    foreach($exercise_query_run as $ex_row)
    {
        if($image == NULL)
        {
            $image_data = $ex_row['image'];
        }
        else
        {
            if($img_path = "exercise-images/".$ex_row['image'])
            {
                unlink($img_path);
                $image_data = $image;
            }
        }
    }

    $query = "UPDATE exercise SET ex_type_id='$exercisetype_id', exercisename='$exercisename', detail=' $detail', burn='$burn', image='$image' WHERE id='$id'";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        if($image == NULL)
        {
            $_SESSION['success'] = "Updated with exsting image";
            header('Location: exercise-info.php');
        }
        else
        {   
            move_uploaded_file($_FILES['image']['tmp_name'], $target);
            $_SESSION['success'] = "Updated successfully";
            header('Location: exercise-info.php');
        }
    }
    else{
        $_SESSION['success'] = "Failed to Updated";
        header('Location: exercise-info.php');
    }
}

//delete exercise
if(isset($_POST['delete_exercise_btn'])){
    $id = $_POST['delete_id'];

    $query = "DELETE FROM exercise WHERE id='$id' ";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        $_SESSION['status'] = "Your Data is Deleted";
        header('Location: exercise-info.php'); 
    }
    else
    {
        $_SESSION['status'] = "Your Data is NOT DELETED";       
        header('Location: exercise-info.php'); 
    } 
}

//delete multiple exercise

if(isset($_POST['search_data']))
{
    $id = $_POST['id'];
    $visible = $_POST['visible'];

    $query = "UPDATE exercise SET visible='$visible' WHERE id='$id'";
    $query_run = mysqli_query($connection, $query);
}

if(isset($_POST['delete-exercise-multiple']))
{
    $id = "1";
    $query = "DELETE FROM exercise WHERE visible='$id'";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        $_SESSION['success'] = "Data is Delete Successfully";
        header('Location: exercise-info.php');
    }
    else{
        $_SESSION['success'] = "Data is Not Delete";
        header('Location: exercise-info.php');
    }
}


///////////////////////////////////

//add food
if(isset($_POST['food_add_btn']))
{
    $foodtype_id = $_POST['foodtype_id'];
    $foodname = $_POST['foodname'];
    $ingredients = $_POST['ingredients'];
    $cook = $_POST['cook'];
    $calorie = $_POST['calorie'];
    $image = $_FILES['image']['name'];

    $target = "food-images/".basename($image);

    $query = "INSERT INTO food (food_type_id, foodname, ingredients, cook, calorie, image) VALUES ('$foodtype_id', '$foodname', '$ingredients', '$cook', '$calorie', '$image')";
    $query_run = mysqli_query($connection, $query);

    if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
        $_SESSION['success'] = "Image uploaded successfully";
        header('Location: food-info.php');
    }else{
        $_SESSION['success'] = "Failed to upload image";
        header('Location: food-info.php');
    }
}

//update food
if(isset($_POST['update-food-btn']))
{
    $id = $_POST['edit_id'];
    $foodtype_id = $_POST['foodtype_id'];
    $foodname = $_POST['foodname'];
    $ingredients = $_POST['ingredients'];
    $cook = $_POST['cook'];
    $calorie = $_POST['calorie'];
    $image = $_FILES['image']['name'];

    $target = "food-images/".basename($image);

    $food_query = "SELECT * FROM food WHERE id='$id'";
    $food_query_run = mysqli_query($connection, $food_query);

    foreach($food_query_run as $fo_row)
    {
        if($image == NULL)
        {
            $image_data = $fo_row['image'];
        }
        else
        {
            if($img_path = "food-images/".$fo_row['image'])
            {
                unlink($img_path);
                $image_data = $image;
            }
        }
    }

    $query = "UPDATE food SET food_type_id='$foodtype_id', foodname='$foodname', ingredients=' $ingredients', cook='$cook', calorie='$calorie', image='$image' WHERE id='$id'";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        if($image == NULL)
        {
            $_SESSION['success'] = "Updated with exsting image";
            header('Location: food-info.php');
        }
        else
        {   
            move_uploaded_file($_FILES['image']['tmp_name'], $target);
            $_SESSION['success'] = "Updated successfully";
            header('Location: food-info.php');
        }
    }
    else{
        $_SESSION['success'] = "Failed to Updated";
        header('Location: food-info.php');
    }
}

//delete food
if(isset($_POST['delete_food_btn'])){
    $id = $_POST['delete_id'];

    $query = "DELETE FROM food WHERE id='$id' ";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        $_SESSION['status'] = "Your Data is Deleted";
        header('Location: food-info.php'); 
    }
    else
    {
        $_SESSION['status'] = "Your Data is NOT DELETED";       
        header('Location: food-info.php'); 
    } 
}

//delete multiple food

if(isset($_POST['search_data']))
{
    $id = $_POST['id'];
    $visible = $_POST['visible'];

    $query = "UPDATE food SET visible='$visible' WHERE id='$id'";
    $query_run = mysqli_query($connection, $query);
}

if(isset($_POST['delete-food-multiple']))
{
    $id = "1";
    $query = "DELETE FROM food WHERE visible='$id'";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        $_SESSION['success'] = "Data is Delete Successfully";
        header('Location: food-info.php');
    }
    else{
        $_SESSION['success'] = "Data is Not Delete";
        header('Location: food-info.php');
    }
}


//delete contact
if(isset($_POST['message_delete_btn'])){
    $id = $_POST['delete_id'];

    $query = "DELETE FROM notifications WHERE id='$id' ";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        $_SESSION['status'] = "Your Data is Deleted";
        header('Location: contact-info.php'); 
    }
    else
    {
        $_SESSION['status'] = "Your Data is NOT DELETED";       
        header('Location: contact-info.php'); 
    } 
}


?>