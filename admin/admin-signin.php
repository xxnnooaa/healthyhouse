<?php
session_start();
include('database/server.php');
include('includes/header.php');
?>

<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-xl-6 col-lg-6 col-md-6">
            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">เข้าสู่ระบบ !</h1>

                                </div>
                                <form class="user" action="backend.php" method="POST" autocomplete="">
                                   
                                 
                                    <div class="form-group">
                                        <input type="email" name="email" class="form-control form-control-user" placeholder="อีเมลแอดเดรส" required>
                                    </div>

                                    <div class="form-group">
                                        <input type="password" name="password" class="form-control form-control-user" placeholder="รหัสผ่าน" required>
                                    </div>

                                    <a class="small" href="admin-forgot-passwpod.php">ลืมรหัสผ่าน? </a>
                                    <button type="submit" name="login" class="btn btn-primary btn-user btn-block"> เข้าสู่ระบบ</button>

                                </form>

                                <div class="text-center">
                                    <a class="small" href="admin-signup.php">ยังไม่มีบัญชี? สร้างบัญชี!</a>
                                </div>
                            </div>
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