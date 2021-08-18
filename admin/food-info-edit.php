<?php
include('includes/header.php');
include('includes/navbar.php');
?>



<div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"> Edit Food Data </h6>
    </div>
    <div class="card-body">
        <?php
        $connection = mysqli_connect("localhost", "root", "", "healthy_db");
        if (isset($_POST['edit_btn'])) {
            $id = $_POST['edit_id'];

            $query = "SELECT * FROM food WHERE id='$id' ";
            $query_run = mysqli_query($connection, $query);

            foreach ($query_run as $rowediting) {
        ?>

                <form action="backend.php" method="POST" enctype="multipart/form-data">

                    <input type="hidden" name="edit_id" value="<?php echo $rowediting['id'] ?>">

                    
                    <?php
                   
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
                        <label> Foodname </label>
                        <input type="text" name="foodname" value="<?php echo $rowediting['foodname'] ?>" class="form-control" >
                    </div>
                    <div class="form-group">
                        <label>Ingredients</label>
                        <textarea type="text" name="ingredients" id="ingredients"  class="form-control" rows="5" ><?php echo $rowediting['ingredients'] ?></textarea>
                    </div>
                    <div class="form-group">
                        <label>Cook</label>
                        <textarea type="text" name="cook"  id="cook"  class="form-control" rows="5"><?php echo $rowediting['cook'] ?></textarea>
                    </div>
                    <div class="form-group">
                        <label> Calorie </label>
                        <input type="number" name="calorie" value="<?php echo $rowediting['calorie'] ?>" class="form-control">
                    </div>
                    <div class="form-group">
                        <label > Upload image </label>
                        <input type="file" name="image"  class="form-control" required>
                       
                    </div>

                    <a href="food-info.php" class="btn btn-danger"> CANCEL </a>
                    <button type="submit" name="update-food-btn" class="btn btn-primary"> UPDATE </button>

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