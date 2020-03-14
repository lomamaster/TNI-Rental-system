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
	<title> Time Select </title>
	<link rel="stylesheet" href="select-building.css">
	<style> body { background-image: url("resource/bg.jpg");background-attachment: fixed;}
	body {
		font-family: Arial, Helvetica, sans-serif;
		font-size: 20px;
	}
	#myBtn {
		display: none;
		position: fixed;
		bottom: 20px;
		right: 30px;
		z-index: 99;
		font-size: 18px;
		border: none;
		outline: none;
		background-color: red;
		color: white;
		cursor: pointer;
		padding: 15px;
		border-radius: 4px;
	}

	#myBtn:hover {
		background-color: #555;
	}
	</style>
</head>
<body>

<div class="mar c-p-12 c-i-12 c-m-12">
		<div class="d1 pad c-p-12 c-i-12 c-m-12"> 
			<a style="text-decoration:none" href="rule.php"><button class="block c-p-3 c-i-6 c-m-12"> กฏการจอง</button></a>
			<a style="text-decoration:none" href="select-building.php"><button class="block c-p-3 c-i-6 c-m-12"> จองห้องเรียน</button></a>
			<a style="text-decoration:none" href="https://www.tni.ac.th"><button class="block c-p-3 c-i-6 c-m-12">เว็บไซต์หลัก </button></a>
			<a style="text-decoration:none" href="logout.php"><button class="block c-p-3 c-i-6 c-m-12">ออกจากระบบ</button></a>
		</div>
</div>
<button onclick="topFunction()" id="myBtn" title="Go to top">Top</button>

<script>
//Get the button
var mybutton = document.getElementById("myBtn");

// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    mybutton.style.display = "block";
  } else {
    mybutton.style.display = "none";
  }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}
</script>

<!-- ###############################################                           PULL DATA                          ############################################################ -->
<?php
	$today = date("Y-m-d");
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

	if(isset($_POST['findday']))
	{
		$selectday = $_POST['date'];
		$gettodate = "SELECT rental_time.ID, rental_time.time_duration, rental_time.time_start, rental_time.time_end, rental_time.room_number, rental_time.building, 
						rental_time.date, rental_time.available, rental_detail.student_id , rental_time.available
						FROM rental_time 
						LEFT JOIN rental_detail 
						ON rental_detail.rentid=rental_time.ID 
						WHERE rental_time.room_number 
						like '%$room%'
						AND rental_time.date
						like '%$selectday%'";
		$obj = mysqli_query($conn,$gettodate)or die(mysqli_error($conn));
	}
?>
<!-- ###############################################                           SEARCH DATE                       ############################################################ -->
<form action="#" method="post" align=center style="margin-top:100px;">
<select name="date">
<?php
while($show = mysqli_fetch_array($showdate)){
	if(($show['date'] >= $today))
	{
?>
	<option value="<?=$show['date'];?>" ><?=$show['date'];?></option>
<?php
	}
	else
	{

	}
}
?>
</select>
<input type="submit" name="findday" value="search date">
</form>
&nbsp;&nbsp;&nbsp;&nbsp;

<table border=1 align=center>
<!-- ###############################################                           HEAD OF TABLE                          ############################################################ -->
<tr>
	<th>ID</th>
	<th>time Duration</th>	
	<th>time Start</th>	
	<th>time End</th>	
	<th>room number</th>
	<th>building</th>
	<th>date</th>
	<th>Available</th>
	<th>Rent</th>
</tr>
<!-- ###############################################                           GENERATE TABLE                         ############################################################ -->
<?php
	while($result = mysqli_fetch_array($obj))
	{
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

        <a href="informdata.php?inform=<?=$result['ID']; ?>&room_number=<?=$result['room_number']; ?>&building=<?=$result['building']; ?>&date=<?=$result['date']; ?>&st=<?=$result['time_start']; ?>&en=<?=$result['time_end']; ?>&dur=<?=$result['time_duration']; ?>">
        <button>select</button></a>		

        <?php	
	}
	elseif($_SESSION['username'] == "admin")
	{
        ?>
        
		<a href="edit.php?inform=<?=$result['ID']; ?>&room_number=<?=$result['room_number']; ?>&building=<?=$result['building']; ?>&date=<?=$result['date']; ?>&st=<?=$result['time_start']; ?>&en=<?=$result['time_end']; ?>&dur=<?=$result['time_duration']; ?>">
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
		elseif(($_SESSION['username'] != 'admin') and ($result['date'] >= $today))
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

        <a href="informdata.php?inform=<?=$result['ID']; ?>&room_number=<?=$result['room_number']; ?>&building=<?=$result['building']; ?>&date=<?=$result['date']; ?>&st=<?=$result['time_start']; ?>&en=<?=$result['time_end']; ?>&dur=<?=$result['time_duration']; ?>">
        <button>select</button></a>		

        <?php	
	}
	elseif(($_SESSION['username'] == $result['student_id']) AND ($result['available'] == 1))
	{
        ?>
        
		<a onClick="return confirm('Are you sure you want to delete?')" href="cancel.php?inform=<?=$result['ID']; ?>&room_number=<?=$result['room_number']; ?>&building=<?=$result['building']; ?>&date=<?=$result['date']; ?>&st=<?=$result['time_start']; ?>&en=<?=$result['time_end']; ?>&dur=<?=$result['time_duration']; ?>">
        <button>cancel</button></a>	
        
	    <?php
	}
	elseif (($_SESSION['username'] == $result['student_id']) AND ($result['available'] == 2))
	{
        ?>
        
		<a href="detail.php?inform=<?=$result['ID']; ?>&room_number=<?=$result['room_number']; ?>&building=<?=$result['building']; ?>&date=<?=$result['date']; ?>&st=<?=$result['time_start']; ?>&en=<?=$result['time_end']; ?>&dur=<?=$result['time_duration']; ?>">
		<button type="button" >detail</button></a>

        <?php
    }
        ?>
	</td>
</tr>			
<?php
		}
?>
<?php
	}
?>
<!-- ###############################################                          END OF GENERATE TABLE                          ############################################################ -->

</table>
</body>
</html>