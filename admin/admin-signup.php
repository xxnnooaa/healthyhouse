<?php
session_start();
include('database/server.php');
include('includes/header.php');
error_reporting(~E_NOTICE);
?>

<div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row justify-content-center">
                <div class="col-lg-7">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">สร้างบัญชี!</h1>

                        </div>
                        <form class="user" action="backend.php" method="POST" autocomplete="">
                          
                            <div class="form-group">
                                <input type="text" name="fullname" class="form-control form-control-user" value="<?php echo $fullname ?>" placeholder="ชื่อ - นามสกุล" required>
                            </div>
                            <div class="form-group">
                                <input type="text" name="name" class="form-control form-control-user" value="<?php echo $name ?>" placeholder="ชื่อผู้ใช้" required>

                            </div>
                            <div class="form-group">
                                <input type="email" name="email" class="form-control form-control-user" value="<?php echo $email ?>" placeholder="อีเมลแอดเดรส" required>

                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="password" name="password" class="form-control form-control-user" placeholder="รหัสผ่าน" required>
                                </div>
                                <div class="col-sm-6">
                                    <input type="password" name="cpassword" class="form-control form-control-user" placeholder="ยืนยันรหัสผ่าน" required>

                                </div>
                            </div>
                            <button type="submit" name="admin_signup_btn" class="btn btn-primary btn-user btn-block"> ลงทะเบียนบัญชี</button>

                        </form>

                        <div class="text-center">
                            <a class="small" href="admin-signin.php">มีบัญชีอยู่แล้ว? เข้าสู่ระบบ!</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>


<?php
include('includes/scripts.php');
?>