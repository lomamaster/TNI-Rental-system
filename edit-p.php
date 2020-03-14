<?php   
include("config.php");
if($_SESSION['username'] == "")     
{	echo "<meta http-equiv='refresh' content='0;URL=login.php'>";   }   
?>

<script type="text/javascript">
	function alertinfo(){
			alert("success!!");
			frm_app.submit();
	}
</script>

<?php
    $rentid = $_POST['rentid'];
    echo "$rentid";
    
    if(isset($_POST['ok']))
    {
      echo '<script type="text/javascript">';
      echo 'alertinfo()';
      echo '</script>';
      $cftime = "UPDATE rental_time SET available = 2 where id = '$rentid'; ";
		$cfdetail = "UPDATE rental_detail SET approve = 2 where rentid = '$rentid'; ";
		$obj = mysqli_query($conn,$cftime)or die(mysqli_error($conn));
		$obj = mysqli_query($conn,$cfdetail)or die(mysqli_error($conn));
		echo "<meta http-equiv='refresh' content='0;URL=select-building.php'>";
       
    }
    elseif(isset($_POST['cancel']))
    {
      echo '<script type="text/javascript">';
      echo 'alertinfo()';
      echo '</script>';
		echo "Not ok!";
		$cftime = "UPDATE rental_time SET available = 0 where id = '$rentid'; ";
		$cfdetail = "DELETE FROM rental_detail where rentid = '$rentid'; ";
		$obj = mysqli_query($conn,$cftime)or die(mysqli_error($conn));
		$obj = mysqli_query($conn,$cfdetail)or die(mysqli_error($conn));
		echo "<meta http-equiv='refresh' content='0;URL=select-building.php'>";

    }
    else
    {
        echo "Error !!";
    }

?>