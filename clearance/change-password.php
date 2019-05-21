<?php 
	//TITLE OF PAGE
	$title = "Compose";

	//INCLUDE head.php
	include 'includes/head.php';
?>
<style>
	.error {
		color:#c30000;
		font-size:70%;
		font-weight:bold;
	}
</style>
<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->
	
	<?php include 'includes/nav.php' ?>
  
  <!-- end -->
  
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
         <a href="inbox">Inbox</a>
        </li>
        <li class="breadcrumb-item active">Manage Account</li>
      </ol>
      <div class="row">
	  	<div class="col-lg-4">
			<div class="card-header">My Profile</div>
			<div class="card-body">	
				<table class="table	table-bordered">
					<tr>
						<td colspan="2"><center><img src="<?php echo $user_avatar;?>" class="img-responsive" alt="prof-pic" width="50%;"></center></td>
					</tr>
					<tr>
						<td>Username:</td>
						<td><?php echo $uname;?></td>
					</tr>
					<tr>
						<td>Name:</td>
						<td><?php echo $user_fname." ".$user_lname;?></td>
					</tr>
					<tr>
						<td>Email:</td>
						<td><?php echo $user_email;?></td>
					</tr>
				</table>
			</div>
		</div>
		<div class="col-md-8">
		  <div class="card-header">Change Password</div>
		  <div class="card-body">
			<?php
				// define variables and set to empty values
				$oldPassErr = $cEmailErr = $newPassErr = $cnewPassErr = "";
				$oldPass = $cEmail = $newPass = $cnewPass = ""; $x = 0;

				if(($_SERVER["REQUEST_METHOD"] == "POST") && (isset($_POST['save']) == "Update")){
		
					if (empty($_POST['oldPass'])) {
						$oldPassErr = "Old password should not be blank"; $x = 1;
					} else {
						$oldPass = test_input($_POST['oldPass']); 
						$cpp = SHA1($oldPass);
						if($password != $cpp) {
							$oldPassErr = "Old password does not match!"; $x = 1;
						}
						else {
							$x = 0;
						}
					}
				
					if (empty($_POST['cEmail'])) {
						$cEmailErr = "Email address should not be blank"; $x = 1;
					} else {
						$cEmail = test_input($_POST['cEmail']); 
					}
					
					if (empty($_POST['newPass'])) {
						$newPassErr = "New password should not be blank"; $x = 1;
					}
					else {
						$newPass = test_input($_POST['newPass']);  $x = 0;
					}
					
					if (empty($_POST['cnewPass'])) {
						$cnewPassErr = "Your must confirm your new password"; $x = 1;
					} else {
						$cnewPass = test_input($_POST['cnewPass']); $x = 0;
						$newpp = SHA1($cnewPass);
					}
					//echo $uname." ".$user_id."<br/>".$newpp;
					//check if email address is exist!
					$sql_trackemail = "SELECT * FROM tblusers WHERE email ='$cEmail'";
					$result1 = mysqli_query($con, $sql_trackemail);
					$count = mysqli_num_rows($result1);
					if ($count == 0){
						echo "<div class='alert alert-danger'>Your email does not match!</div>";
						
					}

					else {
						// UPDATE DATA
						$sql_update = "UPDATE tblusers SET password='$newpp' WHERE username='$uname' AND user_id = '$user_id'";

						if (mysqli_query($con, $sql_update)) {
								echo "<div class='alert alert-success'>Your password is changed!</div>";
								echo "<script language='javascript'>window.location.href = 'logout'</script>";
								$oldPass = $cEmail = $newPass = $cnewPass = "";
						} else {
							echo "<div class='alert alert-danger'>Ooopps! Something went wrong..</div>";
						}
					}
				}
			?>
			<form name="frmUploadFile" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" role="form" enctype="multipart/form-data" onsubmit="return checkForm(this);" autocomplete="off">
			  <div class="form-group">
				<div class="form-row">
				  <div class="col-md-6">
					<label for="oldPass">Old Password<span class="error"> * <?php echo $oldPassErr;?></span></label>
					<input class="form-control"  type="password" aria-describedby="oldPass" placeholder="Enter Old Password"  name="oldPass" value="<?php echo $oldPass;?>" pattern=".{5,20}"  title="Please enter 5 to 20 characters" required autofocus>
				  </div>
				  <div class="col-md-6">
					<label for="cEmail">Email Address<span class="error"> * <?php echo $cEmailErr;?></span></label>
					<input class="form-control"  type="email" aria-describedby="cEmail" placeholder="Ennter your email address "  name="cEmail" value="<?php echo $cEmail;?>"  required>
				  </div>
				</div>
			 </div>
			 <div class="form-group">
				<div class="form-row">
				  <div class="col-md-6">
					<label for="newPass">New Password<span class="error"> * <?php echo $newPassErr;?></span></label>
					<input class="form-control"  type="password" aria-describedby="newPass" placeholder="Enter New Password"  name="newPass" value="<?php echo $newPass;?>" pattern=".{5,20}"  title="Please enter 5 to 20 characters" required>
				  </div>
				  <div class="col-md-6">
					<label for="cnewPass">Confirm Password<span class="error"> * <?php echo $cnewPassErr;?></span></label>
					<input class="form-control"  type="password" aria-describedby="cnewPass" placeholder="Confirm New Password"  name="cnewPass" value="<?php echo $cnewPass;?>" pattern=".{5,20}"  title="Please enter 5 to 20 characters" required>
				  </div>
				</div>
			  </div>
			  <input type="submit" class="btn btn-primary "  name="save" value="Update">  
			</form>
		  </div>
		</div>
      </div>
    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
	<!-- FOOTER -->
		
		<?php include 'includes/footer.php'; ?>
	
	<!--END OF FOOTER -->
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>
     <!-- Logout Modal-->
		<?php include 'includes/logout_btn.php'; ?>
		
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin.min.js"></script>
  </div>
</body>

</html>
<script type="text/javascript">
  function checkForm(form)
  {
	if(form.oldPass.value == "") {
      alert("Error: Old password should not be blank!");
      form.oldPass.focus();
      return false;
    }
	if(form.cEmail.value == "") {
      alert("Error: Email Address should not be blank!");
      form.cEmail.focus();
      return false;
    }
	if(form.newPass.value == "") {
      alert("Error: New Password should not be blank!");
      form.newPass.focus();
      return false;
    }
	if(form.cnewPass.value == "") {
      alert("Error: You must confirm your new password!");
      form.cnewPass.focus();
      return false;
    }
	if(form.cnewPass.value != form.newPass.value) {
      alert("Error: New Password does not match to confirm password!");
      form.cnewPass.focus();
      return false;
    }
	
	 alert("You entered a valid password: " + form.newPass.value);
	 return true;
  }
</script>

