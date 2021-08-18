<?php 
require_once "controllerUserData.php"; 
error_reporting (E_ALL ^ E_NOTICE);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>ลงทะเบียน / เข้าสู่ระบบ</title>
</head>
<body>
<div class="wrapper">
         <div class="title-text">
            <div class="title login">
               เข้าสู่ระบบ
            </div>
            <div class="title signup">
               ลงทะเบียน
            </div>
         </div>
         <div class="form-container">
            <div class="slide-controls">
               <input type="radio" name="slide" id="login" checked>
               <input type="radio" name="slide" id="signup">
               <label for="login" class="slide login">เข้าสู่ระบบ</label>
               <label for="signup" class="slide signup">ลงทะเบียน</label>
               <div class="slider-tab"></div>
            </div>
            <div class="form-inner">
               <form action="register.php" method="POST" class="login">
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
                  <div class="field">
                     <input type="email" name="email" placeholder="อีเมลแอดเดรส" required>
                  </div>
                  <div class="field">
                     <input type="password" name="password" placeholder="รหัสผ่าน" required>
                  </div>
                  <div class="pass-link">
                     <a href="forgot-password.php">ลืมรหัสผ่าน?</a>
                  </div>
                  <div class="field btn">
                     <div class="btn-layer"></div>
                     <input type="submit" name="login" value="เข้าสู่ระบบ">
                  </div>
                  <div class="signup-link">
                     ยังไม่ได้เป็นสมาชิก? <a href="">ลงทะเบียนตอนนี้</a>
                  </div>
               </form>
               <form action="register.php" method="POST" class="signup">
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
               <div class="field">
                     <input type="text" name="fullname" placeholder="ชื่อ - นามสกุล" required>
                  </div>
                  <div class="field">
                     <input type="text" name="name" placeholder="ชื่อผู้ใช้" required>
                  </div>
                  <div class="field">
                     <input type="email" placeholder="อีเมลแอดเดรส" required>
                  </div>
                  <div class="field">
                     <input type="password" name="password" placeholder="รหัสผ่าน" required>
                  </div>
                  <div class="field">
                     <input type="password" name="cpassword" placeholder="ยืนยันรหัสผ่าน" required>
                  </div>
                  <div class="field btn">
                     <div class="btn-layer"></div>
                     <input type="submit" name="signup" value="ลงทะเบียน">
                  </div>
               </form>
            </div>
         </div>
      </div>
      <script>
         const loginText = document.querySelector(".title-text .login");
         const loginForm = document.querySelector("form.login");
         const loginBtn = document.querySelector("label.login");
         const signupBtn = document.querySelector("label.signup");
         const signupLink = document.querySelector("form .signup-link a");
         signupBtn.onclick = (()=>{
           loginForm.style.marginLeft = "-50%";
           loginText.style.marginLeft = "-50%";
         });
         loginBtn.onclick = (()=>{
           loginForm.style.marginLeft = "0%";
           loginText.style.marginLeft = "0%";
         });
         signupLink.onclick = (()=>{
           signupBtn.click();
           return false;
         });
      </script>
</body>
</html>