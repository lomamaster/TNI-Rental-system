<?php

	include("config.php");

	$user = mysqli_real_escape_string($conn,$_POST['user']);
	$pass = md5($_POST['pass']);

	
	$str = "Select * from students where student_id = '$user' and pass = '$pass' ";
	$obj = mysqli_query($conn,$str)or die(mysqli_error($conn));

    if($obj && mysqli_num_rows($obj)==1)
    {
        #if($_POST['verified'] == $_SESSION['verified'])
        #{
        #    echo "welcome ".$user;
        #    $_SESSION['username'] = $user;
        #    echo "<meta http-equiv='refresh' content='3;URL=index.php'>";
        #}
        #else
        #{
        #    echo "Verified incorrect. ";
        #    echo "<meta http-equiv='refresh' content='3;URL=login.php'>";
        #}
        echo "welcome ".$user;
        $_SESSION['username'] = $user;

        if($_SESSION['username'] == 'admin')
        {
            echo "<meta http-equiv='refresh' content='.0;URL=select-building.php'>";
        }
        else
        {
            echo "<meta http-equiv='refresh' content='.0;URL=rule.php'>";
            
        }

    }
    else
    {
        echo "User/pass incorrect. ";
        echo "<meta http-equiv='refresh' content='0;URL=login.php'>";
    }
?>