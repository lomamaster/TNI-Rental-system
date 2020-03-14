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
	<style> body { background-image: url("resource/bg.jpg");background-attachment: fixed;}</style>
</head>
<body>
<div>

ใบยืนยันการจองห้องเรียน (รหัสการจอง <?=$rentid;?>)<br>

นาย <?=$stufname." ".$stulname;?> รหัสนักศึกษา <?=$stuid;?><br>

ได้ทำการจองห้องเรียน  <?=$room;?>  วัน   <?=$date;?>  เวลา <?=$time;?><br>

ด้วยเหตุผล <?=$reason;?><br>

โดยมี อาจารย์ที่ปรึกษาเป็น <?=$advice;?><br>

</div>
</body>
</html>