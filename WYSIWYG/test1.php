<script type="text/javascript" src="ckeditor/ckeditor.js"></script>

<textarea cols="80" id="message" name="message" rows="10" >ทดสอบความหล่อ
</textarea>

<script type="text/javascript">
//<![CDATA[
CKEDITOR.replace( 'message',{
    skin : 'kama',

    toolbar :
[
['Source','-','Templates'],
['Bold','Italic','Underline','Strike','-','Subscript','Superscript'],
['NumberedList','BulletedList','-','Outdent','Indent','Blockquote'],
['JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock'],
['Image','Flash','Table','HorizontalRule','Smiley','SpecialChar','PageBreak'],
],

filebrowserBrowseUrl : 'ckfinder/ckfinder.html',
filebrowserImageBrowseUrl : 'ckfinder/ckfinder.html?Type=Images',
filebrowserFlashBrowseUrl : 'ckfinder/ckfinder.html?Type=Flash',
filebrowserUploadUrl :'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
filebrowserImageUploadUrl :'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
filebrowserFlashUploadUrl :'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
} );
//]]>
</script>