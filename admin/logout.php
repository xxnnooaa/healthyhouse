<?php

if(isset($_POST['logout_btn']))
{
    session_start();
    session_destroy();
    header('Location: admin-signin.php');
}


?>