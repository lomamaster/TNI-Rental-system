<?php 
include("config.php");
echo "hello   ".$_SESSION['username'];
if($_SESSION['username'] == "")
{
	echo "<meta http-equiv='refresh' content='0;URL=login.php'>";
}
?>

<html>
<head>
	<title> Time Select </title>
</head>
<body>
<?php
	$today = date("d-m-Y");
	$room = $_GET['selroom'];
	$str = "SELECT rental_time.ID, rental_time.time_duration, rental_time.time_start, rental_time.time_end, rental_time.room_number, rental_time.building, 
					rental_time.date, rental_time.available, rental_detail.student_id , rental_time.available
			FROM rental_time 
			LEFT JOIN rental_detail 
			ON rental_detail.rentid=rental_time.ID 
			WHERE rental_time.room_number 
			like '%$room%' ";
	
	$obj = mysqli_query($conn,$str)or die(mysqli_error($conn));
	
	$getdate = "SELECT DISTINCT room_number,date FROM rental_time where room_number like '$room' ";
	$showdate = mysqli_query($conn,$getdate)or die(mysqli_error($conn));

	$gettodate = "SELECT date FROM rental_time WHERE '%$search_date%'";
	$tosearch = mysqli_query($conn,$gettodate)or die(mysqli_error($conn));
?>

<select name="date">

<?php
while(($show = mysqli_fetch_array($showdate)) && $show['date'] > $today){
?>

	<option value="<?=$show['date'];?>"><?=$show['date'];?></option>

<?php
}
function searchdate($show)
{
	
}
?>
</select>
<input type="button" name="findday" value="search date" onclick="">
&nbsp;&nbsp;&nbsp;&nbsp;

<table border=1 align=center>
<tr>
	<th>ID</th>
	<th>time Duration</th>	
	<th>time Start</th>	
	<th>time End</th>	
	<th>room number</th>
	<th>building</th>
	<th>date</th>
	<th>Available</th>	
</tr>
<?php
	while($result = mysqli_fetch_array($obj)){
		if($_SESSION['username']=='admin' and $result['date'] >= $today)
		{
			if($result['available'] == 1 or $result['available'] == 2)
			{
				?>
<tr>
	<td> <?=$result['ID']; ?> 				</td>
	<td> <?=$result['time_duration']; ?>	</td>
	<td> <?=$result['time_start']; ?> 		</td>
	<td> <?=$result['time_end']; ?> 		</td>
	<td> <?=$result['room_number']; ?> 		</td>
	<td> <?=$result['building']; ?> 		</td>
	<td> <?=$result['date']; ?> 			</td>
	<td>

	<?php	

				if($result['available'] == 0) 
				{
					echo "<img src='resource/gl.png' width=50 height=50>";
				}
				elseif($result['available'] == 2)
				{
					echo "<img src='resource/rl.png'width=50 height=50>";
				}
				elseif($result['available'] == 1)
				{
					echo "<img src='resource/yl.png'width=50 height=50>";
				}
?>
	</td>
	<td>

	<?php	
	if($result['available'] == 0) 
	{
	?>
		<a href="informdata.php?inform=<?=$result['ID']; ?>
								&room_number=<?=$result['room_number']; ?>
								&building=<?=$result['building']; ?>
								&date=<?=$result['date']; ?>
								&st=<?=$result['time_start']; ?>
								&en=<?=$result['time_end']; ?>
								&dur=<?=$result['time_duration']; ?>">
		<button>select</button></a>		
	<?php	
	}
	elseif($_SESSION['username'] == "admin")
	{
	?>
		<a href="edit.php?inform=<?=$result['ID']; ?>
								&room_number=<?=$result['room_number']; ?>
								&building=<?=$result['building']; ?>
								&date=<?=$result['date']; ?>
								&st=<?=$result['time_start']; ?>
								&en=<?=$result['time_end']; ?>
								&dur=<?=$result['time_duration']; ?>">
		<button>Edit</button></a>	
	<?php
	}
	
	elseif($_SESSION['username'] == $result['student_id'])
	{
	?>
		<a href="edit.php?inform=<?=$result['ID']; ?>
								&room_number=<?=$result['room_number']; ?>
								&building=<?=$result['building']; ?>
								&date=<?=$result['date']; ?>
								&st=<?=$result['time_start']; ?>
								&en=<?=$result['time_end']; ?>
								&dur=<?=$result['time_duration']; ?>">
		<button>Edit</button></a>	
	<?php
	}
	else
	{
	?>
		<a href="">
		<button type="button" disabled>select</button></a>

	<?php
	}
	?>
	</td>
	</tr>
				<?php
			}
		}	
		elseif($_SESSION['username'] != 'admin' and $result['date']>$today)
		{
			?>
<tr>
	<td> <?=$result['ID']; ?> 				</td>
	<td> <?=$result['time_duration']; ?> 	</td>
	<td> <?=$result['time_start']; ?> 		</td>
	<td> <?=$result['time_end']; ?> 		</td>
	<td> <?=$result['room_number']; ?> 		</td>
	<td> <?=$result['building']; ?> 		</td>
	<td> <?=$result['date']; ?> 			</td>
	<td>
	<?php	

if($result['available'] == 0) 
{
	echo "<img src='resource/gl.png' width=50 height=50>";
}
elseif($result['available'] == 2)
{
	echo "<img src='resource/rl.png'width=50 height=50>";
}
elseif($result['available'] == 1)
{
	echo "<img src='resource/yl.png'width=50 height=50>";
}
?>
	</td>
	<td>

	<?php	
	if($result['available'] == 0) 
	{
	?>
		<a href="informdata.php?inform=<?=$result['ID']; ?>
								&room_number=<?=$result['room_number']; ?>
								&building=<?=$result['building']; ?>
								&date=<?=$result['date']; ?>
								&st=<?=$result['time_start']; ?>
								&en=<?=$result['time_end']; ?>
								&dur=<?=$result['time_duration']; ?>">
		<button>select</button></a>		
	<?php	
	}
	elseif($_SESSION['username'] == "admin")
	{
	?>
		<a href="edit.php?inform=<?=$result['ID']; ?>
								&room_number=<?=$result['room_number']; ?>
								&building=<?=$result['building']; ?>
								&date=<?=$result['date']; ?>
								&st=<?=$result['time_start']; ?>
								&en=<?=$result['time_end']; ?>
								&dur=<?=$result['time_duration']; ?>">
		<button>Edit</button></a>	
	<?php
	}
	
	elseif($_SESSION['username'] == $result['student_id'])
	{
	?>
		<a href="cancel.php?inform=<?=$result['ID']; ?>
								&room_number=<?=$result['room_number']; ?>
								&building=<?=$result['building']; ?>
								&date=<?=$result['date']; ?>
								&st=<?=$result['time_start']; ?>
								&en=<?=$result['time_end']; ?>
								&dur=<?=$result['time_duration']; ?>">
		<button>Edit</button></a>	
	<?php
	}
	else
	{
	?>
		<a href="">
		<button type="button" disabled>select</button></a>

	<?php
	}
	?>
	</td>
	</tr>
			<?php
		}
?>

<!--<tr>
	<td> php#$result['ID']; ?> </td>
	<td> php#$result['time_duration']; ?> </td>
	<td> php#$result['time_start']; ?> </td>
	<td> php#$result['time_end']; ?> </td>
	<td> php#$result['room_number']; ?> </td>
	<td> php#$result['building']; ?> </td>
	<td> php#$result['date']; ?> </td>
	<td> php#$result['available'];php-->

<?php
	}
?>

</table>
</body>
</html>