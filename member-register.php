<?php 
require_once "controllerUserData.php"; 
error_reporting (E_ALL ^ E_NOTICE);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ลงทะเบียน | HealthyHouse</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/member.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4 form">
                <form action="member-register.php" method="POST" autocomplete="">
                    <h2 class="text-center" style="font-size: 30px;">ลงทะเบียนที่นี่</h2>
                    <p class="text-center" style="font-size: 15px;">ทำได้ง่ายและรวดเร็ว</p>
                    <?php
                    if(count($errors) == 1){
                        ?>
                        <div class="alert alert-danger text-center">
                            <?php
                            foreach($errors as $showerror){
                                echo $showerror;
                            }
                            ?>
                        </div>
                        <?php
                    }elseif(count($errors) > 1){
                        ?>
                        <div class="alert alert-danger">
                            <?php
                            foreach($errors as $showerror){
                                ?>
                                <li><?php echo $showerror; ?></li>
                                <?php
                            }
                            ?>
                        </div>
                        <?php
                    }
                    ?>
                    <div class="form-group">
                        <input class="form-control" style="font-size: 14px;" type="text" name="firstname" placeholder="ชื่อ"  value="<?php echo $firstname ?>" required>
                    </div>
                    <div class="form-group">
                        <input class="form-control" style="font-size: 14px;" type="text" name="lastname" placeholder="นามสกุล"  value="<?php echo $lastname ?>" required>
                    </div>
                    <div class="form-group">
                        <input class="form-control" style="font-size: 14px;" type="text" name="name" placeholder="ชื่อผู้ใช้"  value="<?php echo $name ?>" required>
                    </div>
                    <div class="form-group">
                        <input class="form-control" style="font-size: 14px;" type="email" name="email" placeholder="อีเมล"  value="<?php echo $email ?>" required>
                    </div>
                    <div class="form-group">
                        <input class="form-control" style="font-size: 14px;" type="password" name="password" placeholder="รหัสผ่าน" required>
                    </div>
                    <div class="form-group">
                        <input class="form-control" style="font-size: 14px;" type="password" name="cpassword" placeholder="ยืนยันรหัสผ่าน" required>
                    </div>
                    <div class="form-group">
                        <input class="form-control button" style="font-size: 19px;" type="submit" name="signup" value="ลงทะเบียน" >
                    </div>
                    <div class="link login-link text-center" style="font-size: 18px;">เป็นสมาชิกแล้ว? <a href="member-login.php">เข้าสู่ระบบ!</a></div>
                </form>
            </div>
        </div>
    </div>
    
</body>
</html>



