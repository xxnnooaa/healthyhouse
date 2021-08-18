<?php
include('includes/header.php');
include('includes/navbar.php');
?>

<div class="modal fade" id="addadminprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Member Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="backend.php" method="POST" class="needs-validation" novalidate>

                <div class="modal-body">

                <div class="form-group">
                    <label for="firstname" class="form-label"> Firstname </label>
                    <input type="text" name="firstname" class="form-control" id="firstname" placeholder="Enter Firstname" required>
                    <span class="invalid-feedback"> Please enter firstname.</span>
                </div>
                <div class="form-group">
                    <label for="lastname" class="form-label"> Lastname </label>
                    <input type="text" name="lastname" class="form-control" id="lastname" placeholder="Enter Lastname" required>
                    <span class="invalid-feedback"> Please enter lastname.</span>
                </div>
                <div class="form-group">
                    <label for="username" class="form-label"> Username </label>
                    <input type="text" name="name" class="form-control" id="username" placeholder="Enter Username" required>
                    <span class="invalid-feedback"> Please enter username.</span>
                </div>
                <div class="form-group">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" id="email" placeholder="name@example.com" required>
                    <span class="invalid-feedback"> Incorrect email address.</span>
                </div>
                <div class="form-group">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" id="password"  placeholder="Enter Password" required>
                    <span class="invalid-feedback"> Please enter password.</span>
                </div>
                <div class="form-group">
                    <label for="cpassword" class="form-label">Confirm Password</label>
                    <input type="password" name="cpassword" class="form-control" id="cpassword" placeholder="Enter Confirm Password" required>
                    <span class="invalid-feedback"> Please enter confirm password.</span>
                </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" name="memberbtn" class="btn btn-primary">Save</button>
                </div>
            </form>

        </div>
    </div>
</div>
 

<div class="container-fluid" >
 <!-- DataTales Example -->
 <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Member Information
            <form action="backend.php" method="POST">
                <button type="submit" name="delete-member-multiple" class="btn btn-danger">Delete Multiple Data</button>
            </form>
            <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#addadminprofile">
                    ADD
                </button>
            </h6>
        </div>

        <div class="card-body">
            <?php

            if (isset($_SESSION['success']) && $_SESSION['success'] != '') {
                echo '<h2 class="bg-primary text-white"> ' . $_SESSION['success'] . ' </h2>';
                unset($_SESSION['success']);
            }

            if (isset($_SESSION['status']) && $_SESSION['status'] != '') {
                echo '<h2 class="bg-danger text-white"> ' . $_SESSION['status'] . ' </h2>';
                unset($_SESSION['status']);
            }
            ?>
            <div class="table-responsive">
                <?php
                $connection = mysqli_connect("localhost", "root", "", "healthy_db");

                $query = "SELECT * FROM member";
                $query_run = mysqli_query($connection, $query);
                ?>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Check</th>
                            <th>ID</th>
                            <th>Username </th>
                            <th>Email </th>
                            <th>Password</th>
                            <th>EDIT </th>
                            <th>DELETE </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (mysqli_num_rows($query_run) > 0) {
                            while ($row = mysqli_fetch_assoc($query_run)) {
                        ?>
                                <tr>
                                    <td>
                                        <input type="checkbox" onclick="toggleCheckbox(this)" value="<?php echo $row['id'];  ?>" <?php echo $row['visible'] == 1 ? "checked" : "" ?>>
                                    </td>
                                    <td><?php echo $row['id'];  ?></td>
                                    <td><?php echo $row['name']; ?></td>
                                    <td><?php echo $row['email'];  ?> </td>
                                    <td><?php echo $row['password'];  ?></td>
                                    <td>
                                        <form action="member-info-edit.php" method="post">
                                            <input type="hidden" name="edit_id" value="<?PHP echo $row['id']; ?>">
                                            <button type="submit" name="edit_btn" class="btn btn-success"> EDIT</button>
                                        </form>
                                    </td>
                                    <td>
                                        <form action="backend.php" method="post">
                                            <input type="hidden" name="delete_id" value="<?PHP echo $row['id']; ?>">
                                            <button type="submit" name="member_delete_btn" class="btn btn-danger"> DELETE</button>
                                        </form>
                                    </td>
                                </tr>
                        <?php
                            }
                        } else {
                            echo "No Record Found";
                        }
                        ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

<script src="js/admin-validation.js"></script>
<script src="js/member-multi.js"></script>

<?php
include('includes/scripts.php');
include('includes/footer.php');
?>