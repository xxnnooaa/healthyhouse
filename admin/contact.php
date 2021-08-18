    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Contact Information
            
            </h6>
        </div>

        <div class="card-body" >
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
                 $query = "SELECT * FROM notifications";
                 $query_run = mysqli_query($connection, $query);
            ?>
            
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                        
                            <th>ID</th>
                            <th>From </th>
                            <th>Date</th>
                            <th>DETAIL </th>
                            <th>DELETE</th>
                         
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        if (mysqli_num_rows($query_run) > 0) {
                            while ($row = mysqli_fetch_assoc($query_run)) {
                        ?>
                       
                                <tr>
                               
                                    <td><?php echo $row['id'];  ?></td>
                                    <td><?php echo $row['name'];  ?></td>
                                    <td><?php echo $row['date'];  ?> </td>
                                    
                                    <td>
                                        <form action="contact-modal.php" method="post">
                                            <input type="hidden" name="edit_id" value="<?PHP echo $row['id']; ?>">
                                            <button type="submit" name="edit_btn" class="btn btn-warning"> DETAIL</button>
                                        </form>
                                    </td>
                                    <td>
                                        <form action="backend.php" method="post">
                                            <input type="hidden" name="delete_id" value="<?PHP echo $row['id']; ?>">
                                            <button type="submit" name="message_delete_btn" class="btn btn-danger"> DELETE</button>
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


