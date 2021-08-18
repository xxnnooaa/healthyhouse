<?php
include('includes/header.php');
include('includes/navbar.php');
?>

<div class="modal fade" id="addfood" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Food Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="backend.php" method="POST" class="needs-validation" novalidate enctype="multipart/form-data">
                <div class="modal-body">

                    <?php
                    $connection = mysqli_connect("localhost", "root", "", "healthy_db");
                    $foodtype = "SELECT * FROM food_list";
                    $type_run = mysqli_query($connection, $foodtype);

                    if (mysqli_num_rows($type_run) > 0) {
                    ?>
                        <div class="form-group">
                            <label for="foodtype" class="form-label"> Type of food </label>
                            <select name="foodtype_id" class="form-control" required>
                                <option value="">Choose Type of food</option>
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
                        <label for="foodname" class="form-label"> Foodname </label>
                        <input type="text" name="foodname" class="form-control" id="foodname" placeholder="Enter Foodname" required>
                        <span class="invalid-feedback"> Please enter foodname.</span>
                    </div>

                    <div class="form-group">
                        <label for="ingredients" class="form-label">Ingredients</label>
                        <textarea type="text" name="ingredients" class="form-control" id="ingredients" placeholder="Enter Ingredients" rows="5" required></textarea>
                        <span class="invalid-feedback"> Please enter ingredients</span>
                    </div>

                    <div class="form-group">
                        <label for="cook" class="form-label">Cook</label>
                        <textarea type="text" name="cook" class="form-control" id="cook" placeholder="Enter Cook" rows="5" required></textarea>
                        <span class="invalid-feedback"> Please enter cook.</span>
                    </div>

                    <div class="form-group">
                        <label for="calorie" class="form-label">Calorie</label>
                        <input type="number" name="calorie" class="form-control" id="calorie" placeholder="Enter Calorie" required>
                        <span class="invalid-feedback"> Please enter calorie.</span>
                    </div>

                    <div class="form-group">
                        <label for="image" class="form-label"> Upload image </label>
                        <input type="file" name="image" id="image" class="form-control" required>
                        <span class="invalid-feedback"> Please upload file.</span>
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" name="food_add_btn" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="container-fluid">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Food Information
                <form action="backend.php" method="POST">
                    <button type="submit" name="delete-food-multiple" class="btn btn-danger">Delete Multiple Data</button>
                </form>
                <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#addfood">
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

                $query = "SELECT * FROM food";
                $query_run = mysqli_query($connection, $query);
                ?>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Check</th>
                            <th>Image</th>
                            <th>Foodname </th>
                            <th>Calorie</th>
                            <th>Type of food</th>
                            <th>DETAIL</th>
                            <th>EDIT </th>
                            <th>DELETE </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (mysqli_num_rows($query_run) > 0) {
                            while ($row = mysqli_fetch_assoc($query_run)) {
                                $foodtype_id = $row['food_type_id'];
                                $food_type = "SELECT * FROM food_list WHERE id='$foodtype_id '";
                                $food_type_run = mysqli_query($connection, $food_type);

                        ?>
                                <tr>
                                    <td>
                                        <input type="checkbox" onclick="toggleCheckbox(this)" value="<?php echo $row['id'];  ?>" <?php echo $row['visible'] == 1 ? "checked" : "" ?>>
                                    </td>
                                    <td><?php echo '<img src="food-images/' . $row['image'] . '" width="100px;" height="100px;" alt="Image">' ?></td>
                                    <td><?php echo $row['foodname']; ?></td>
                                    <td><?php echo $row['calorie'];  ?> </td>
                                    <td>
                                        <?php foreach ($food_type_run as $type_row) {
                                            echo $type_row['name'];
                                        } ?>
                                    </td>
                                    <td>
                                    <a href="#detail<?php echo $row['id']; ?>" data-toggle="modal" class="btn btn-warning ">DETAIL</a>&nbsp;
                                        <?php include('food-modal.php');   ?>
                                    </td>
                                    <td>
                                        <form action="food-info-edit.php" method="post">
                                            <input type="hidden" name="edit_id" value="<?PHP echo $row['id']; ?>">
                                            <button type="submit" name="edit_btn" class="btn btn-success"> EDIT</button>
                                        </form>
                                    </td>
                                    <td>
                                        <form action="backend.php" method="post">
                                            <input type="hidden" name="delete_id" value="<?PHP echo $row['id']; ?>">
                                            <button type="submit" name="delete_food_btn" class="btn btn-danger"> DELETE</button>
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
<script src="js/food-multi.js"></script>
<?php
include('includes/scripts.php');
include('includes/footer.php');
?>