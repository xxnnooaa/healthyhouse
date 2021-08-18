<?php
include('includes/header.php');
include('includes/navbar.php');
?>


<div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"> Message </h6>
    </div>
    <div class="card-body">
        <?php
        $connection = mysqli_connect("localhost", "root", "", "healthy_db");
        if (isset($_POST['edit_btn'])) {
            $id = $_POST['edit_id'];

            $query = "SELECT * FROM notifications WHERE id='$id' ";
            $query_run = mysqli_query($connection, $query);

            foreach ($query_run as $row) {
        ?>

                <form action="" method="">

                    <input type="hidden" name="edit_id" value="<?php echo $row['admin_id'] ?>">

                    <div class="form-group">
                        <label> Name </label>
                        <input type="text"  value="<?php echo $row['name'] ?>" class="form-control"  disabled>
                    </div>
                   
                    <div class="form-group">
                        <label>Message</label>
                        <textarea type="text"  id="detail"  class="form-control" rows="5"  disabled><?php echo $row['message'] ?></textarea>
                    </div>

                    <div class="form-group">
                        <label> Date </label>
                        <input type="text"  value="<?php echo $row['date'] ?>" class="form-control" disabled>
                    </div>
                 

                    <a href="contact-info.php" class="btn btn-danger"> CANCEL </a>

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