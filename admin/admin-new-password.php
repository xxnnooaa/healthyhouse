<?php
session_start();
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
                                    <h1 class="h4 text-gray-900 mb-4">สร้างรหัสผ่านใหม่</h1>

                                </div>
                                <form class="user" action="admin-new-password.php" method="POST" autocomplete="">
                                    <?php
                                    if (isset($_SESSION['info'])) {
                                    ?>
                                        <div class="alert alert-success text-center">
                                            <?php echo $_SESSION['info']; ?>
                                        </div>
                                    <?php
                                    }
                                    ?>
                                    <?php
                                    if (count($errors) > 0) {
                                    ?>
                                        <div class="alert alert-danger text-center">
                                            <?php
                                            foreach ($errors as $showerror) {
                                                echo $showerror;
                                            }
                                            ?>
                                        </div>
                                    <?php
                                    }
                                    ?>
                                    <div class="form-group">
                                        <input type="password" name="password" class="form-control form-control-user" placeholder="สร้างรหัสผ่านใหม่" required>

                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="cpassword" class="form-control form-control-user" placeholder="ยืนยันรหัสผ่านใหม่" required>

                                    </div>

                                    <button type="submit" name="change-password" class="btn btn-primary btn-user btn-block"> เปลี่ยนรหัสผ่าน</button>

                                </form>
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