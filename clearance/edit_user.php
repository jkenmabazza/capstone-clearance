<?php 
	//TITLE OF PAGE
	$title = "Edit Account";

	//INCLUDE head.php
	include 'includes/head.php';
?>
<style>
	.error {
		color:#c30000;
		font-size:70%;
		font-weight:bold;
	}
	.cb {
		display:none;
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
          <a href="home">Home</a>
        </li>
        <li class="breadcrumb-item active">Account</li>
      </ol>
      <div class="row">
		<div class="col-md-9">
		  <div class="card-header">Edit Account</div>
		  <div class="card-body">
			<?php
				//GET STUDENT DATA FROM TABLE
					$user_id = isset($_GET['user_id']) ? $_GET['user_id'] : '';
					$sql_event = mysqli_query($con, "SELECT * FROM `tblusers` WHERE `salt` = '$user_id' ");
					$row = mysqli_fetch_array($sql_event, MYSQLI_BOTH);
					$username = $row['username'];
					$firstname = $row['firstname'];
					$lastname = $row['lastname'];
					$email = $row['email'];
					$contactnono = $row['contactnono'];
					$gender = $row['gender'];
					$user_type = $row['user_type'];
					$avatar = $row['avatar'];

					
				if(($_SERVER["REQUEST_METHOD"] == "POST") && (isset($_POST['save']) == "Send")){
							
							$studid = test_input($_POST["studid"]);
							
							$username = test_input($_POST["username"]);
							$username = mysqli_real_escape_string($con, $_POST["username"]);

							$firstname = test_input($_POST["firstname"]);
							$firstname = mysqli_real_escape_string($con, $_POST["firstname"]);
							
							$lastname = test_input($_POST["lastname"]);
							$lastname = mysqli_real_escape_string($con, $_POST["lastname"]);
							
							$email = test_input($_POST["email"]);
							$email = mysqli_real_escape_string($con, $_POST["email"]);
							
							$contactno = test_input($_POST["contactno"]);
							$contactno = mysqli_real_escape_string($con, $_POST["contactno"]);
							
							$gender = test_input($_POST["gender"]);
							$gender = mysqli_real_escape_string($con, $_POST["gender"]);
							
							if ($_POST["remove_status"] == "" || empty($_POST["remove_status"])) {
								$remove_status = "";
								$archive = 0;
							}
							else {
								$remove_status = test_input($_POST["remove_status"]);
								$remove_status = mysqli_real_escape_string($con, $_POST["remove_status"]);
								$archive = 1;
							}
							
							$date = date("Y-m-d");
							$time = date("h:i:sa");
							$salt = sha1($date.$time);

							
							// UPDATE DATA
							$sql_update = "UPDATE tblusers SET username='$username', firstname='$firstname', middlename='$middlename', lastname='$lastname', ='$', year='$year', 
											                       section='$section', email='$email', contactno='$contactno', officer='$officer', gender='$gender', archive='$archive', remove_status='$remove_status' WHERE salt='$studid'";	
							$log_name = "Update account ".$user_id;
							$sql_insert_log = ("INSERT INTO tbl_logs (log_name, username, fullname, date, time) 
												VALUES ('$log_name','$uname','$user_flname', '$current_date', '$current_time')");
													
							if (mysqli_query($con, $sql_update) && mysqli_query($con, $sql_insert_log) ) {
									echo "<div class='alert alert-success'>Student successfully updated!</div>";
									echo "<script>setTimeout(\"location.href = 'home?id=".$studid."';\",1800);</script>";
							} else {
								echo "Error: " . $sql_update . "<br>" . mysqli_error($con);
							}
						
				}
			?>
			<form name="frmUploadFile" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" role="form" enctype="multipart/form-data" onsubmit="return checkForm(this);" autocomplete="off">
			  
			  <div class="form-group">
				<div class="form-row">
				  <div class="col-md-4">
					<label for="firstname">First Name <span class="error">*</span></label>
					<input class="form-control" type="text" name="firstname" value="<?php echo $firstname;?>" placeholder="Please enter first name" required maxlength="50">
				  </div>
				  <div class="col-md-4">
					<label for="lastname">Last Name <span class="error">*</span></label>
					<input class="form-control" type="text" name="lastname" value="<?php echo $lastname;?>" placeholder="Please enter last name" required maxlength="50">
				  </div>
				</div>
			  </div>
			  
			  <div class="form-group">
				<div class="form-row">
				  <div class="col-md-6">
					<label for="email">Email </label>
					<input class="form-control" type="text" name="email" value="<?php echo $email;?>" placeholder="Please enter email address" maxlength="50">
				  </div>
				  <div class="col-md-6">
					<label for="contactno">Contact number <span class="error">*</span></label>
					<input class="form-control" type="text" name="contactno" value="<?php echo $contactno;?>" placeholder="Please enter contact number"  maxlength="20">
				  </div>
				</div>
			  </div>
			  
			  <div class="form-group">
				<div class="form-row">
				  <div class="col-md-6">
					<label for="gender">Gender </label>
					<select class="form-control" name="gender">
						<?php 
							if ($gender == "M") {
								echo "<option value='M'>MALE</option>"; 
							}
							else {
								echo "<option value='F'>FEMALE</option>"; 
							}
						
						?>
						<option value='M'>MALE</option>
						<option value='F'>FEMALE</option>
					</select>
				  </div>
				</div>
			  </div>
			  
			  <div class="form-group alert alert-warning">
				<div class="form-row">
				  <div class="col-md-12">
					<label for="remove_status">Remove Remarks <span class="error">* If you wish to remove this student from the list, please select why.  </span> </label>
					<select class="form-control" name="remove_status" id="remove_status">
						<option value='' selected>-- select why  --</option>
						<option value='D'>DROP</option>
						<option value='E'>EXPELLED</option>
						<option value='G'>GRADUATED</option>
						<option value='T'>TRANSFERED</option>
					</select>
				  </div>
				</div>
			  </div>
			  
			  <input type="submit" class="btn btn-primary btn-block"  name="save" value="Update">  
			</form>
		  </div>
		</div>
		<div class="col-lg-3">
			<div class="card-header">Guide</div>
			<div class="card-body">
				<ol class="small alert alert-info">
					<li>Student ID - unique number of student which is mandatory. </li>
					
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
	<script src="js/form.js"></script>
  </div>
</body>
</html>