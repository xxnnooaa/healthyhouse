<?php 
require_once "controllerUserData.php"; 
include('includes/test.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title><?php echo $fetch_info['name'] ?> | Home</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="css/home.css">

</head>

<body>
 
<section class="banner" id="banner">
  <div class="content">
    <h2>Welcome...</h2>
    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Voluptatibus veritatis obcaecati explicabo a saepe animi perspiciatis doloribus nemo enim accusamus libero vitae sed velit molestias magni, ut deleniti quae ex.</p>
    <a href="#">Our Menu</a>
  </div>

</section>
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

 