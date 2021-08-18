<?php
include('includes/header.php');
include('includes/navbar.php');
?>


<div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"> Edit Member Profile </h6>
    </div>
    <div class="card-body">
        <?php
        $connection = mysqli_connect("localhost", "root", "", "healthy_db");
        if (isset($_POST['edit_btn'])) {
            $id = $_POST['edit_id'];

            $query = "SELECT * FROM member WHERE id='$id' ";
            $query_run = mysqli_query($connection, $query);

            foreach ($query_run as $row) {
        ?>

                <form action="backend.php" method="POST">

                    <input type="hidden" name="edit_id" value="<?php echo $row['id'] ?>">

                    <div class="form-group">
                        <label> Firstname </label>
                        <input type="text" name="edit_firstname" value="<?php echo $row['firstname'] ?>" class="form-control" placeholder="Enter Firstname">
                    </div>
                    <div class="form-group">
                        <label> Lastname </label>
                        <input type="text" name="edit_lastname" value="<?php echo $row['lastname'] ?>" class="form-control" placeholder="Enter Lastname">
                    </div>
                    <div class="form-group">
                        <label> Username </label>
                        <input type="text" name="edit_username" value="<?php echo $row['name'] ?>" class="form-control" placeholder="Enter Username">
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="edit_email" value="<?php echo $row['email'] ?>" class="form-control" placeholder="Enter Email">
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="edit_password" value="<?php echo $row['password'] ?>" class="form-control" placeholder="Enter Password" disabled>
                    </div>

                    <a href="member-info.php" class="btn btn-danger"> CANCEL </a>
                    <button type="submit" name="memberupdatebtn" class="btn btn-primary"> UPDATE </button>

                </form>
        <?php
            }
        }
        ?>
    </div>
</div>
</div>




<?php
include('includes/scripts.php');
include('includes/footer.php');
?>