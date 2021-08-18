<?php require_once "controllerUserData.php"; ?>
<?php
error_reporting(~E_NOTICE);
$email = $_SESSION['email'];
$password = $_SESSION['password'];
if ($email != false && $password != false) {
    $sql = "SELECT * FROM member WHERE email = '$email'";
    $run_Sql = mysqli_query($conn, $sql);
    if ($run_Sql) {
        $fetch_info = mysqli_fetch_assoc($run_Sql);
        $status = $fetch_info['status'];
        $code = $fetch_info['code'];
        if ($status == "verified") {
            if ($code != 0) {
                header('Location: reset-code.php');
            }
        } else {
            header('Location: user-otp.php');
        }
    }
} else {
    header('Location: member-login.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title><?php echo $fetch_info['name'] ?> | Home</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Prompt:wght@100;200;300;400&display=swap');

        * {
            font-family: 'Prompt', sans-serif;
        }

        .form-div {
            margin-top: 100px;
            border: 1px solid #e0e0e0;
        }

        #profileDisplay 
        {
            display: block;
            height: 210px;
            width: 60%;
            margin: 0px auto;
            border-radius: 50%;
        }

        .img-placeholder {
            width: 60%;
            color: white;
            height: 100%;
            background: black;
            opacity: .7;
            height: 210px;
            border-radius: 50%;
            z-index: 2;
            position: absolute;
            left: 50%;
            transform: translateX(-50%);
            display: none;
        }

        .img-placeholder h4 {
            margin-top: 40%;
            color: white;
        }

        .img-div:hover .img-placeholder {
            display: block;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-4 offset-md-4 form-div">
                <a href="profiles.php">View all profiles</a>
                <form action="form.php" method="post" enctype="multipart/form-data">
                    <h2 class="text-center mb-3 mt-3">Update profile</h2>
                    <?php if (!empty($msg)) : ?>
                        <div class="alert <?php echo $msg_class ?>" role="alert">
                            <?php echo $msg; ?>
                        </div>
                    <?php endif; ?>
                    <div class="form-group text-center" style="position: relative;">
                        <span class="img-div">
                            <div class="text-center img-placeholder" onClick="triggerClick()">
                                <h4>Update image</h4>
                            </div>
                            <img src="images/avatar.jpg" onClick="triggerClick()" id="profileDisplay">
                        </span>
                        <input type="file" name="profileImage" onChange="displayImage(this)" id="profileImage" class="form-control" style="display: none;">
                        <label>Profile Image</label>
                    </div>
                    <div class="form-group">
                        <label>ชื่อ - นามสกุล</label>
                        <input type="text" name="name" class="form-control"></input>
                    </div>
                    <div class="form-group">
                        <label>อีเมล</label>
                        <input type="email" name="email" class="form-control"></input>
                    </div>
                    <div class="form-group">
                        <label>เบอร์โทรศัพท์</label>
                        <input type="text" name="phone" class="form-control"></input>
                    </div>
                    <div class="form-group">
                        <button type="submit" name="save_profile" class="btn btn-primary btn-block">Save User</button>
                    </div>
                </form>
            </div>
        </div>

</body>

</html>

<script>
    function triggerClick(e) {
        document.querySelector('#profileImage').click();
    }

    function displayImage(e) {
        if (e.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                document.querySelector('#profileDisplay').setAttribute('src', e.target.result);
            }
            reader.readAsDataURL(e.files[0]);
        }
    }
</script>