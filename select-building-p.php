<?php 
    include("config.php");
    echo "hello".$_SESSION['username'];
	if($_SESSION['username'] == ""){
		echo "<meta http-equiv='refresh' content='0;URL=login.php'>";
	}
?>

<?php

    $room_number = $_GET['selroom'];
    $building = $_GET['building'];
for ($d=0;$d<7;$d++)
{
    for ($i=1;$i<=9;$i++)
    {
        $time_dur = "1 ชั่วโมง";
        $time_st = date("H:i", mktime($i+7, 0, 0));
        $time_en = date("H:i", mktime($i+8, 0, 0));
        $date = date("Y-m-d", time() + (86400 * $d));
        $onoff = 0; 
        $date1 = date("Ymd", time() + (86400 * $d));
        $date2 = date("H", mktime($i+7, 0, 0));
        $date3 = date("H", mktime($i+8, 0, 0));
        $date_id = $room_number.$date1.$date2.$date3;
        echo "$date_id";
        echo "<br>";
        $findtime = "SELECT ID date 
                    from rental_time
                    where ID like '$date_id' ";
        $checktime = mysqli_query($conn,$findtime)or die(mysqli_error($conn));

        if(mysqli_num_rows($checktime) <= 0)
        {
            $str = "INSERT INTO rental_time (ID,time_duration, time_start, time_end,room_number,building,date,available)
            VALUES('$date_id','$time_dur','$time_st','$time_en','$room_number','$building','$date','$onoff')";
            $obj = mysqli_query($conn,$str)or die(mysqli_error($conn));
            echo "complete adding";
            echo "<br>";
        }
        elseif(mysqli_num_rows($checktime) >= 1)
        {
            echo "already have this time";
            echo "<br>";
            echo "<meta http-equiv='refresh' content='0;URL=timeselector.php?selroom=$room_number'>";
        }

    }
}
    $str_fetch = "SELECT * FROM rental_time where date like '$date'";
    $test_fetch = mysqli_query($conn,$str_fetch)or die(mysqli_error($conn));

    if(mysqli_num_rows($test_fetch) > 0 )
    {
        echo "Yes!";
		echo "<meta http-equiv='refresh' content='0;URL=timeselector.php?selroom=$room_number'>";
    }
    else
    {
        echo "No! no! no!";
		echo "<meta http-equiv='refresh' content='0;URL=select-building.php'>";

	}
	
?>