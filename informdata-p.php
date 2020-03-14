<?php   
include("config.php");
echo "hello".$_SESSION['username'];
if($_SESSION['username'] == "")     
{	echo "<meta http-equiv='refresh' content='0;URL=login.php'>";   }   
?>

<script type="text/javascript">
	function alertinfo(){
			alert("success!!");
			frm_app.submit();
	}
	
	function alerterror(){
			alert("something went wrong please try again!!");
			frm_app.submit();
	}
</script>

<?php
	$rentid = $_POST['rentid'];
	$stdid = $_POST['stdid'];
	$firstname = $_POST['fname'];
  	$lastname = $_POST['lname'];
  	$advname = $_POST['advname'];
	$roomnum = $_POST['roomnum'];
	$date = $_POST['date'];
	$time = $_POST['time'];
	$email = $_POST['email'];
	$reason = $_POST['reason'];

	$str = "INSERT INTO rental_detail (rentid, student_id, student_first_name, student_last_name, advicer, reason, room_number, approve, date, time, email ) 
			VALUES ('$rentid','$stdid','$firstname','$lastname','$advname','$reason','$roomnum',1,'$date','$time','$email')";
    $obj = mysqli_query($conn,$str)or die(mysqli_error($conn));
    
    if($obj)
    {
		echo "Yes!";
		$str = "UPDATE rental_time SET available = 1 where id = '$rentid'; ";
		$obj = mysqli_query($conn,$str)or die(mysqli_error($conn));
		echo '<script type="text/javascript">';
		echo 'alertinfo()';
		echo '</script>';
		echo "<meta http-equiv='refresh' content='0;URL=select-building.php'>";
    }
    else
    {
		echo '<script type="text/javascript">';
		echo 'alerterror()';
		echo '</script>';
		echo "No! no! no!";
		echo "<meta http-equiv='refresh' content='0;URL=informdata.php'>";
    }	

?>