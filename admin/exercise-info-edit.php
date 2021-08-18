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

            $query = "SELECT * FROM exercise WHERE id='$id' ";
            $query_run = mysqli_query($connection, $query);

            foreach ($query_run as $rowediting) {
        ?>

                <form action="backend.php" method="POST" enctype="multipart/form-data">

                    <input type="hidden" name="edit_id" value="<?php echo $rowediting['id'] ?>">

                    
                    <?php
                   
                    $foodtype = "SELECT * FROM exercise_list";
                    $type_run = mysqli_query($connection, $foodtype);

                    if (mysqli_num_rows($type_run) > 0) {
                    ?>
                        <div class="form-group">
                            <label for="exercisetype" class="form-label"> Type of food </label>
                            <select name="exercisetype_id" class="form-control" required>
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
                        <label> Exercisename </label>
                        <input type="text" name="exercisename" value="<?php echo $rowediting['exercisename'] ?>" class="form-control" >
                    </div>
                    <div class="form-group">
                        <label>Detail</label>
                        <textarea type="text" name="detail" id="detail"  class="form-control" rows="5" ><?php echo $rowediting['detail'] ?></textarea>
                    </div>
                    <div class="form-group">
                        <label> Burn </label>
                        <input type="number" name="burn" value="<?php echo $rowediting['burn'] ?>" class="form-control">
                    </div>
                    <div class="form-group">
                        <label > Upload image </label>
                        <input type="file" name="image"  class="form-control" required>
                       
                    </div>

                    <a href="food-info.php" class="btn btn-danger"> CANCEL </a>
                    <button type="submit" name="update-exericse-btn" class="btn btn-primary"> UPDATE </button>

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