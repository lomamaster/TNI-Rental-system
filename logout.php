<?php
include("config.php");
echo "hello".$_SESSION['username'];
session_destroy();
echo"Thank for use this service";
echo "<meta http-equiv='refresh' content='0;URL=login.php'>";
?>