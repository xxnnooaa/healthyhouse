<?php
include('includes/navbar.php');
error_reporting(~E_NOTICE);

if (isset($_POST['calculate'])) {

    $gender = $_POST['gender'];
    $weight = $_POST['weight'];
    $height = $_POST['height'];
    $age = $_POST['age'];
    $activity = $_POST['activity'];

    $bmr = 0;
    $totalbmr = 0;
    $tdee = 0;
    $totaltdee = 0;

    if ($gender == "1") {
        $bmr = 66 + (13.7 * $weight) + (5 * $height) - (6.8 * $age);
        $totalbmr = ceil($bmr) . " kcal";

        switch ($activity) {
            case "1":
                $tdee = $totalbmr * 1.2;
                $totaltdee = round($tdee) . " kcal";
                break;
            case "2":
                $tdee = $totalbmr * 1.375;
                $totaltdee = round($tdee) . " kcal";
                break;
            case "3":
                $tdee = $totalbmr * 1.55;
                $totaltdee = round($tdee) . " kcal";
                break;
            case "4":
                $tdee = $totalbmr * 1.725;
                $totaltdee = round($tdee) . " kcal";
                break;
            case "5":
                $tdee = $totalbmr * 1.9;
                $totaltdee = round($tdee) . " kcal";
                break;
        }
    } else {
        $bmr = 655 + (9.6 * $weight) + (1.8 * $height) - (4.7 * $age);
        $totalbmr = ceil($bmr) . " kcal";

        switch ($activity) {
            case "1":
                $tdee = $totalbmr * 1.2;
                $totaltdee = round($tdee) . " kcal";
                break;
            case "2":
                $tdee = $totalbmr * 1.375;
                $totaltdee = round($tdee) . " kcal";
                break;
            case "3":
                $tdee = $totalbmr * 1.55;
                $totaltdee = round($tdee) . " kcal";
                break;
            case "4":
                $tdee = $totalbmr * 1.725;
                $totaltdee = round($tdee) . " kcal";
                break;
            case "5":
                $tdee = $totalbmr * 1.9;
                $totaltdee = round($tdee) . " kcal";
                break;
        }
    }
}

?>


<div class="container">
    <div class="card" style="margin: 7% auto;  width: 700px;">
        <div class="card-header text-center" style="font-size: 20px;">เครื่องคำนวณ BMR & TDEE </div>
        <div class="card-body">

            <form action="bmr-tdee.php" method="POST" class="needs-validation" novalidate>

                <div class="form-group">
                    <label for="gender" class="form-label"> ระบุเพศ : </label>
                    </br>
                    <div class="form-check form-check-inline form-group">
                        <?php
                        if ($gender == "1") {
                            echo '<input class="form-check-input" type="radio" name="gender" id="gender" value="1"  checked>';
                        } else {
                            echo ' <input class="form-check-input" type="radio" name="gender" id="gender" value="1" required>';
                        }
                        ?>
                        <label class="form-check-label" for="gender">เพศชาย</label> &nbsp;&nbsp;
                        <?php
                            if($gender == "2"){
                                echo '<input class="form-check-input" type="radio" name="gender" id="gender" value="2"  checked>';
                            }else {
                                echo ' <input class="form-check-input" type="radio" name="gender" id="gender" value="2" required>';
                            }
                        ?>
                        <label class="form-check-label" for="gender">เพศหญิง</label>
                    </div>

                </div>

                <div class="form-group">
                    <label for="weight" class="form-label"> น้ำหนัก (kg.) :</label>
                    <input type="number" name="weight" class="form-control" min="1" id="weight" value="<?php echo $weight ?>" placeholder="ระบุน้ำหนัก" required>
                    <span class="invalid-feedback"> โปรดระบุน้ำหนัก</span>
                </div>

                <div class="form-group">
                    <label for="height" class="form-label"> ส่วนสูง (cm.) : </label>
                    <input type="number" name="height" class="form-control" min="1" id="height" value="<?php echo $height ?>" placeholder="ระบุส่วนสูง" required>
                    <span class="invalid-feedback"> โปรดระบุส่วนสูง</span>
                </div>

                <div class="form-group">
                    <label for="age" class="form-label"> ส่วนสูง (cm.) : </label>
                    <input type="number" name="age" class="form-control" min="1" id="age" value="<?php echo $age ?>" placeholder="ระบุอายุ" required>
                    <span class="invalid-feedback"> โปรดระบุส่วนสูง</span>
                </div>

                <div class="form-group">
                    <label for="activity" class="form-label"> กิจกรรมที่ทำ : </label>
                    <select name="activity" class="form-select" id="activity" required>
                        <option value="">เลือกกิจกรรมที่ทำ</option>
                        <option value="1">ทำงานแบบนั่งอยู่กับที่</option>
                        <option value="2">ออกกำลังกาย หรือเล่นกีฬาแบบเบาๆ 1-3 วันต่อสัปดาห์</option>
                        <option value="3">ออกกำลังกาย หรือเล่นกีฬาความหนักปานกลาง 3-5 วันต่อสัปดาห์</option>
                        <option value="4">ออกกำลังกาย หรือเล่นกีฬาหนัก 6-7 วันต่อสัปดาห์</option>
                        <option value="5">ออกกำลังกาย หรือเล่นกีฬาหนัก แบบการซ้อมเพื่อแข่งขัน เป็นประจำทุกวัน</option>
                    
                    <?php
                        switch($activity){
                            case "1" :
                                echo ' <option value="1" selected>ทำงานแบบนั่งอยู่กับที่</option>';
                                break;
                            case "2" :
                                echo '<option value="2" selected>ออกกำลังกาย หรือเล่นกีฬาแบบเบาๆ 1-3 วันต่อสัปดาห์</option>' ;   
                                break;
                            case "3" :
                                echo '<option value="3" selected>ออกกำลังกาย หรือเล่นกีฬาความหนักปานกลาง 3-5 วันต่อสัปดาห์</option>' ;
                                break;
                            case "4" :
                                echo '<option value="4" selected>ออกกำลังกาย หรือเล่นกีฬาหนัก 6-7 วันต่อสัปดาห์</option>'  ;
                                break; 
                            case "5" :  
                                echo '<option value="5" selected>ออกกำลังกาย หรือเล่นกีฬาหนัก แบบการซ้อมเพื่อแข่งขัน เป็นประจำทุกวัน</option>';
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
                <div class="alert alert-primary " role="alert">
                    <h5 class="text-dark"><?php echo "อัตราการเผาผลาญพลังงานของคุณ คือ  :  " . $totalbmr ?></h5></br>
                    <h5 class="text-dark"><?php echo "อัตราการเผาผลาญพลังงานในแต่ละวัน คือ :  " . $totaltdee ?></h5>
                </div>


            </form>

            </br>



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