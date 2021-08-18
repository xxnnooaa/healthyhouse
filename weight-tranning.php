<?php
include('includes/navbar.php');
include('server.php');
error_reporting(~E_NOTICE);

?>

<nav aria-label="breadcrumb" style="margin: 80px auto; width: 900px; font-size: 20px;">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">ออกกำลังกาย</a></li>
        <li class="breadcrumb-item active" aria-current="page">คาร์ดิโอ</li>
    </ol>
    <?php
       
       if(isset($_POST['valueToSearch'])){
           $valueToSearch = $_POST['valueToSearch'];
           $query  = "SELECT * FROM exercise WHERE ex_type_id = '2' AND burn  LIKE '%$valueToSearch%'";
           $search_result = filterTable($query);
       }else{
           $query = "SELECT * FROM exercise WHERE ex_type_id = '2'";
           $search_result = filterTable($query);
       }
       function filterTable($query)
{
   $connect = mysqli_connect("localhost", "root", "", "healthy_db");
   $filter_Result = mysqli_query($connect, $query);
   return $filter_Result;
}
      
   ?>
   <form class="d-flex" action="cardio.php" method="post">
       <input class="form-control me-2" name="valueToSearch" type="text" placeholder="ค้นหาโดยแคลอรี่" aria-label="Search" value="<?php echo $valueToSearch;  ?>">
       <button class="btn btn-outline-success" name="search" type="submit">ค้นหา</button>
     </form>
</nav>

<div class="container" style="margin: 50px auto;">
    <div class="row">
    <?php 
        
        while($row = mysqli_fetch_array($search_result)) { 
?> 
            <div class="col-sm-4">
                <div class="card ">
                <div class="card-body card-info">
                    <?php echo '<img src="admin/exercise-images/' . $row['image'] . '" width="100px;" height="100px;" alt="Image">' ?>
                    </br></br>
                        <h5 class="card-title" style="font-size: 24px;"><?php echo $row['exercisename']; ?></h5>
                        </br>
                        <footer class="blockquote-footer" style="font-size: 16px;"><?php echo "จำนวนพลังงานที่เผาผาญ " . $row['burn'] . " แคลอรี่"; ?></footer>
                        <a class="card-link" href="exercise-detail.php?id=<?php echo $row['id'] ?>">รายละเอียด</a>
                    </div>
                </div>
                </br>
            </div>
        <?php } ?>
    </div>
</div>

</body>

</html>

<?php
include('includes/script.php');
include('includes/footer.php');

?>