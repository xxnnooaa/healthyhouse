<?php require_once "controllerUserData.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>เข้าสู่ระบบ | HealthyHouse</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/member.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4 form login-form">
                <form action="member-login.php" method="POST" autocomplete="">
                    <h2 class="text-center" style="font-size: 30px;">เข้าสู่ระบบที่นี่</h2>
                    <p class="text-center" style="font-size: 15px;">เข้าสู่ระบบด้วยอีเมลและรหัสผ่านของคุณ</p>
                    <?php
                    if(count($errors) > 0){
                        ?>
                        <div class="alert alert-danger text-center">
                            <?php
                            foreach($errors as $showerror){
                                echo $showerror;
                            }
                            ?>
                        </div>
                        <?php
                    }
                    ?>
                    <div class="form-group">
                        <input class="form-control" style="font-size: 16px;" type="email" name="email" placeholder="อีเมล"  value="<?php echo $email ?>">
                    </div>
                    <div class="form-group">
                        <input class="form-control" style="font-size: 16px;" type="password" name="password" placeholder="รหัสผ่าน" >
                    </div>
                    <div class="link forget-pass text-left"  ><a href="forgot-password.php" style="font-size: 16px;" >ลืมรหัสผ่าน?</a></div>
                    <div class="form-group">
                        <input class="form-control button" style="font-size: 19px;" type="submit" name="login" value="เข้าสู่ระบบ">
                    </div>
                    <div class="link login-link text-center" style="font-size: 18px;">ยังไม่มีบัญชี? <a href="member-register.php">สมัครตอนนี้เลย!</a></div>
                </form>
            </div>
        </div>
    </div>
    
</body>
</html>