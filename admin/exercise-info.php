<?php
include('includes/header.php');
include('includes/navbar.php');
?>


<div class="modal fade" id="addexercise" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Exercise Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="backend.php" method="POST" class="needs-validation" novalidate enctype="multipart/form-data">

                <div class="modal-body">

                    <?php
                    $connection = mysqli_connect("localhost", "root", "", "healthy_db");
                    $foodtype = "SELECT * FROM exercise_list";
                    $type_run = mysqli_query($connection, $foodtype);

                    if (mysqli_num_rows($type_run) > 0) {
                    ?>
                        <div class="form-group">
                            <label for="exercisetype" class="form-label"> Type of exercise </label>
                            <select name="exercisetype_id" class="form-control" required>
                                <option value="">Choose Type of exercise</option>
                                <?php
                                foreach ($type_run as $row) {
                                ?>
                                    <option value="<?php echo $row['id']; ?>"><?php echo $row['name'];  ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                    <?php
                    } else {
                        echo "No Data Available";
                    }
                    ?>

                    <div class="form-group">
                        <label for="exercisename" class="form-label"> Exercisename </label>
                        <input type="text" name="name" class="form-control" id="exercisename" placeholder="Enter Exercisename" required>
                        <span class="invalid-feedback"> Please enter exercisename.</span>
                    </div>

                    <div class="form-group">
                        <label for="detail" class="form-label">Detail</label>
                        <textarea type="text" name="detail" class="form-control" id="detail" placeholder="Enter Detail" rows="5" required></textarea>
                        <span class="invalid-feedback"> Please enter detail</span>
                    </div>

                    <div class="form-group">
                        <label for="burn" class="form-label">Burn</label>
                        <input type="number" name="burn" class="form-control" id="burn" placeholder="Enter Burn" required>
                        <span class="invalid-feedback"> Please enter burn.</span>
                    </div>

                    <div class="form-group">
                        <label for="image" class="form-label"> Upload image </label>
                        <input type="file" name="image" id="image" class="form-control" required>
                        <span class="invalid-feedback"> Please upload file.</span>
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" name="exercisebtn" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="container-fluid">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Exercise Information
            <form action="backend.php" method="POST">
                    <button type="submit" name="delete-exercise-multiple" class="btn btn-danger">Delete Multiple Data</button>
                </form>
                <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#addexercise">
                    Add
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

                $query = "SELECT * FROM exercise";
                $query_run = mysqli_query($connection, $query);
                ?>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Check</th>
                            <th>Image</th>
                            <th>Exercisename </th>
                            <th>Burn</th>
                            <th>Type of exercise</th>
                            <th>DETAIL</th>
                            <th>EDIT </th>
                            <th>DELETE </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (mysqli_num_rows($query_run) > 0) {
                            while ($row = mysqli_fetch_assoc($query_run)) {
                                $ex_type_id = $row['ex_type_id'];
                                $foodtype = "SELECT * FROM exercise_list WHERE id ='$ex_type_id'";
                                $foodtype_run = mysqli_query($connection, $foodtype);
                        ?>
                                <tr>
                                    <td>
                                    <input type="checkbox" onclick="toggleCheckbox(this)" value="<?php echo $row['id'];  ?>" <?php echo $row['visible'] == 1 ? "checked" : "" ?>>
                                    </td>
                                    <td><?php echo '<img src="exercise-images/' . $row['image'] . '" width="100px;" height="100px;" alt="Image">' ?></td>
                                    <td><?php echo $row['exercisename']; ?></td>
                                    <td><?php echo $row['burn'];  ?> </td>
                                    <td>
                                        <?php

                                        foreach ($foodtype_run as $foodtype_row) {
                                            echo $foodtype_row['name'];
                                        }

                                        ?>

                                    </td>
                                    <td>
                                    <a href="#detail<?php echo $row['id']; ?>" data-toggle="modal" class="btn btn-warning ">DETAIL</a>&nbsp;
                                        <?php include('exercise-modal.php');   ?>
                                    </td>
                                    <td>
                                        <form action="exercise-info-edit.php" method="post">
                                            <input type="hidden" name="edit_id" value="<?PHP echo $row['id']; ?>">
                                            <button type="submit" name="edit_btn" class="btn btn-success"> EDIT</button>
                                        </form>
                                    </td>
                                    <td>
                                        <form action="backend.php" method="post">
                                            <input type="hidden" name="delete_id" value="<?PHP echo $row['id']; ?>">
                                            <button type="submit" name="delete_exercise_btn" class="btn btn-danger"> DELETE</button>
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
<script src="js/exercise-multi.js"></script>
<?php
include('includes/scripts.php');
include('includes/footer.php');
?>