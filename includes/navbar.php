<?php
require_once "controllerUserData.php";
include('includes/test.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title><?php echo $fetch_info['name'] ?> | Healthy House</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Mali:wght@300&display=swap');

    * {
      font-family: 'Mali', cursive;
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
                <a class="dropdown-item" href="food5.php">ผัดและต้ม</a>
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
                <a class="dropdown-item" href="ideal.php">เครื่องคำนวณ Ideal Body Weight </a>
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

    <!-- Contact Modal-->
    <div class="modal fade" id="contactModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">ข้อความใหม่</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">
            <form action="contact.php" method="POST" class="needs-validation" novalidate>

              <div class="form-group">
                <label for="name" class="form-label"> ชื่อหรืออีเมลผู้ส่ง </label>
                <input type="text" name="name" class="form-control" id="name" placeholder="ระบุชื่อหรืออีเมลผู้ส่ง" required>
                <span class="invalid-feedback"> โปรดระบุชื่อหรืออีเมลผู้ส่ง</span>
              </div>

              <div class="form-group">
                <label for="subject" class="form-label"> หัวข้อ </label>
                <input type="text" name="subject" class="form-control" id="subject" placeholder="ระบุหัวข้อ" required>
                <span class="invalid-feedback"> โปรดระบุหัวข้อ</span>
              </div>

              <div class="form-group">
                <label for="message" class="form-label">ข้อความ</label>
                <textarea type="text" name="message" class="form-control" id="message" placeholder="ระบุข้อความ" rows="5" required></textarea>
                <span class="invalid-feedback"> โปรดระบุข้อความ</span>
              </div>

              <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">ยกเลิก</button>
                <button type="submit" name="send" class="btn btn-primary">ส่งข้อความ</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

    <script src="js/script.js"></script>