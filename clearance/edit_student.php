<?php 
	//TITLE OF PAGE
	$title = "Edit Student";

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
        <li class="breadcrumb-item active">Student</li>
      </ol>
      <div class="row">
		<div class="col-md-9">
		  <div class="card-header">Edit Student</div>
		  <div class="card-body">
			<?php
				//GET STUDENT DATA FROM TABLE
					$id = isset($_GET['id']) ? $_GET['id'] : '';
					$sql_event = mysqli_query($con, "SELECT * FROM `tbl_students` WHERE `salt` = '$id' ");
					$row = mysqli_fetch_array($sql_event, MYSQLI_BOTH);
					$student_id = $row['student_id'];
					$firstname = $row['firstname'];
					$middlename = $row['middlename'];
					$lastname = $row['lastname'];
					$course = $row['course'];
					$year = $row['year'];
					$section = $row['section'];
					$email = $row['email'];
					$contact = $row['contact'];
					$officer = $row['officer'];
					$gender = $row['gender'];
					$status = $row['status'];
					$school_year = $row['school_year'];
					$sem = $row['sem'];

					
				if(($_SERVER["REQUEST_METHOD"] == "POST") && (isset($_POST['save']) == "Send")){
							
							$studid = test_input($_POST["studid"]);
							
							$student_id = test_input($_POST["student_id"]);
							$student_id = mysqli_real_escape_string($con, $_POST["student_id"]);

							$firstname = test_input($_POST["firstname"]);
							$firstname = mysqli_real_escape_string($con, $_POST["firstname"]);
							
							$middlename = test_input($_POST["middlename"]);
							$middlename = mysqli_real_escape_string($con, $_POST["middlename"]);
							
							$lastname = test_input($_POST["lastname"]);
							$lastname = mysqli_real_escape_string($con, $_POST["lastname"]);
							
							$course	= test_input($_POST["course"]);
							$course = mysqli_real_escape_string($con, $_POST["course"]);
							
							$year = test_input($_POST["year"]);
							$year = mysqli_real_escape_string($con, $_POST["year"]);
							
							$section = test_input($_POST["section"]);
							$section = mysqli_real_escape_string($con, $_POST["section"]);
							
							$email = test_input($_POST["email"]);
							$email = mysqli_real_escape_string($con, $_POST["email"]);
							
							$contact = test_input($_POST["contact"]);
							$contact = mysqli_real_escape_string($con, $_POST["contact"]);
			
							$officer = test_input($_POST["officer"]);
							
							$gender = test_input($_POST["gender"]);
							$gender = mysqli_real_escape_string($con, $_POST["gender"]);
							
							$status = test_input($_POST["status"]);
							$status = mysqli_real_escape_string($con, $_POST["status"]);
							
							$sem = test_input($_POST["sem"]);
							$sem = mysqli_real_escape_string($con, $_POST["sem"]);
							
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
							$sql_update = "UPDATE tbl_students SET student_id='$student_id', firstname='$firstname', middlename='$middlename', lastname='$lastname', course='$course', year='$year', 
											                       section='$section', email='$email', contact='$contact', officer='$officer', gender='$gender', archive='$archive', status='$status', sem='$sem', remove_status='$remove_status' WHERE salt='$studid'";	
							$log_name = "Update student ".$student_id;
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
			  <input type="hidden" name="studid" value="<?php echo $id; ?>">
			  <div class="form-group">
				<div class="form-row">
				  <div class="col-md-4">
					<label for="student_id">Student ID <span class="error">* </span></label>
					<input class="form-control"  type="text" aria-describedby="student_id" placeholder="Enter Student ID"  name="student_id" value="<?php echo $student_id;?>" maxlength="20" required autofocus>
				  </div>
				</div>
			  </div>
			  
			  <div class="form-group">
				<div class="form-row">
				  <div class="col-md-4">
					<label for="firstname">First Name <span class="error">*</span></label>
					<input class="form-control" type="text" name="firstname" value="<?php echo $firstname;?>" placeholder="Please enter first name" required maxlength="50">
				  </div>
				  <div class="col-md-4">
					<label for="middlename">Middle Name </label>
					<input class="form-control" type="text" name="middlename" value="<?php echo $middlename;?>" placeholder="Please enter middle name"  maxlength="50">
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
					<label for="course">Course </label>
					<select class="form-control" name="course">
						<?php
							if(isset($_POST['course']) AND $_POST['course'] != "") {
								echo "<option value='".$course."'>".$course."</option>";
								echo "
									<option>BLIS</option>
									<option>BSIT</option>
									<option>BSCE</option>
									";
							}
							else {
							echo "	<option value='".$course."'>".$course."</option>
									<option>BLIS</option>
									<option>BSIT</option>
									<option>BSCE</option>
									";
							}
						?>
					</select>
				  </div>
				  <div class="col-md-3">
					<label for="year">Year </label>
						<select class="form-control" name="year">
							<?php
								if(isset($_POST['year']) AND $_POST['year'] != "") {
									echo "<option value='".$year."'>".$year."</option>";
									echo "
										<option>1</option>
										<option>2</option>
										<option>3</option>
										<option>4</option>
										<option>5</option>
										";
								}
								else {
									echo "<option value='".$year."'>".$year."</option>
										<option>1</option>
										<option>2</option>
										<option>3</option>
										<option>4</option>
										<option>5</option>
										";
								}
							?>
						</select>
				  </div>
				  <div class="col-md-3">
					<label for="section">Section <span class="error"> </span></label>
					<input class="form-control" type="text" value="<?php echo $section; ?>" name="section">
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
					<label for="contact">Contact <span class="error">*</span></label>
					<input class="form-control" type="text" name="contact" value="<?php echo $contact;?>" placeholder="Please enter contact number"  maxlength="20">
				  </div>
				</div>
			  </div>
			  
			  <div class="form-group">
				<div class="form-row">
				  <div class="col-md-6">
					<label for="officer">Officer </label>
					<select class="form-control" name="officer" id="officer">
						<option value='N'>NO</option>
						<option value='Y'>YES</option>
						
					</select>
				  </div>
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
			  
			   <div class="form-group">
				<div class="form-row">
				  <div class="col-md-6">
					<label for="status">Status </label>
					<select class="form-control" name="status" id="status">
						<?php 
							if ($status == "R") {
								echo "<option value='R'>REGULAR</option>"; 
							}
							else {
								echo "<option value='I'>IRREGULAR</option>"; 
							}
						
						?>
						<option value='R' selected>REGULAR</option>
						<option value='I'>IRREGULAR</option>
					</select>
				  </div>
				  <div class="col-md-6">
					<label for="sem">Semester </label>
					<select class="form-control" name="sem">
						
						<?php echo "<option value='".$sem."'>".$sem."</option>"; ?>
						<option value='1ST'>1ST</option>
						<option value='2ND'>2ND</option>
						<option value='SUMMER'>SUMMER</option>
					</select>
				  </div>
				</div>
			  </div>
			  <hr/>
			  
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