<?php
include('includes/navbar.php');
include('server.php');
error_reporting(~E_NOTICE);

?>

<nav aria-label="breadcrumb" style="margin: 80px auto; width: 900px; font-size: 20px;">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">อาหาร</a></li>
        <li class="breadcrumb-item active" aria-current="page">สลัดและผลไม้</li>
    </ol>
    <?php
       
        if(isset($_POST['valueToSearch'])){
            $valueToSearch = $_POST['valueToSearch'];
            $query  = "SELECT * FROM food WHERE food_type_id = '2'AND calorie LIKE '%$valueToSearch%'";
            $search_result = filterTable($query);
        }else{
            $query = "SELECT * FROM food WHERE food_type_id = '2'";
            $search_result = filterTable($query);
        }
        function filterTable($query)
{
    $connect = mysqli_connect("localhost", "root", "", "healthy_db");
    $filter_Result = mysqli_query($connect, $query);
    return $filter_Result;
}
       
    ?>
    <form class="d-flex" action="food2.php" method="post">
        <input class="form-control me-2" name="valueToSearch" type="text" placeholder="ค้นหาโดยแคลอรี่, วัตถุดิบ" aria-label="Search" value="<?php echo $valueToSearch;  ?>">
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
                    <?php echo '<img src="admin/food-images/' . $row['image']. '" width="100px;" height="100px;" alt="Image">' ?>
                    </br></br>
                        <h5 class="card-title" style="font-size: 20px;"><?php echo $row['foodname'] ?></h5>
                        </br>
                        <footer class="blockquote-footer" style="font-size: 18px;"><?php echo "จำนวนแคลอรี่ " . $row['calorie']. " แคลอรี่"; ?></footer>
                        <a class="card-link" href="food-detail.php?id=<?php echo $row['id'] ?>">ดูวิธีทำ</a>
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