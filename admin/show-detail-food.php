<div class="modal fade" id="detailfood<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"> Food Detail</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="backend.php" method="POST" class="needs-validation" novalidate enctype="multipart/form-data">
                <div class="modal-body">

                    <?php
                    $connection = mysqli_connect("localhost", "root", "", "healthy_db");
                    $query = "SELECT * FROM admin WHERE admin_id='$id' ";
                    $query_run = mysqli_query($connection, $query);
        
                    foreach ($query_run as $row) {
                ?>
                    <div class="row">
                        <div class="col-lg-12" align="center">
                            <?php echo '<img src="food-images/' . $row['image'] . '" width="100px;" height="100px;" alt="Image">' ?>
                        </div>
                    </div>

                    <div style="height:10px;"></div>
                    <div class="row">
                        <div class="col-lg-4" align="left">
                            <label style="position:relative; top:7px;">ประเภทอาหาร :</label>
                        </div>
                        <div class="col-lg-8" align="left">
                            <?php echo $erow['food_type_id']; ?>
                        </div>
                    </div>

                    <div style="height:10px;"></div>
                    <div class="row">
                        <div class="col-lg-4" align="left">
                            <label style="position:relative; top:7px;">ชื่อเมนู :</label>
                        </div>
                        <div class="col-lg-8" align="left">
                            <?php echo $erow['foodname']; ?>
                        </div>
                    </div>

                    <div style="height:10px;"></div>
                    <div class="row">
                        <div class="col-lg-4" align="left">
                            <label style="position:relative; top:7px;">วัตถุดิบ :</label>
                        </div>
                        <div class="col-lg-8" align="left">
                            <?php echo $erow['ingredients']; ?>
                        </div>
                    </div>

                    <div style="height:10px;"></div>
                    <div class="row">
                        <div class="col-lg-4" align="left">
                            <label style="position:relative; top:7px;">วิธีทำ :</label>
                        </div>
                        <div class="col-lg-8" align="left">
                            <?php echo $erow['cook']; ?>
                        </div>
                    </div>

                    <div style="height:10px;"></div>
                    <div class="row">
                        <div class="col-lg-4" align="left">
                            <label class="control-label" style="position:relative; top:7px;">แคลอรี่:</label>
                        </div>
                        <div class="col-lg-8" align="left">
                            <?php echo $erow['calorie']; ?>
                        </div>
                    </div>

                </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
        </form>
        <?php
            }
        
        ?>
    </div>
</div>
</div>