<?php
include('includes/navbar.php');
error_reporting(~E_NOTICE);

if (isset($_POST['calculate'])) {

    $height = $_POST['height'];
    $weight = $_POST['weight'];

    $m = 0;
    $bmi = 0;
    $totalbmi = 0;
    $bmiresult = 0;

    $m =  $height / 100;
    $bmi = ($weight / ($m * $m));
    $totalbmi = round($bmi, 2);
    $bmiresult = ceil($totalbmi);

    if ($bmiresult < 18.5) {
        $result = "ผอมมากไป";
    }
    if ($bmiresult >= 18.5 && $bmi <= 22.9) {
        $result = "น้ำหนักปกติ";
    }
    if ($bmiresult >= 23.0 && $bmi <= 24.9) {
        $result = "น้ำหนักเกิน";
    }
    if ($bmiresult >= 25.0 && $bmi <= 29.9) {
        $result = "อ้วน";
    }
    if ($bmiresult > 30.0) {
        $result = "อ้วนมาก";
    }
}

?>
<div class="container">
    <div class="card" style="margin: 7% auto;  width: 700px; ">
        <div class="card-header text-center" style="font-size: 20px;">เครื่องคำนวณคำนวณหาดัชนีมวลกาย </div>
        <div class="card-body">

            <form action="bmi.php" method="POST" class="needs-validation" novalidate>

                <div class="form-group">
                    <label for="height" class="form-label"> ส่วนสูง (cm.) :</label>
                    <input type="number" name="height" class="form-control" min="1"  id="height" value="<?php echo $height ?>" placeholder="ระบุส่วนสูง" required>
                    <span class="invalid-feedback"> โปรดระบุส่วนสูง</span>
                </div>

                <div class="form-group">
                    <label for="weight" class="form-label"> น้ำหนัก (kg.) :</label>
                    <input type="number" name="weight" class="form-control" min="1" id="weight" value="<?php echo $weight ?>" placeholder="ระบุน้ำหนัก" required>
                    <span class="invalid-feedback"> โปรดระบุน้ำหนัก</span>
                </div>

                <div>
                    <button type="submit" class="btn btn-info" name="calculate" style="font-size: 18px;">คำนวณ</button>
                </div>
                </br>

                <div class="alert alert-primary " role="alert">
                    <h5 class="text-dark" style="font-size: 18px;"><?php echo "ดัชนีมวลกายของคุณ คือ :  " . $bmiresult ?></h5></br>
                    <h5 class="text-dark" style="font-size: 18px;"><?php echo "คุณอยู่ในเกณฑ์ :  " . $result ?></h5>
                </div>

            </form>

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