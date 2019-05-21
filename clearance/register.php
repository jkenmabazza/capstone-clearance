<?php 
	//CONNECTION OF THE DATABASE
	include 'includes/connection.php';
	$title = "Register";
?>

<!DOCTYPE html>
<html lang="en">

<?php
	//INCLUDE head.php
	include 'includes/head.php';
	
	//REDIRECT IF NOT ADMIN
	if($user_utype == "2") {
		header("location:javascript://history.go(-1)");
	}
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
        <li class="breadcrumb-item active">Register</li>
      </ol>
      <div class="row">
		<div class="col-md-9">
		  <div class="card-header">Add User</div>
		  <div class="card-body">
			<?php
				// define variables and set to empty values
				$username = $pwd1 = $pwd2 = $fname = $lname = $contact_no = $email = "";
				$unameErr = $pwd1Err = $nameErr = $contactErr = $emailErr = $genderErr = $officeErr = "";
				$x = 0;
				if(($_SERVER["REQUEST_METHOD"] == "POST") && (isset($_POST['save']) == "Register")){
					require 'process_register.php';
				}
			?>
			<form name="frmUploadFile" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" role="form" enctype="multipart/form-data" onsubmit="return checkForm(this);" autocomplete="off">
			  <div class="form-group">
				<div class="form-row">
				  <div class="col-md-12">
					<label for="username">Username <span class="error">* <?php echo $unameErr; ?></span></label>
					<input class="form-control"  type="text" aria-describedby="username" placeholder="Enter Username "  name="username"  pattern=".{5,20}" required title="Please enter 5 to 20 characters" autofocus>
				  </div>
				</div>
			  </div>
			  <div class="form-group">
				<div class="form-row">
				  <div class="col-md-6">
					<label for="password">Password <span class="error">* <?php echo $pwd1Err; ?></span></label>
					<input class="form-control"  type="password" aria-describedby="password" placeholder="Enter Password "  name="pwd1"  pattern=".{5,20}" required title="Please enter 5 to 20 characters">
				  </div>
				  <div class="col-md-6">
					<label for="confirmpassword">Confirm Password <span class="error">* </span></label>
					<input class="form-control"  type="password" aria-describedby="confirmpassword" placeholder="Confirm Password" name="pwd2" pattern=".{5,20}" required title="Please enter 5 to 20 characters">
				  </div>
				</div>
			  </div>
			  <div class="form-group">
				<div class="form-row">
				  <div class="col-md-6">
					<label for="fname">First Name <span class="error">* <?php echo $nameErr; ?></span></label>
					<input class="form-control"  type="text" aria-describedby="fname" placeholder="Enter your First Name "  name="fname"  pattern=".{2,20}" required title="Please enter 3 to 20 characters">
				  </div>
				  <div class="col-md-6">
					<label for="lname">Last Name <span class="error">* </span></label>
					<input class="form-control"  type="text" aria-describedby="lname" placeholder="Enter your Last Name"  name="lname" pattern=".{2,20}" required title="Please enter 3 to 20 characters">
				  </div>
				</div>
			  </div>
			  <div class="form-group">
				<div class="form-row">
				  <div class="col-md-6">
					<label for="email">Email Address <span class="error"> </span></label>
					<input class="form-control" type="email" aria-describedby="email" placeholder="sample@mail.com "  name="email"  required>
				  </div>
				  <div class="col-md-6">
					<label for="contact_no">Contact Number <span class="error"> </span></label>
					<input class="form-control" type="number" aria-describedby="contact_no" placeholder="Enter your mobile number" name="contact_no" pattern=".{11,}"  title="Please enter 11 digit number">
				  </div>
				  <div class="col-md-6">
					<label for="doc_number">Gender <span class="error"> </span></label>
						<select name="gender" class="form-control">
							<?php 
								if(isset($_POST['gender']) AND $user_gender == "M") {
									echo "
									<option value='M'>Male</option>
									<option value='F'>Female</option>";
								}
								else if(isset($_POST['gender']) AND $user_gender == "F") {
									echo "
									<option value='F'>Female</option>
									<option value='M'>Male</option>";
								}
								else {
									echo "
									<option value='S'>-- select gender --</option>
									<option value='M'>Male</option>
									<option value='F'>Female</option>";
								}
							?>
						
						</select>
				  </div>
				   <div class="col-md-6">
					<label for="doc_number">User Type <span class="error">* </span></label>
						<select name="user_type" class="form-control" required>
							<option value=''>-- select user type --</option>
							<option value='1'>Faculty</option>
							<option value='2'>Officer</option>
							<option value='3'>Dean</option>
							<option value='4'>Secretary</option>
							<option value='5'>Director of Student Affairs</option>
						</select>
				  </div>
				</div>
			  </div>
				<div class="form-group">
					<div class="form-row">
					  <div class="col-md-12">
							<label for="userfile">Upload Photo </label>
							<div class="image-upload">
								<input name="userfile" type="file" id="userfile" accept="image/x-png,image/gif,image/jpeg"> 
							</div>
							<small id="fileHelp" class="form-text text-muted">* Only accepts jpeg, png, gif image.</small>
					  </div>
				   </div>
				  </div>

				<input type="submit" class="btn btn-primary btn-block"  name="save" value="Register">  
			</form>
		  </div>
		</div>
		<div class="col-lg-3">
			<div class="card-header">Guide</div>
			<div class="card-body">
				<ol class="small alert alert-info">
					<b>All item with asterisk (*) is required and can't be blank!<b/>
				</ol>
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

	if(form.email.value == "") {
      alert("Error: Please input email address!");
      form.email.focus();
      return false;
    }
	if(form.office.value == "") {
      alert("Error: Office cannot be blank!");
      form.office.focus();
      return false;
    }
	
    if(form.username.value == "") {
      alert("Error: Username cannot be blank!");
      form.username.focus();
      return false;
    }
    re = /^\w+$/;
    if(!re.test(form.username.value)) {
      alert("Error: Username must contain only letters, numbers and underscores!");
      form.username.focus();
      return false;
    }

    if(form.pwd1.value != "" && form.pwd1.value == form.pwd2.value) {
      if(form.pwd1.value.length < 6) {
        alert("Error: Password must contain at least six characters!");
        form.pwd1.focus();
        return false;
      }
      if(form.pwd1.value == form.username.value) {
        alert("Error: Password must be different from Username!");
        form.pwd1.focus();
        return false;
      }
      re = /[0-9]/;
      if(!re.test(form.pwd1.value)) {
        alert("Error: password must contain at least one number (0-9)!");
        form.pwd1.focus();
        return false;
      }
      re = /[a-z]/;
      if(!re.test(form.pwd1.value)) {
        alert("Error: password must contain at least one lowercase letter (a-z)!");
        form.pwd1.focus();
        return false;
      }
      re = /[A-Z]/;
      if(!re.test(form.pwd1.value)) {
        alert("Error: password must contain at least one uppercase letter (A-Z)!");
        form.pwd1.focus();
        return false;
      }
    } else {
      alert("Error: Please check that you've entered and confirmed your password!");
      form.pwd1.focus();
      return false;
    }

    alert("You entered a valid password: " + form.pwd1.value);
    return true;
  }
</script>

