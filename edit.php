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

?>

<form action="edit-p.php" method="post" enctype="multipart/form-data">
<table align=center>
<tr>
	<td>รหัสการจอง : </td>
	<td><input type="text" name="rentid" value="<?=$result['rentid'];?>" size="100" readonly></td>
</tr>
<tr>
	<td>รหัสนักศึกษา หรือ บุคลากร : </td>
	<td><input type="text" name="stdid" size="100" value="<?=$result['student_id'];?>" readonly></td>
</tr>
<tr>
	<td>ชื่อจริง: </td>
	<td><input type="text" name="fname" size="100" value="<?=$result['student_first_name'];?>" readonly></td>
</tr>
<tr>
	<td>นามสกุล: </td>
	<td><input type="text" name="lname" size="100" value="<?=$result['student_last_name'];?>" readonly></td>
</tr>
<tr>
	<td>Email: </td>
	<td><input type="text" name="email" size="100" value="<?=$result['email'];?>" readonly></td>
</tr>
<tr>
	<td>ที่ปรึกษา : </td>
	<td><input type="text" name="advname" size="100" value="<?=$result['advicer'];?>" readonly></td>
</tr>
<tr>
	<td>หมายเลขห้อง : </td>
	<td><input type="text" name="roomnum" value="<?=$result['room_number'];?>" size="100" readonly></td>
</tr>
<tr>
	<td>วันที่จอง : </td>
	<td><input type="text" name="date" value="<?=$result['date'];?>" size="100" readonly></td>
</tr>
<tr>
	<td>เวลา : </td>
	<td><input type="text" name="time" value="<?=$result['time'];?>" size="100" readonly></td>
</tr>
<tr>
	<td>เหตุผลการจอง : </td>
	<td><script type="text/javascript" src="WYSIWYG/ckeditor/ckeditor.js" readonly></script>

<textarea cols="80" id="reason" name="reason" rows="10" readonly ><?=$result['reason'];?>
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
	<td><input type="submit" name="ok" value="APPROVE"></td>
	<td><input type="submit" name="cancel" value="DISAPPROVE"></td>
</tr>
</table>
</form>
