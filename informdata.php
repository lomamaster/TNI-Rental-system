<?php 
include("config.php");
if($_SESSION['username'] == "")
{
	echo "<meta http-equiv='refresh' content='0;URL=login.php'>";
}

?>

<script type="text/javascript">
	function validateForm() {
		var fname = document.forms['form']['fname'].value;
		var lname = document.forms['form']['lname'].value;
		var email = document.forms['form']['email'].value;
		var advname = document.forms['form']['advname'].value;
		if(fname == '' || fname == null){
			alert("Input first name please");
			return false;
		}
		else if(lname == '' || lname == null){
			alert("Input last name please");
			return false;
		}
		else if(email == '' || email == null){
			alert("Input email please");
			return false;
		}
		else if(advname == '' || advname == null){
			alert("Input advice name please");
			return false;
		}
	}
</script>

<?php
	$inform = $_GET['inform'];
	$room_number = $_GET['room_number'];
	$building = $_GET['building'];
	$date = $_GET['date'];
	$st = $_GET['st'];
	$en = $_GET['en'];
	$dur = $_GET['dur'];
	$time = "ตั้งแต่ ".$st." โมง จนถึง ".$en." เป็นเวลา ".$dur;
?>
<html>
<head>
	<title>Information</title>
	<style> body { background-image: url("resource/bg.jpg");background-attachment: fixed;}</style>
</head>
<body>
<form action="informdata-p.php" method="post" name="form" onsubmit="return validateForm()"  enctype="multipart/form-data">
<br>
<table align=center>
<tr>
	<td>รหัสการจอง : </td>
	<td><input type="text" name="rentid" value="<?=$inform?>" size="100" readonly></td>
</tr>
<tr>
	<td>รหัสนักศึกษา หรือ บุคลากร : </td>
	<td><input type="text" name="stdid" size="100" value="<?=$_SESSION['username']?>" readonly></td>
</tr>
<tr>
	<td>ชื่อจริง: </td>
	<td><input type="text" name="fname" size="100"></td>
</tr>
<tr>
	<td>นามสกุล: </td>
	<td><input type="text" name="lname" size="100"></td>
</tr>
<tr>
	<td>Email: </td>
	<td><input type="text" name="email" size="100"></td>
</tr>
<tr>
	<td>ที่ปรึกษา : </td>
	<td><input type="text" name="advname" size="100"></td>
</tr>
<tr>
	<td>หมายเลขห้อง : </td>
	<td><input type="text" name="roomnum" value="<?=$room_number?>" size="100" readonly></td>
</tr>
<tr>
	<td>วันที่จอง : </td>
	<td><input type="text" name="date" value="<?=$date?>" size="100" readonly></td>
</tr>
<tr>
	<td>เวลา : </td>
	<td><input type="text" name="time" value="<?=$time?>" size="100" readonly></td>
</tr>
<tr>
	<td>เหตุผลการจอง : </td>
	<td><script type="text/javascript" src="WYSIWYG/ckeditor/ckeditor.js"></script>

<textarea cols="80" id="reason" name="reason" rows="10" >
</textarea>

<script type="text/javascript">
//<![CDATA[
CKEDITOR.replace( 'reason',{
    skin : 'kama',

    toolbar :
[
['Source','-','Templates'],
['Bold','Italic','Underline','Strike','-','Subscript','Superscript'],
['NumberedList','BulletedList','-','Outdent','Indent','Blockquote'],
['JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock'],
['Image','Flash','Table','HorizontalRule','Smiley','SpecialChar','PageBreak'],
],

filebrowserBrowseUrl : 'WYSIWYG/ckfinder/ckfinder.html',
filebrowserImageBrowseUrl : 'WYSIWYG/ckfinder/ckfinder.html?Type=Images',
filebrowserFlashBrowseUrl : 'WYSIWYG/ckfinder/ckfinder.html?Type=Flash',
filebrowserUploadUrl :'WYSIWYG/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
filebrowserImageUploadUrl :'WYSIWYG/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
filebrowserFlashUploadUrl :'WYSIWYG/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'

} );
//]]>
</script></td>
</tr>
<tr>
	<td></td>
	<td><input type="submit" value="submit"></td>
</tr>
<tr>
	<td></td>
	<td><a href="timeselector.php?selroom=<?=$room_number?>">back</a></td>
</tr>
</table>
</form>
</body>
</html>