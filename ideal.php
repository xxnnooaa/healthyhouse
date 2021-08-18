<?php
include('includes/navbar.php');
error_reporting(~E_NOTICE);

if(isset($_POST['calculate'])){

    $gender = $_POST['gender'];
    $height = $_POST['height'];

    $mideal = 0;
    $fideal = 0;
    $totalideal = 0;

    if($gender == "1"){
        $mideal = ($height - 150) * 0.7 + 50;
        $totalideal = $mideal . " kg.";
    }
    else{
        $fideal = ($height - 150) * 0.7 + 45;
        $totalideal = $fideal . " kg.";
    }
}
?>

<div class="container">
    <div class="card" style="margin: 7% auto;  width: 700px; ">
        <div class="card-header text-center" style="font-size: 20px;">เครื่องคำนวณน้ำหนักที่เหมาะสม</div>
        <div class="card-body">
        <form action="ideal.php" method="post" class="needs-validation" novalidate>
        <div class="form-group">
        <label for="gender" class="form-label"> ระบุเพศ : </label>
                    </br>
                    <div class="form-check form-check-inline form-group">
                            <?php
                                    if($gender == "1") {
                                        echo '<input class="form-check-input" type="radio" name="gender" id="gender" value="1"  checked>';
                                    }
                                    else{
                                        echo '<input class="form-check-input" type="radio" name="gender" id="gender" value="1"  required>';
                                    }
                            ?>
                            <label class="form-check-label" for="gender">เพศชาย</label> &nbsp;&nbsp;
                            <?php
                                if($gender == "2"){
                                    echo '<input class="form-check-input" type="radio" name="gender" id="gender" value="2"  checked>';
                                }
                                else{
                                    echo '<input class="form-check-input" type="radio" name="gender" id="gender" value="2"  required>';
                                }
                    ?>
                    <label class="form-check-label" for="gender">เพศหญิง</label>
                    </div>
        </div>

        <div class="form-group">
                    <label for="height" class="form-label"> ส่วนสูง (cm.) : </label>
                    <input type="number" name="height" class="form-control" min="1" id="height" value="<?php echo $height ?>" placeholder="ระบุส่วนสูง" required>
                    <span class="invalid-feedback"> โปรดระบุส่วนสูง</span>
                </div>

                <div>
                    <button type="submit" class="btn btn-info" name="calculate">คำนวณ</button>
                </div>
                </br>
        
        </form>
            
            <div class="alert alert-primary " role="alert">
                <h5 class="text-dark"><?php echo "ช่วงน้ำหนักที่เหมาะสมของคุณ คือ :  " . $totalideal ?></h5>
            </div>
        </div>
    </div>
</div>


<script src="js/script.js"></script>
</body>

</html>

<?php
include('includes/footer.php');
include('includes/script.php');
?>