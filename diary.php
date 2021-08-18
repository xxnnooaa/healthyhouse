<?php
include('includes/navbar.php');
error_reporting(~E_NOTICE);

if(isset($_POST['calculate'])){

    $weight = $_POST['weight'];
    $cal = $_POST['cal'];
    $activity = $_POST['activity'];

    $diet = 0;
    $total = 0;
    $hr = 0;
    $totaldiary = 0;

    $met1 = 2.0;
    $met2 = 5.0;
    $met3 = 6.3;
    $met4 = 6.5;
    $met5 = 7.0;
    $met6 = 7.0;
    $met7 = 8.0;

    if ($activity == "1") {
        $diet = ($cal / (0.0175 * $weight * $met1));
        $total = round($diet);
        if ($total >= 60) {
            $hr = $total * 0.016667;
            $totaldiary = round($hr) . " ชั่วโมง";
        } else {
            $totaldiary = $total . " นาที";
        }
    }

    if ($activity == "2") {
        $diet = ($cal / (0.0175 * $weight * $met2));
        $total = round($diet);
        if ($total >= 60) {
            $hr = $total * 0.016667;
            $totaldiary = round($hr) . " ชั่วโมง";
        } else {
            $totaldiary = $total . " นาที";
        }
    }

    if ($activity == "3") {
        $diet = ($cal / (0.0175 * $weight * $met3));
        $total = round($diet);
        if ($total >= 60) {
            $hr = $total * 0.016667;
            $totaldiary = round($hr) . " ชั่วโมง";
        } else {
            $totaldiary = $total . " นาที";
        }
    }

    if ($activity == "4") {
        $diet = ($cal / (0.0175 * $weight * $met4));
        $total = round($diet);
        if ($total >= 60) {
            $hr = $total * 0.016667;
            $totaldiary = round($hr) . " ชั่วโมง";
        } else {

            $totaldiary = $total . " นาที";
        }
    }

    if ($activity == "5") {
        $diet = ($cal / (0.0175 * $weight * $met5));
        $total = round($diet);
        if ($total >= 60) {
            $hr = $total * 0.016667;
            $totaldiary = round($hr) . " ชั่วโมง";
        } else {

            $totaldiary = $total . " นาที";
        }
    }

    if ($activity == "6") {
        $diet = ($cal / (0.0175 * $weight * $met6));
        $total = round($diet);
        if ($total >= 60) {
            $hr = $total * 0.016667;
            $totaldiary = round($hr) . " ชั่วโมง";
        } else {

            $totaldiary = $total . " นาที";
        }
    }

    if ($activity == "7") {
        $diet = ($cal / (0.0175 * $weight * $met7));
        $total = round($diet);
        if ($total >= 60) {
            $hr = $total * 0.016667;
            $totaldiary = round($hr) . " ชั่วโมง";
        } else {

            $totaldiary = $total . " นาที";
        }
    }


}


?>

<div class="container">
    <div class="card" style="margin: 7% auto;  width: 700px; ">
        <div class="card-header text-center" style="font-size: 20px;">เครื่องคำนวณน้ำหนักที่เหมาะสม</div>
        <div class="card-body">
            <form action="diary.php" method="POST" class="needs-validation" novalidate>

                <div class="form-group">
                    <label for="weight" class="form-label"> น้ำหนัก (kg.) :</label>
                    <input type="number" name="weight" class="form-control" id="weight" min="1" value="<?php echo $weight ?>" placeholder="ระบุน้ำหนัก" required>
                    <span class="invalid-feedback"> โปรดระบุน้ำหนัก</span>
                </div>

                <div class="form-group">
                    <label for="cal" class="form-label">จำนวนแคลอรี่ที่ต้องการเผาผลาญ : </label>
                    <input type="number" name="cal" class="form-control" id="cal" min="1" value="<?php echo $cal ?>" placeholder="ระบุจำนวนแคลอรี่ที่ต้องการเผาผลาญ" required>
                    <span class="invalid-feedback"> โปรดระบุจำนวนแคลอรี่ที่ต้องการเผาผลาญ</span>
                </div>

                <div class="form-group">
                    <label for="activity" class="form-label"> กิจกรรมที่ทำ : </label>
                    <select name="activity" class="form-select" required>
                        <option value="">เลือกกิจกรรมที่ทำ</option>
                        <option value="1">เดินช้า ๆ</option>
                        <option value="2">เดินเร็ว</option>
                        <option value="3">เดินเร็วมาก</option>
                        <option value="4">เต้นแอโรบิก</option>
                        <option value="5">ว่ายน้ำ</option>
                        <option value="6">วิ่ง</option>
                        <option value="7">ขี่จักรยานเร็ว</option>
                        <?php
                        switch($activity){
                            case "1" :
                                echo '<option value="1" selected>เดินช้า ๆ</option>';
                                break;
                            case "2" :
                                echo '<option value="2" selected>เดินเร็ว</option>' ;   
                                break;
                            case "3" :
                                echo '<option value="3" selected>เดินเร็วมาก</option>' ;
                                break;
                            case "4" :
                                echo '<option value="4" selected>เต้นแอโรบิก</option>'  ;
                                break; 
                            case "5" :  
                                echo '<option value="5" selected>ว่ายน้ำ</option>';
                                break;  
                            case "6" :
                                echo '<option value="6" selected>วิ่ง</option>';
                                break;
                            case "7" :
                                echo '<option value="7" selected>ขี่จักรยานเร็ว</option>'; 
                                break;   
                        }
                    ?>
                    </select>
                    <span class="invalid-feedback"> โปรดระบุกิจกรรมที่ทำ</span>
                </div>

                <div>
                    <button type="submit" class="btn btn-info" name="calculate">คำนวณ</button>
                </div>
                </br>
            </form>
            <div class="alert alert-primary " role="alert">
                <h5 class="text-dark"><?php echo "คุณต้องออกกำลังกาย :  " . $totaldiary ?></h5>
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