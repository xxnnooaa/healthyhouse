<?php

include('server.php');


if(isset($_POST['send'])){

    $name = $_POST['name'];
    $message = $_POST['message'];

    $query = "INSERT INTO notifications (name,  message, date) VALUES ('$name',  '$message', CURRENT_TIMESTAMP) ";

    $result = mysqli_query($conn,$query);
               
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ติดต่อเรา | HealthyHouse</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    

    <style> 
        @import url('https://fonts.googleapis.com/css2?family=Mali:wght@300&display=swap');

html,body{
    background: #ABBDEE;
    font-family: 'Mali', cursive;
}
.container{
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    width: 3000px;
}
.container .form{
    background: #fff;
    padding: 30px 35px;
    border-radius: 5px;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
   
}

    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4 form">
            
                <form action="contact-form.php" method="POST" autocomplete="" class="needs-validation" novalidate>

                <h2 class="text-center" style="font-size: 34px;">ติดต่อเรา</h2>

                <div class="form-group">
                        <label for="name" class="form-label"> ชื่อหรืออีเมล </label>
                        <input type="text" name="name" class="form-control" id="name" placeholder="ระบุชื่อหรืออีเมล" required>
                        <span class="invalid-feedback"> โปรดระบุชื่อหรืออีเมล</span>
                    </div>

                    <div class="form-group">
                        <label for="message" class="form-label">ข้อความ</label>
                        <textarea type="text" name="message" class="form-control" id="message" placeholder="ระบุข้อความ" rows="5" required></textarea>
                        <span class="invalid-feedback"> โปรดระบุข้อความ</span>
                    </div>

                    <a href="home.php" class="btn btn-danger"> ยกเลิก </a>
                    <button type="submit" name="send" class="btn btn-success"> ส่งข้อความ </button>

                </form>
            </div>
        </div>
    </div>
    

    <script src="js/script.js"></script>
</body>
</html>