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
                                    <h1 class="h4 text-gray-900 mb-4">ลืมรหัสผ่าน !</h1>
                                    
                                </div>
                                <form class="user" action="admin-forgot-password.php" method="POST" autocomplete="" >
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
                                        <input type="email" id="email" name="email" class="form-control form-control-user" placeholder="อีเมลแอดเดรส" required>
                                       
                                    </div>

                                    <button type="submit" name="check-email" class="btn btn-primary btn-user btn-block"> ต่อไป</button>

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