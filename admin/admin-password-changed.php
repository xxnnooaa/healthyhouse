<?php
session_start();
include('includes/header.php');

if($_SESSION['info'] == false){
    header('Location: admin-signin.php');  
}

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
                                    <h1 class="h4 text-gray-900 mb-4">เข้าสู่ระบบ</h1>
                                  
                                </div>
                                <form class="user" action="admin-password-changed.php" method="POST" autocomplete="">
                                <?php
                                    if (isset($_SESSION['info'])) {
                                    ?>
                                        <div class="alert alert-success text-center">
                                            <?php echo $_SESSION['info']; ?>
                                        </div>
                                    <?php
                                    }
                                    ?>
                                    <div class="form-group">
                                        <button type="submit" name="check-reset-otp" class="btn btn-primary btn-user btn-block"> เข้าสู่ระบบ</button>
                                    </div>
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