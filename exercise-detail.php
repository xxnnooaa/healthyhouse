<?php
include('includes/navbar.php');
include('server.php');

if(isset($_GET['id'])){
    $id = mysqli_real_escape_string($conn, $_GET['id']);

    $sql = "SELECT * FROM exercise WHERE id = $id";

    $result = mysqli_query($conn, $sql);

    $exercise = mysqli_fetch_assoc($result);

    mysqli_free_result($result);
    mysqli_close($conn);
}
?>
	<div class="container center" style="margin: 100px auto;">
	<?php if($exercise): ?>
		<center><?php echo '<img src="admin/exercise-images/' . $exercise['image'] . '" width="700px;" height="500px;" alt="Image">' ?></center>
		</br>
			<h4><?php echo $exercise['exercisename']; ?></h4>
		</br>	
			<h5>รายละเอียด :</h5>
		</br>
			<p><?php echo $exercise['detail']; ?></p>
		
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