<script type="text/javascript">
	function alertinfo(){
		var frm_app = document.getElementById('login');
		if(frm_app.user.value==''){
			alert("Input Username");
			frm_app.user.focus();
			return false;
		}
		if(frm_app.pass.value==''){
			alert("Input Password");
			frm_app.pass.focus();
			return false;
		}
		if(confirm('OK')){
			frm_app.submit();
		}
	}
</script>
<html>
	<head>
		<title>Login</title>
		<link rel="stylesheet" href="login.css">
		<style> body { background-image: url("resource/bg.jpg");}	
		body {
		font-family: Arial, Helvetica, sans-serif;
		font-size: 20px;
	}</style>
	</head>
	<body>
<form action="check.php" method="post" >
<div align=center>
	<div class="c-p-12 c-i-12 c-m-12 head"><h1>ระบบจองห้องเรียน ตึก A </div>
	<div  class="c-p-12 c-i-12 c-m-12">
		<div class="d1"><h3>Student Number : <input type="text" name="user"></div>
		<div class="d1"><h3>Password : <input type="password" name="pass"></div>
	</div>
	<div class="d1"><input type="submit" value="Login" onclick="alertinfo()"></div>
	<div class="d1 c-p-12 c-i-12 c-m-h"><img src="resource/4.jpg"></div>
</div>
</form>
</body>
</html>