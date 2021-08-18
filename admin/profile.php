<?php
include('includes/header.php');
include('includes/navbar.php');
$email = $_SESSION['email'];
        $connection = mysqli_connect("localhost", "root", "", "healthy_db");
        $sql = "SELECT * FROM admin WHERE email = '$email'";
        $run_Sql = mysqli_query($connection, $sql);
        if ($run_Sql) {
            $fetch_info = mysqli_fetch_assoc($run_Sql);
        }
?>


<div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"> Admin Profile </h6>
    </div>
    <div class="card-body">
        
                <form action="" method="POST">

                    <div class="form-group">
                        <label> Fullname </label>
                        <input type="text" name="edit_fullname" value="<?php echo $row['fullname'] ?>" class="form-control" disabled>
                    </div>

                    <div class="form-group">
                        <label> Username </label>
                        <input type="text" name="edit_username" value="<?php echo $row['username'] ?>" class="form-control" disabled>
                    </div>

                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="edit_email" value="<?php echo $row['email'] ?>" class="form-control" disabled>
                    </div>
    
                    <a href="index.php" class="btn btn-danger"> CANCEL </a>
                    <button type="button" class="btn btn-primary " data-toggle="modal" data-target="#editprofile">
                    UPDATE
                </button>
                </form>
    </div>
</div>
</div>


<div class="modal fade" id="editprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Profile</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="" method="POST" class="needs-validation" novalidate>

                <div class="modal-body">

                <div class="form-group">
                    <label for="fullname" class="form-label"> Fullname </label>
                    <input type="text" name="fullname" class="form-control" id="fullname" placeholder="Enter Fullname" required>
                    <span class="invalid-feedback"> Please enter fullname.</span>
                </div>
                <div class="form-group">
                    <label for="username" class="form-label"> Username </label>
                    <input type="text" name="username" class="form-control" id="username" placeholder="Enter Username" required>
                    <span class="invalid-feedback"> Please enter username.</span>
                </div>
                <div class="form-group">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" id="email" placeholder="name@example.com" required>
                    <span class="invalid-feedback"> Incorrect email address.</span>
                </div>
               
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" name="registerbtn"  class="btn btn-primary">Save</button>
                </div>
            </form>

        </div>
    </div>
</div>

<script src="js/admin-validation.js"></script>


<?php
include('includes/scripts.php');
include('includes/footer.php');
?>