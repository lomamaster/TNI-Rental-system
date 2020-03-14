<?php 
include("config.php");
echo "User   ".$_SESSION['username'];
if($_SESSION['username'] == "")
{
	echo "<meta http-equiv='refresh' content='0;URL=login.php'>";
}
?>

<html>
<head>
	<title> Select building </title>
	<link rel="stylesheet" href="select-building.css">
	<style> body { background-image: url("resource/bg.jpg");background-attachment: fixed;}
		body {
		font-family: Arial, Helvetica, sans-serif;
		font-size: 20px;
	}
	</style>
</head>
<body>
<?php
	
	$str = "Select * from room ";

	if(isset($_POST['Search'])?$_POST['Search']:'')
	{	
		$txt_search = $_POST['txt_search'];
		$str .= "where room_number like '%$txt_search%' or room_name '%$txt_search%' ";
	}
	
	$obj = mysqli_query($conn,$str)or die(mysqli_error($conn));
	
		
?>

<div class="mar c-p-12 c-i-12 c-m-12">
		<div class="d1 pad c-p-12 c-i-12 c-m-12"> 
			<a style="text-decoration:none" href="rule.php"><button class="block c-p-3 c-i-6 c-m-12"> กฏการจอง</button></a>
			<a style="text-decoration:none" href="select-building.php"><button class="block c-p-3 c-i-6 c-m-12"> จองห้องเรียน</button></a>
			<a style="text-decoration:none" href="https://www.tni.ac.th"><button class="block c-p-3 c-i-6 c-m-12">เว็บไซต์หลัก </button></a>
			<a style="text-decoration:none" href="logout.php"> <button class="block c-p-3 c-i-6 c-m-12"> ออกจากระบบ </button></a>
		</div>
</div>
<form>
&nbsp;
</form>
<table border=1 align=center>
<tr>
	<th>Room Number</th>
	<th>Floor</th>
	<th>Building</th>	
	<th>Capacity</th>
	<th>Room Name</th>
	<th>Select</th>
</tr>
<?php
	while($result = mysqli_fetch_array($obj)){
?>

<tr>
	<td height=50> <?=$result['room_number']; ?> </td>
	<td height=50> <?=$result['floor']; ?> </td>
	<td height=50> <?=$result['building']; ?> </td>
	<td height=50> <?=$result['count_use']; ?> </td>
	<td height=50> <?=$result['room_name']; ?> </td>
	<td height=50> <a href="select-building-p.php?selroom=<?=$result['room_number']; ?>&building=<?=$result['building']; ?>">
	<button>Select</button></a> </td>
</tr>
<?php
	}
?>
</table>

</body>
</html>