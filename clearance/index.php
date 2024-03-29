<?php 
	//CONNECTION OF THE DATABASE
	include 'includes/connection.php';
	$title = "Sign In";

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title><?php echo $title;?> : Clearance Management System</title>
  <!-- Favicon -->
  <link href="img/favicon.ico" rel="shortcut icon" type="image/x-icon"  />
  <!-- Bootstrap core CSS-->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Page level plugin CSS-->
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
</head>
	<?php
		//FUNCTION TO AVOID SQL INJECTION
		function test_input($data) {
			 $data = trim($data);
			 $data = stripslashes($data);
			 $data = htmlspecialchars($data);
			 return $data;
	}
	?>
<body class="bg-dark" >
  <div class="container">
	<div style="margin-top:20px; margin-bottom:20px; "><center><img src="img/scm_logo.png" width="35%;" class="img-responsive"></center></div>
    <div class="card card-login mx-auto ">
      <div class="card-header">Sign In</div>
      <div class="card-body">
	  <!-- Login Form -->
		<?php
			$uname = ""; $password = ""; 
			include 'checklogin.php';
		?>
        <form name="frmLogin" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" role="form" enctype="multipart/form-data" onsubmit="return checkForm(this);">
          <div class="form-group">
            <label for="inputUsername">Username</label>
            <input class="form-control" id="username" name="username" type="text" aria-describedby="" placeholder="Enter your username" value="<?php echo $uname; ?>" autofocus required maxlength="20">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input class="form-control" id="password" name="password" type="password" placeholder="Enter your password" required maxlength="20" onkeypress="capLock(event)">
			<div id="divMayus" class="small" style="visibility:hidden">Caps Lock is on.</div> 
          </div>
          <button type="submit"  name="login" class="btn btn-primary btn-block">Sign In</button>
        </form>
      </div>
    </div>
	<br/>
	<center><span class="help-block small text-center" style="color:#fff;">SITE : Clearance Management System<br/> &copy; CAPSTONE Team</span></center>
  </div>
  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
</body>

</html>
<script type="text/javascript">
  function checkForm(form)
  {
	if(form.username.value == "") {
      alert("Error: Please enter your username!");
      form.username.focus();
      return false;
    }
	if(form.password.value == "") {
      alert("Error: Please enter your password!");
      form.password.focus();
      return false;
    }
	re = /^\w+$/;
    if(!re.test(form.username.value)) {
      alert("Error: Invalid username!");
      form.username.focus();
      return false;
    }
	 return true;
  }
</script>
<script language="Javascript">
function capLock(e){
 kc = e.keyCode?e.keyCode:e.which;
 sk = e.shiftKey?e.shiftKey:((kc == 16)?true:false);
 if(((kc >= 65 && kc <= 90) && !sk)||((kc >= 97 && kc <= 122) && sk))
  document.getElementById('divMayus').style.visibility = 'visible';
 else
  document.getElementById('divMayus').style.visibility = 'hidden';
}
</script>
