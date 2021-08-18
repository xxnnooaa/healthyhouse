<?php
include('includes/navbar.php');
include('server.php');

if(isset($_GET['id'])){
    $id = mysqli_real_escape_string($conn, $_GET['id']);

    $sql = "SELECT * FROM food WHERE id = $id";

    $result = mysqli_query($conn, $sql);

    $food = mysqli_fetch_assoc($result);

    mysqli_free_result($result);
    mysqli_close($conn);
}
?>
	<div class="container center" style="margin: 100px auto;">
	<?php if($food): ?>
		<center><?php echo '<img src="admin/food-images/' . $food['image'] . '" width="700px;" height="500px;" alt="Image">' ?></center>
		</br>
			<h4><?php echo $food['foodname']; ?></h4>
		</br>	
			<h5>วัตถุดิบ :</h5>
		</br>
			<p><?php echo $food['ingredients']; ?></p>
		</br>
            <h5>วิธีทำ :</h5>
		</br>	
			<p><?php echo $food['cook']; ?></p>
		</br>	
		<?php else: ?>
			<h5>ไม่มีข้อมูล</h5>
		<?php endif ?>
	</div>

    
</body>
</html>

<?php
include('includes/footer.php');
include('includes/script.php');
?>