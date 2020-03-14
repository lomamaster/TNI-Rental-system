<?php 
		include("config.php");
		if($_SESSION['username'] == ""){
			echo "<meta http-equiv='refresh' content='0;URL=login.php'>";
		}
	?>

	<?php

		$del = $_GET['inform'];

		
		$str = "DELETE FROM rental_detail WHERE rentid = '$del' ";
		$obj = mysqli_query($conn,$str)or die(mysqli_error($conn));
		
		if($obj){
			echo "Yes!";
			echo "<meta http-equiv='refresh' content='0;URL=select-building.php'>";
		}else{
			echo "No! no! no!";
			echo "<meta http-equiv='refresh' content='0;URL=select-building.php'>";
		}
		
        $str = "UPDATE rental_time 
        set available = '0'
        WHERE ID = '$del' ";
		$obj = mysqli_query($conn,$str)or die(mysqli_error($conn));
	?>

