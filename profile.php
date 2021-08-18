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
    <title><?php echo $fetch_info['name'] ?> | แก้ไขข้อมูลส่วนตัว</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">


    <style>
       @import url('https://fonts.googleapis.com/css2?family=Mali:wght@300&display=swap');

* {
    font-family: 'Mali', cursive;
}

        .user-row {
            margin-bottom: 14px;
        }

        .user-row:last-child {
            margin-bottom: 0;
        }

        .dropdown-user {
            margin: 13px 0;
            padding: 5px;
            height: 100%;
        }

        .dropdown-user:hover {
            cursor: pointer;
        }

        .table-user-information>tbody>tr {
            border-top: 1px solid rgb(221, 221, 221);
        }

        .table-user-information>tbody>tr:first-child {
            border-top: 0;
        }


        .table-user-information>tbody>tr>td {
            border-top: 0;
        }

        .toppad {
            margin-top: 50px;
        }
    </style>
</head>

<body>
    <div class="bgimg">
    <nav class="navbar navbar-expand-lg navbar navbar-light fixed-top" style="background-color: #ABBDEE; font-size: 16px;">
            <div class="container">
                <a class="navbar-brand text-dark " href="home.php">HealthyHouse</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                อาหาร
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="food1.php">สมูทตี้และของว่าง </a>
                                <a class="dropdown-item" href="food2.php">สลัดและผลไม้</a>
                                <a class="dropdown-item" href="food3.php">ย่างและทอด</a>
                                <a class="dropdown-item" href="food4.php">สเต็กและซุป</a>
                                <a class="dropdown-item" href="food4.php">ผัดและต้ม</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                ออกกำลังกาย
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="cardio.php">คาร์ดิโอ</a>
                                <a class="dropdown-item" href="weight-tranning.php">เวทเทรนนิ่ง</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                สุขภาพ
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="bmr-tdee.php">เครื่องคำนวณ BMR & TDEE </a>
                                <a class="dropdown-item" href="bmi.php">เครื่องคำนวณ BMI </a>
                                <a class="dropdown-item" href="ideal.php">เครื่องคำนวณ Ideal Weight </a>
                                <a class="dropdown-item" href="diary.php">เครื่องคำนวณ Diary Calorie </a>
                            </div>
                        </li>
                    </ul>
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-dark" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              สวัสดี! <?php echo $fetch_info['name'] ?>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="profile.php">ข้อมูลส่วนตัว</a>
                                <a class="dropdown-item" href="contact-form.php">ติดต่อเรา</a>
                                <a class="dropdown-item" data-toggle="modal" data-target="#logoutModal">ออกจากระบบ</a>
                            </div>
                        </li>

                    </ul>
                </div>
            </div>
        </nav>

        <div class="container">
            <div class="card" style="margin: 10% auto;  width: 800px;">
                <div class="card-body">
                    <h3>ข้อมูลส่วนตัว</h3>
                    </br>
                    <div class="mb-3 row">
                        <label for="staticEmail" class="col-sm-2 col-form-label" style="font-size: 20px;">ชื่อ :</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="staticEmail" style="font-size: 20px;" value="<?php echo $fetch_info['firstname'] ?>" disabled>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="staticEmail" class="col-sm-2 col-form-label" style="font-size: 20px;">นามสกุล :</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="staticEmail" style="font-size: 20px;" value="<?php echo $fetch_info['lastname'] ?>" disabled>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="staticEmail" class="col-sm-2 col-form-label" style="font-size: 20px;">ชื่อผู้ใช้ :</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="staticEmail" style="font-size: 20px;" value="<?php echo $fetch_info['name'] ?>" disabled>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="staticEmail" class="col-sm-2 col-form-label" style="font-size: 20px;" >อีเมล :</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="staticEmail" style="font-size: 20px;" value="<?php echo $fetch_info['email'] ?>" disabled>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <div class="col-sm-10">
                            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
                            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 

                            <a href="#member<?php echo $fetch_info['id']; ?>" data-toggle="modal" class="btn btn-warning btn-sm" style="font-size: 18px;">
                                    <span class="glyphicon glyphicon-edit">
                                    </span> แก้ไข</a>&nbsp;
                                           <!-- include edit modal -->
                                <?php include('profile-edit-modal.php'); ?>
                        </div>
                    </div>
                </div>
            </div>

        </div>


    
    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">ต้องการออกจากระบบ ?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">เลือก "ออกจากระบบ" ด้านล่าง หากคุณต้องการจะออกจากระบบ</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">ยกเลิก</button>

            <form action="member-logout.php" method="POST">

              <button type="submit" name="logout_btn" class="btn btn-primary">ออกจากระบบ</button>

            </form>

          </div>
        </div>
      </div>
    </div>

        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
        <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>

</body>

</html>

<?php
include('includes/footer.php');
?>