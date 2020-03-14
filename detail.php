<?php 
include("config.php");
if($_SESSION['username'] == "")
{
	echo "<meta http-equiv='refresh' content='0;URL=login.php'>";
}

?>

<?php
	$inform = $_GET['inform'];
    
    $str = "SELECT * FROM rental_detail WHERE rentid like '%$inform%' ";
    $obj = mysqli_query($conn,$str)or die(mysqli_error($conn));
	$result = mysqli_fetch_array($obj);

    $rentid = $result['rentid'];
    $stuid = $result['student_id'];
    $stufname = $result['student_first_name'];
    $stulname = $result['student_last_name'];
    $email = $result['email'];
    $advice = $result['advicer'];
    $room = $result['room_number'];
    $date = $result['date'];
    $time = $result['time'];
    $reason = $result['reason'];
?>

<html>
<head>
	<title>Information</title>
</head>
<body>
<br><br>
<div align=center>
<div>ใบยืนยันการจองห้องเรียน (รหัสการจอง<?=$rentid;?>)</div>
<div>นาย <?=$stufname." ".$stulname;?> รหัสนักศึกษา <?=$stuid;?></div>
<div>ได้ทำการจองห้องเรียน  <?=$room;?>  วัน   <?=$date;?>  เวลา <?=$time;?></div>
<div>ด้วยเหตุผล <?=$reason;?></div>
<div>โดยมี อาจารย์ที่ปรึกษาเป็น <?=$advice;?></div><br>
<button onclick="myFunction()">Print</button>
<a href="timeselector.php?selroom=<?=$room?>"><button>back</button></a>
</div>

<script>
function myFunction() {
  window.print();
}
</script>
</body>
</html>